<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\CustomLogin;
use App\Filament\Pages\Dashboard;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Auth;

class AdminPanelProvider extends PanelProvider
{
    
    public function panel(Panel $panel): Panel
    {

        FilamentAsset::register([
            Css::make('fornecedor-modal', resource_path('css/filament/fornecedor-modal.css')),
        ]);

        FilamentAsset::register([
            Css::make('fornecedor-style', resource_path('css/fornecedor.css')),
        ]);
        
        /**
         * FOOTER GLOBAL
         */
        FilamentView::registerRenderHook(
            'panels::body.end',
            function () {
                // Não renderiza no login
                if (request()->routeIs('filament.admin.auth.login')) {
                    return null;
                }

                return view('filament.footer', [
                    'user' => Auth::user()?->name ?? 'Usuário',
                    'ip' => request()->ip(),
                    'dataHora' => null,

                    'razaoSocial' => 'Empresa XYZ',
                    'cnpj' => '00.000.000/0001-00',
                    'endereco' => 'Endereço não informado',
                    'cidade' => 'Cidade / UF',
                ]);
            }
        );

        /**
         * NAVBAR GLOBAL
         */
        FilamentView::registerRenderHook(
            'panels::content.start',
            function () {
                // Não renderiza no login
                if (request()->routeIs('filament.admin.auth.login')) {
                    return null;
                }

                return view('filament.components.global-navbar');
            }
        );
        

        return $panel
            ->sidebarCollapsibleOnDesktop(false)
            ->sidebarFullyCollapsibleOnDesktop(false)
            ->sidebarWidth('0px')
            ->default()
            ->breadcrumbs(false)
            ->navigation(false)
            ->topBar(false)
            ->topNavigation(false)
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                
            ])
            ->colors([
                'primary' => Color::hex('#f59e0b'),
                'gray' => Color::hex('#203864'),
                'white' => Color::hex('#203864'),
            ])
            ->id('admin')
            ->path('/')
            ->brandName('Comodato')
            ->favicon(asset('images/1.svg'))
            ->login(CustomLogin::class)
            ->widgets([
                AccountWidget::class,
            ])
            ->discoverResources(
                in: app_path('Presentation/Filament/Resources'),
                for: 'App\Filament\Resources'
            )
            ->discoverPages(
                in: app_path('Presentation/Filament/Pages'),
                for: 'App\Filament\Pages'
            )
            ->pages([
                Dashboard::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
            
    }
}
