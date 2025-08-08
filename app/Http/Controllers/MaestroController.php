<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class MaestroController extends Controller
{    
    public function tipodocidesel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_tdi_id' => 'required|integer',
            'p_tpe_id' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_tdi_id = $request->has('p_tdr_id') ? (int) $request->input('p_tdr_id') : 0;
            $p_tpe_id = $request->has('p_tdr_id') ? (int) $request->input('p_tdr_id') : 0;

            $results = DB::select("SELECT * FROM master.spu_tipodocide_sel(?,?)", [
                $p_tdi_id, $p_tpe_id
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
    
    public function origensel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_ori_id' => 'required|integer',
            'p_ori_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_ori_id = $request->has('p_ori_id') ? (int) $request->input('p_ori_id') : 0;
            $p_ori_activo = $request->has('p_ori_activo') ? (int) $request->input('p_ori_activo') : 1;

            $results = DB::select("SELECT * FROM tickets.spu_origen_sel(?,?)", [
                $p_ori_id, $p_ori_activo
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
