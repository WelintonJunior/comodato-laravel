<?php

namespace App\Http\Controllers\Api;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendedorController extends Controller
{
    public function store(Request $request)
    {
        // Validar dados
        $validated = $request->validate([
            'venNome' => 'required|string|max:255',
            'venCpf' => 'nullable|string|max:20',
            'venRg' => 'nullable|string|max:20',
            // Adicione outras validações conforme necessário
        ]);
        
        // Criar vendedor
        $vendedor = Vendedor::create($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Vendedor criado com sucesso',
            'data' => $vendedor,
            'id' => $vendedor->idVendedor
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $vendedor = Vendedor::findOrFail($id);
        
        // Validar dados
        $validated = $request->validate([
            'venNome' => 'sometimes|required|string|max:255',
            'venCpf' => 'nullable|string|max:20',
            'venRg' => 'nullable|string|max:20',
            // Adicione outras validações conforme necessário
        ]);
        
        // Atualizar vendedor
        $vendedor->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Vendedor atualizado com sucesso',
            'data' => $vendedor
        ]);
    }
}