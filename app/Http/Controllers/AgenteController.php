<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class AgenteController extends Controller
{    

    public function agentegra(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_usu_id' => 'required|integer',
                'p_age_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_age_usureg = $request->has('p_age_usureg') ? (int) $request->input('p_age_usureg') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_agente_gra(?,?)", [
                    $p_usu_id,$p_age_usureg
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

    public function agentesel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_age_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_age_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_usu_apepat = $request->has('p_usu_apepat') ? (string) $request->input('p_usu_apepat') : '';
                $p_usu_apemat = $request->has('p_usu_apemat') ? (string) $request->input('p_usu_apemat') : '';
                $p_usu_nombre = $request->has('p_usu_nombre') ? (string) $request->input('p_usu_nombre') : '';
                $p_age_activo = $request->has('p_age_activo') ? (int) $request->input('p_age_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_agente_sel(?,?,?,?,?,?)", [
                    $p_age_id,$p_usu_id,$p_usu_apepat,$p_usu_apemat,$p_usu_nombre,$p_age_activo
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
    
    public function agentetkt(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_equ_id' => 'required|integer'
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

                $results = DB::select("SELECT * FROM tickets.spu_agente_tkt(?)", [$p_equ_id]);
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }
    
    public function agenteman(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_age_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_age_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_usu_apepat = $request->has('p_usu_apepat') ? (string) $request->input('p_usu_apepat') : '';
                $p_usu_apemat = $request->has('p_usu_apemat') ? (string) $request->input('p_usu_apemat') : '';
                $p_usu_nombre = $request->has('p_usu_nombre') ? (string) $request->input('p_usu_nombre') : '';
                $p_age_activo = $request->has('p_age_activo') ? (int) $request->input('p_age_activo') : 1;

                //echo "SELECT * FROM tickets.spu_agente_man($p_age_id,$p_usu_id,'$p_usu_apepat','$p_usu_apemat','$p_usu_nombre',$p_age_activo)";
                $results = DB::select("SELECT * FROM tickets.spu_agente_man(?,?,?,?,?,?)", [
                    $p_age_id,$p_usu_id,$p_usu_apepat,$p_usu_apemat,$p_usu_nombre,$p_age_activo
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
    
    public function agenteanu(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_age_id' => 'required|integer',
                'p_age_anular' => 'required|integer',
                'p_age_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_age_anular = $request->has('p_age_anular') ? (int) $request->input('p_age_anular') : 1;
                $p_age_usureg = $request->has('p_age_usureg') ? (int) $request->input('p_age_usureg') : 1;

                //echo "SELECT * FROM tickets.spu_agente_anu($p_age_id,$p_age_anular,$p_age_usureg)";
                $results = DB::select("SELECT * FROM tickets.spu_agente_anu(?,?,?)", [
                    $p_age_id,$p_age_anular,$p_age_usureg
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
    
    public function equipoagentereg(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_equ_id' => 'required|integer',
                'p_age_id' => 'required|integer',
                'p_eag_usureg' => 'required|integer'
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
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_eag_usureg = $request->has('p_eag_usureg') ? (int) $request->input('p_eag_usureg') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_equipoagente_reg(?,?,?)", [
                    $p_equ_id,$p_age_id,$p_eag_usureg
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
