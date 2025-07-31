<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class TrazabilidadController extends Controller
{    
    public function trazabilidadreg(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_est_id' => 'required|integer',
                'p_trz_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_est_id = $request->has('p_est_id') ? (int) $request->input('p_est_id') : 0;
                $p_trz_observ = $request->has('p_trz_observ') ? (string) $request->input('p_trz_observ') : '';
                $p_trz_usureg = $request->has('p_trz_usureg') ? (int) $request->input('p_trz_usureg') : 0;

                $results = DB::select("SELECT * FROM tickets.spu_trazabilidad_reg(?,?,?,?)", [
                    $p_tkt_id,$p_est_id,$p_trz_observ,$p_trz_usureg
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

    public function trazabilidadsel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_trz_id' => 'required|integer',
                'p_tkt_id' => 'required|integer',
                'p_trz_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_trz_id = $request->has('p_trz_id') ? (int) $request->input('p_trz_id') : 0;
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_trz_activo = $request->has('p_trz_activo') ? (int) $request->input('p_trz_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_trazabilidad_sel(?,?,?)", [
                    $p_trz_id,$p_tkt_id,$p_trz_activo
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
