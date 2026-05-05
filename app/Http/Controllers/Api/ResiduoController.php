<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Residuo;
use Illuminate\Http\Request;

class ResiduoController extends Controller
{
    public function index()
    {
        $residuos = Residuo::all();

        return response()->json([
            'success' => true,
            'message' => 'Listado de residuos',
            'data' => $residuos
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'clasificacion' => 'required|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        $residuo = Residuo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Residuo creado correctamente',
            'data' => $residuo
        ], 201);
    }

    public function show($id)
    {
        $residuo = Residuo::find($id);

        if (!$residuo) {
            return response()->json([
                'success' => false,
                'message' => 'Residuo no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $residuo
        ]);
    }

    public function update(Request $request, $id)
    {
        $residuo = Residuo::find($id);

        if (!$residuo) {
            return response()->json([
                'success' => false,
                'message' => 'Residuo no encontrado'
            ], 404);
        }

        $validated = $request->validate([
            'clasificacion' => 'sometimes|string|max:255',
            'descripcion' => 'nullable|string'
        ]);

        $residuo->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Residuo actualizado',
            'data' => $residuo
        ]);
    }

    public function destroy($id)
    {
        $residuo = Residuo::find($id);

        if (!$residuo) {
            return response()->json([
                'success' => false,
                'message' => 'Residuo no encontrado'
            ], 404);
        }

        $residuo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Residuo eliminado'
        ]);
    }
}