<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    // Mostrar todos los planes
    public function index()
    {
        return response()->json(Plan::all());
    }

    // Crear un nuevo plan
    public function store(Request $request)
    {
        $plan = Plan::create($request->all());
        return response()->json($plan);
    }

    // Mostrar un plan específico
    public function show($id)
    {
        return response()->json(Plan::findOrFail($id));
    }

    // Actualizar un plan
    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        $plan->update($request->all());
        return response()->json($plan);
    }

    // Eliminar un plan
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return response()->json(['message' => 'Plan eliminado correctamente']);
    }
}
