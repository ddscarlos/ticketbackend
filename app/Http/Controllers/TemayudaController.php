<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class TemayudaController extends Controller
{    
    public function temaayudaanu(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tea_id' => 'required|integer',
                'p_tea_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;
                $p_tea_usureg = $request->has('p_tea_usureg') ? (int) $request->input('p_tea_usureg') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_temaayuda_anu(?,?)", [
                    $p_tea_id,$p_tea_usureg
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

    public function temaayudahij(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tea_id' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;

                $results = DB::select("SELECT * FROM tickets.spu_temaayuda_hij(?)", [
                    $p_tea_id
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

    public function temaayudahlp(Request $request): JsonResponse{       
            try {
                $results = DB::select("SELECT * FROM tickets.spu_temaayuda_hlp()");
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function temaayudapad(Request $request): JsonResponse{
            try {
                $results = DB::select("SELECT * FROM tickets.spu_temaayuda_pad()");
                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al obtener los datos',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function temaayudareg(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tea_id' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tea_descri = $request->has('p_tea_descri') ? (string) $request->input('p_tea_descri') : '';
                $p_tea_abrevi = $request->has('p_tea_abrevi') ? (string) $request->input('p_tea_abrevi') : '';
                $p_tea_idpadr = $request->has('p_tea_idpadr') ? (int) $request->input('p_tea_idpadr') : 0;
                $p_pri_id = $request->has('p_pri_id') ? (int) $request->input('p_pri_id') : 0;
                $p_equ_id = $request->has('p_equ_id') ? (int) $request->input('p_equ_id') : 0;
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_dep_id = $request->has('p_dep_id') ? (int) $request->input('p_dep_id') : 0;
                $p_tea_usureg = $request->has('p_tea_usureg') ? (int) $request->input('p_tea_usureg') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_temaayuda_reg(?,?,?,?,?,?,?,?)", [
                    $p_tea_descri,$p_tea_abrevi,$p_tea_idpadr,$p_pri_id,$p_equ_id,$p_age_id,$p_dep_id,$p_tea_usureg
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

    public function temaayudarut(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tea_id' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;

                $results = DB::select("SELECT * FROM tickets.spu_temaayuda_rut(?)", [
                    $p_tea_id
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

    public function temaayudasel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tea_id' => 'required|integer',
                'p_tea_idpadr' => 'required|integer',
                'p_tea_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;
                $p_tea_idpadr = $request->has('p_tea_idpadr') ? (int) $request->input('p_tea_idpadr') : 0;
                $p_tea_activo = $request->has('p_tea_activo') ? (int) $request->input('p_tea_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_temaayuda_sel(?,?,?)", [
                    $p_tea_id,$p_tea_idpadr,$p_tea_activo
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
