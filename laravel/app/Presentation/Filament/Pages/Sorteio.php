<?php

namespace App\Filament\Pages;

use App\Models\Pdv;
use App\Models\Vendedor;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;

class Sorteio extends Page
{
    // label used in the sidebar/navigation (if enabled)
    protected static ?string $navigationLabel = 'Sorteio';
    protected static BackedEnum|string|null $navigationIcon = null; // add an icon (e.g. Heroicon::OutlineAdjustments)

    // Remove o título exibido pelo Filament
    protected static ?string $title = '';

    public string $view = 'filament.pages.Sorteio';

    // URL slug (used for routing)
    protected static ?string $slug = 'sorteio';

    // Estruturas exigidas
    public array $a_vendedores_liberados = [];
    public array $a_vendedores_selecionados = [];
    public array $a_numero_sorteado = [];
    public array $pdv_atribuido = [];
    public array $a_pdvs_liberados = [];

    // Fluxo principal
    public bool $sorteioAberto = false;
    public int $pontos_vendas_ativos = 0;
    public bool $sorteioConcluido = false;
    public bool $salvo = false;

    // Controle do sorteio
    public int $minNumero = 1000;
    public int $maxNumero = 9999;

    protected static function canView(): bool
    {
        return auth()->check() && auth()->user()->usuSuspenso == 0;
    }

    public function mount(): void
    {
        // iniciar tela com botão Abrir disponível, sem carregar ainda
    }

    public function carregarVendedoresLiberados(): void
    {
        $this->a_vendedores_liberados = Vendedor::query()
            // consulta por vendedores não suspensos. venStatus pode variar (0/1) de acordo com a base atual.
            ->where(function ($query) {
                $query->where('venSuspenso', 0)
                    ->orWhereNull('venSuspenso')
                    ->orWhere('venSuspenso', '');
            })
            ->where(function ($query) {
                $query->whereIn('venStatus', [0, 1])
                    ->orWhereNull('venStatus')
                    ->orWhere('venStatus', '');
            })
            ->orderBy('venNome')
            ->get(['idVendedor', 'venNome'])
            ->map(function ($vendedor) {
                return [
                    'vendedor_id' => $vendedor->idVendedor,
                    'vendedor_nome' => $vendedor->venNome,
                ];
            })
            ->toArray();

        Notification::make()
            ->title('Vendedores carregados')
            ->body(count($this->a_vendedores_liberados) . ' vendedores liberados encontrados')
            ->success()
            ->send();
    }

    public function carregarPdvsLiberados(): void
    {
        $this->a_pdvs_liberados = Pdv::query()
            ->where(function ($query) {
                $query->where('pdvSuspenso', 0)
                    ->orWhereNull('pdvSuspenso')
                    ->orWhere('pdvSuspenso', '');
            })
            ->get(['idPDV', 'pdvDesignacao'])
            ->map(function ($pdv) {
                return [
                    'pdv_id' => $pdv->idPDV,
                    'pdv_designacao' => $pdv->pdvDesignacao,
                ];
            })
            ->toArray();

        $this->pontos_vendas_ativos = count($this->a_pdvs_liberados);

        Notification::make()
            ->title('PDVs carregados')
            ->body($this->pontos_vendas_ativos . ' pontos de venda ativos (PDV)')
            ->success()
            ->send();
    }

    public function abrirSorteio(): void
    {
        $this->carregarVendedoresLiberados();
        $this->carregarPdvsLiberados();
        $this->sorteioAberto = true;
        $this->sorteioConcluido = false;
        $this->salvo = false;

        Notification::make()
            ->title('Tela de sorteio aberta')
            ->body('Abertura concluída com ' . $this->pontos_vendas_ativos . ' pontos de venda ativos (PDV)')
            ->success()
            ->send();
    }

    public function sairSorteio(): void
    {
        $this->sorteioAberto = false;

        Notification::make()
            ->title('Sorteio encerrado')
            ->body('Acesso desativado exceto botão Sair')
            ->warning()
            ->send();
    }

    public function selecionarVendedor(int $id): void
    {
        if (! $this->sorteioAberto) {
            return;
        }

        if (in_array($id, array_column($this->a_vendedores_selecionados, 'vendedor_id'), true)) {
            return;
        }

        $vendedor = collect($this->a_vendedores_liberados)->firstWhere('vendedor_id', $id);
        if (!$vendedor) {
            Notification::make()
                ->title('Erro')
                ->body('Vendedor não encontrado entre liberados')
                ->danger()
                ->send();

            return;
        }

        $this->a_vendedores_liberados = array_values(array_filter($this->a_vendedores_liberados, function ($item) use ($id) {
            return $item['vendedor_id'] !== $id;
        }));

        $this->a_vendedores_selecionados[] = $vendedor;

        Notification::make()
            ->title('Vendedor escalado')
            ->body($vendedor['vendedor_nome'] . ' movido para escalados')
            ->success()
            ->send();
    }

    public function removerVendedorSelecionado(int $id): void
    {
        $vendedor = collect($this->a_vendedores_selecionados)->firstWhere('vendedor_id', $id);
        if ($vendedor) {
            $this->a_vendedores_selecionados = array_values(array_filter($this->a_vendedores_selecionados, function ($item) use ($id) {
                return $item['vendedor_id'] !== $id;
            }));
            $this->a_vendedores_liberados[] = $vendedor;

            Notification::make()
                ->title('Removido')
                ->body('Vendedor retornado para liberados')
                ->warning()
                ->send();

            return;
        }

        Notification::make()
            ->title('Erro')
            ->body('Vendedor não encontrado em selecionados')
            ->danger()
            ->send();
    }

    public function sortearPdv(): void
    {
        if (! $this->sorteioAberto) {
            Notification::make()
                ->title('Erro')
                ->body('Abra a tela de sorteio antes de executar o sorteio')
                ->danger()
                ->send();
            return;
        }

        $quantidade = count($this->a_vendedores_selecionados);
        if ($quantidade < 2) {
            Notification::make()
                ->title('Erro')
                ->body('É necessário selecionar pelo menos 2 vendedores para sortear')
                ->danger()
                ->send();
            return;
        }

        $a_limiteCargaVendedor = $quantidade;
        $this->a_numero_sorteado = [];
        $this->pdv_atribuido = [];

        try {
            $idSorteio = DB::table('tblSorteio')->insertGetId([
                'sorData' => now(),
                'sorIdNucleo' => null,
            ]);
        } catch (\Exception $e) {
            Notification::make()
                ->title('Erro de banco')
                ->body('Falha ao criar registro em tblSorteio: ' . $e->getMessage())
                ->danger()
                ->send();
            return;
        }

        foreach ($this->a_vendedores_selecionados as $vendedor) {
            $disponiveis = array_diff(range(1, $a_limiteCargaVendedor), $this->a_numero_sorteado);
            if (empty($disponiveis)) {
                // fallback: use intervalo completo para evitar loop infinito
                $disponiveis = array_diff(range(1, $quantidade), $this->a_numero_sorteado);
            }

            if (empty($disponiveis)) {
                Notification::make()
                    ->title('Erro de sorteio')
                    ->body('Não há números disponíveis para atribuição')
                    ->danger()
                    ->send();
                return;
            }

            $numero = $disponiveis[array_rand($disponiveis)];

            $this->a_numero_sorteado[] = $numero;
            $this->pdv_atribuido[] = [
                'vendedor_id' => $vendedor['vendedor_id'],
                'vendedor_nome' => $vendedor['vendedor_nome'],
                'numero_sorteado' => $numero,
            ];

            try {
                DB::table('tblDetSorteio')->insert([
                    'detSorIdSorteio' => $idSorteio,
                    'detSorIdVendedor' => $vendedor['vendedor_id'],
                    'detSorNumeroSorteado' => $numero,
                    'detSorPdvId' => null,
                ]);
            } catch (\Exception $e) {
                Notification::make()
                    ->title('Erro de banco')
                    ->body('Falha ao gravar tblDetSorteio: ' . $e->getMessage())
                    ->danger()
                    ->send();
                return;
            }

            $a_limiteCargaVendedor--;
        }

        $this->sorteioConcluido = true;
        $this->salvo = false;

        Notification::make()
            ->title('Sorteio concluído')
            ->body('Foram atribuídos ' . count($this->pdv_atribuido) . ' números exclusivos')
            ->success()
            ->send();
    }

    public function salvarSorteio(): void
    {
        if (! $this->sorteioConcluido) {
            Notification::make()
                ->title('Atenção')
                ->body('Execute o sorteio antes de salvar')
                ->warning()
                ->send();
            return;
        }

        $this->salvo = true;

        Notification::make()
            ->title('Sorteio salvo')
            ->body('Resultado salvo com sucesso. Impressão liberada.')
            ->success()
            ->send();
    }

    public function limparSorteio(): void
    {
        if (! empty($this->a_vendedores_selecionados)) {
            $this->a_vendedores_liberados = array_merge(
                $this->a_vendedores_liberados,
                $this->a_vendedores_selecionados
            );

            $this->a_vendedores_liberados = collect($this->a_vendedores_liberados)
                ->unique('vendedor_id')
                ->sortBy('vendedor_nome')
                ->values()
                ->toArray();
        }

        $this->a_vendedores_selecionados = [];
        $this->a_numero_sorteado = [];
        $this->pdv_atribuido = [];
        $this->sorteioConcluido = false;
        $this->salvo = false;

        Notification::make()
            ->title('Limpeza concluída')
            ->body('Listas de sorteio reiniciadas')
            ->success()
            ->send();
    }
}
