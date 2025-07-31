<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class EquipoController extends Controller
{    
    public function equipogra(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'p_equ_id' => 'required|integer',
            'p_equ_usureg' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_equ_id = $request->has('p_equ_id') ? (int) $request->input('p_equ_id') : 0;
            $p_equ_descri = $request->has('p_equ_descri') ? (string) $request->input('p_equ_descri') : '';
            $p_equ_abrevi = $request->has('p_equ_abrevi') ? (string) $request->input('p_equ_abrevi') : '';
            $p_equ_usureg = $request->has('p_equ_usureg') ? (int) $request->input('p_equ_usureg') : 1;

            $results = DB::select("SELECT * FROM tickets.spu_equipo_gra(?,?,?,?)", [
                $p_equ_id,$p_equ_descri,$p_equ_abrevi,$p_equ_usureg
            ]);
            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function equiposel(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'p_equ_id' => 'required|integer',
            'p_equ_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_equ_id = $request->has('p_equ_id') ? (int) $request->input('p_equ_id') : 0;
            $p_equ_activo = $request->has('p_equ_activo') ? (int) $request->input('p_equ_activo') : 1;

            $results = DB::select("SELECT * FROM tickets.spu_equipo_sel(?,?)", [
                $p_equ_id,$p_equ_activo
            ]);
            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
