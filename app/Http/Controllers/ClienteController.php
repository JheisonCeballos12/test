<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; // ← Faltaba esto

class ClienteController extends Controller
{
    // Mostrar todos los clientes
    public function index()
    {
        return response()->json(Cliente::all());
    }

    // Crear cliente
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return response()->json($cliente);
    }

    // Ver cliente específico
    public function show($id)
    {
        return response()->json(Cliente::findOrFail($id));
    }

    // Actualizar cliente
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    // Eliminar cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json(['message' => 'Cliente eliminado']);
    }
}

