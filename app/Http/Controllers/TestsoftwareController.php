<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class TestsoftwareController extends Controller
{    
    public function estadoescenariopruebasel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_eep_id' => 'required|integer',
            'p_eep_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_eep_id = $request->has('p_eep_id') ? (int) $request->input('p_eep_id') : 0;
            $p_eep_activo = $request->has('p_eep_activo') ? (int) $request->input('p_eep_activo') : 1;

            $results = DB::select("SELECT * FROM testsoftware.spu_estadoescenarioprueba_sel(?,?)", [
                $p_eep_id,$p_eep_activo
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

    public function estadocasopruebasel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_ecp_id' => 'required|integer',
            'p_ecp_activo' => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_ecp_id = $request->has('p_ecp_id') ? (int) $request->input('p_ecp_id') : 0;
            $p_ecp_activo = $request->has('p_ecp_activo') ? (int) $request->input('p_ecp_activo') : 1;

            $results = DB::select("SELECT * FROM testsoftware.spu_estadocasoprueba_sel(?,?)", [
                $p_ecp_id,$p_ecp_activo
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
    
    public function tipopruebasel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_tip_id' => 'required|integer',
            'p_tip_activo' => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_tip_id = $request->has('p_tip_id') ? (int) $request->input('p_tip_id') : 0;
            $p_tip_activo = $request->has('p_tip_activo') ? (int) $request->input('p_tip_activo') : 1;

            $results = DB::select("SELECT * FROM testsoftware.spu_tipoprueba_sel(?,?)", [
                $p_tip_id,$p_tip_activo
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

    public function escenariopruebasel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_esp_id' => 'required|integer',
            'p_apl_id' => 'required|integer',
            'p_obj_id' => 'required|integer',
            'p_eep_id' => 'required|integer',
            'p_esp_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_esp_id = $request->has('p_esp_id') ? (int) $request->input('p_esp_id') : 0;
            $p_apl_id = $request->has('p_apl_id') ? (int) $request->input('p_apl_id') : 0;
            $p_obj_id = $request->has('p_obj_id') ? (int) $request->input('p_obj_id') : 0;
            $p_eep_id = $request->has('p_eep_id') ? (int) $request->input('p_eep_id') : 0;
            $p_esp_codigo = $request->has('p_esp_codigo') ? (string) $request->input('p_esp_codigo') : '';
            $p_esp_activo = $request->has('p_esp_activo') ? (int) $request->input('p_esp_activo') : 9;

            $results = DB::select("SELECT * FROM testsoftware.spu_escenarioprueba_sel(?,?,?,?,?,?)", [
                $p_esp_id,$p_apl_id,$p_obj_id,$p_eep_id,$p_esp_codigo,$p_esp_activo
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
    
    public function escenariopruebareg(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_esp_id' => 'required|integer',
            'p_apl_id' => 'required|integer',
            'p_obj_id' => 'required|integer',
            'p_eqc_id' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_esp_id = $request->has('p_esp_id') ? (int) $request->input('p_esp_id') : 0;
            $p_apl_id = $request->has('p_apl_id') ? (int) $request->input('p_apl_id') : 0;
            $p_obj_id = $request->has('p_obj_id') ? (int) $request->input('p_obj_id') : 0;
            $p_eqc_id = $request->has('p_eqc_id') ? (int) $request->input('p_eqc_id') : 0;
            $p_esp_nombre = $request->has('p_esp_nombre') ? (string) $request->input('p_esp_nombre') : '';
            $p_esp_descri = $request->has('p_esp_descri') ? (string) $request->input('p_esp_descri') : '';
            $p_esp_cndini = $request->has('p_esp_cndini') ? (string) $request->input('p_esp_cndini') : '';
            $p_esp_fecini = $request->has('p_esp_fecini') ? (string) $request->input('p_esp_fecini') : '';
            $p_esp_fecfin = $request->has('p_esp_fecfin') ? (string) $request->input('p_esp_fecfin') : '';
            $p_esp_observ = $request->has('p_esp_observ') ? (string) $request->input('p_esp_observ') : '';
            $p_cod_usuari = $request->has('p_cod_usuari') ? (string) $request->input('p_cod_usuari') : '';

            $results = DB::select("SELECT * FROM testsoftware.spu_escenarioprueba_reg(?,?,?,?,?,?,?,?,?,?,?)", [
                $p_esp_id,$p_apl_id,$p_obj_id,$p_eqc_id,$p_esp_nombre,$p_esp_descri,$p_esp_cndini,$p_esp_fecini,$p_esp_fecfin,$p_esp_observ,$p_cod_usuari
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
    
    public function aplicacionsel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_apl_id' => 'required|integer',
            'p_apl_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_apl_id = $request->has('p_apl_id') ? (int) $request->input('p_apl_id') : 0;
            $p_apl_activo = $request->has('p_apl_activo') ? (int) $request->input('p_apl_activo') : 1;

            $results = DB::select("SELECT * FROM seguridad.spu_aplicacion_sel(?,?)", [
                $p_apl_id,$p_apl_activo
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

    public function aplicacionmodulo(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_aob_id' => 'required|integer',
            'p_apl_id' => 'required|integer',
            'p_obj_id' => 'required|integer',
            'p_aob_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_aob_id = $request->has('p_aob_id') ? (int) $request->input('p_aob_id') : 0;
            $p_apl_id = $request->has('p_apl_id') ? (int) $request->input('p_apl_id') : 0;
            $p_obj_id = $request->has('p_obj_id') ? (int) $request->input('p_obj_id') : 0;
            $p_aob_activo = $request->has('p_aob_activo') ? (int) $request->input('p_aob_activo') : 1;

            $results = DB::select("SELECT * FROM seguridad.spu_aplicacionobjeto_sel(?,?,?,?)", [
                $p_aob_id,$p_apl_id,$p_obj_id,$p_aob_activo
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

    public function casopruebareg(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_cap_id' => 'required|integer',
            'p_esp_id' => 'required|integer',
            'p_tip_id' => 'required|integer',
            'p_eqt_id' => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_cap_id = $request->has('p_cap_id') ? (int) $request->input('p_cap_id') : 0;
            $p_esp_id = $request->has('p_esp_id') ? (int) $request->input('p_esp_id') : 0;
            $p_tip_id = $request->has('p_tip_id') ? (int) $request->input('p_tip_id') : 0;
            $p_eqc_id = $request->has('p_eqc_id') ? (int) $request->input('p_eqc_id') : 0;
            $p_eqt_id = $request->has('p_eqt_id') ? (int) $request->input('p_eqt_id') : 0;
            $p_cap_nombre = $request->has('p_cap_nombre') ? (string) $request->input('p_cap_nombre') : '';
            $p_cap_descri = $request->has('p_cap_descri') ? (string) $request->input('p_cap_descri') : '';
            $p_cap_requis = $request->has('p_cap_requis') ? (string) $request->input('p_cap_requis') : '';
            $p_cap_datent = $request->has('p_cap_datent') ? (string) $request->input('p_cap_datent') : '';
            $p_cap_paseje = $request->has('p_cap_paseje') ? (string) $request->input('p_cap_paseje') : '';
            $p_cap_fecini = $request->has('p_cap_fecini') ? (string) $request->input('p_cap_fecini') : '';
            $p_cap_fecfin = $request->has('p_cap_fecfin') ? (string) $request->input('p_cap_fecfin') : '';
            $p_cap_resesp = $request->has('p_cap_resesp') ? (string) $request->input('p_cap_resesp') : '';
            $p_cap_resobt = $request->has('p_cap_resobt') ? (string) $request->input('p_cap_resobt') : '';
            $p_cap_flualt = $request->has('p_cap_flualt') ? (string) $request->input('p_cap_flualt') : '';
            $p_cap_observ = $request->has('p_cap_observ') ? (string) $request->input('p_cap_observ') : '';
            $p_cod_usuari = $request->has('p_cod_usuari') ? (int) $request->input('p_cod_usuari') : 0;
            
            $results = DB::select("SELECT * FROM testsoftware.spu_casoprueba_reg(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $p_cap_id,$p_esp_id,$p_tip_id,$p_eqc_id,$p_eqt_id,$p_cap_nombre,$p_cap_descri,$p_cap_requis,$p_cap_datent,$p_cap_paseje,$p_cap_fecini,$p_cap_fecfin,$p_cap_resesp,$p_cap_resobt,$p_cap_flualt,$p_cap_observ,$p_cod_usuari
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
    
    public function casopruebasel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_cap_id' => 'required|integer',
            'p_esp_id' => 'required|integer',
            'p_tip_id' => 'required|integer',
            'p_ecp_id' => 'required|integer',
            'p_eqc_id' => 'required|integer',
            'p_eqt_id' => 'required|integer',
            'p_cap_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_cap_id = $request->has('p_cap_id') ? (int) $request->input('p_cap_id') : 0;
            $p_esp_id = $request->has('p_esp_id') ? (int) $request->input('p_esp_id') : 0;
            $p_tip_id = $request->has('p_tip_id') ? (int) $request->input('p_tip_id') : 0;
            $p_ecp_id = $request->has('p_ecp_id') ? (int) $request->input('p_ecp_id') : 0;
            $p_eqc_id = $request->has('p_eqc_id') ? (int) $request->input('p_eqc_id') : 0;
            $p_eqt_id = $request->has('p_eqt_id') ? (int) $request->input('p_eqt_id') : 0;
            $p_cap_codigo = $request->has('p_cap_codigo') ? (string) $request->input('p_cap_codigo') : '';
            $p_cap_activo = $request->has('p_cap_activo') ? (int) $request->input('p_cap_activo') : 9;
            
            $results = DB::select("SELECT * FROM testsoftware.spu_casoprueba_sel(?,?,?,?,?,?,?,?)", [
                $p_cap_id,$p_esp_id,$p_tip_id,$p_ecp_id,$p_eqc_id,$p_eqt_id,$p_cap_codigo,$p_cap_activo
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

    public function escenariopruebaact(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_esp_id' => 'required|integer',
            'p_esp_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_esp_id = $request->has('p_esp_id') ? (int) $request->input('p_esp_id') : 0;
            $p_esp_activo = $request->has('p_esp_activo') ? (int) $request->input('p_esp_activo') : 0;

            $results = DB::select("SELECT * FROM testsoftware.spu_escenarioprueba_act(?,?)", [
                $p_esp_id,$p_esp_activo
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
    
    public function casopruebaact(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_cap_id' => 'required|integer',
            'p_cap_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_cap_id = $request->has('p_cap_id') ? (int) $request->input('p_cap_id') : 0;
            $p_cap_activo = $request->has('p_cap_activo') ? (int) $request->input('p_cap_activo') : 0;

            $results = DB::select("SELECT * FROM testsoftware.spu_casoprueba_act(?,?)", [
                $p_cap_id,$p_cap_activo
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
    
    public function casopruebatrazasel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_cpt_id' => 'required|integer',
            'p_cap_id' => 'required|integer',
            'p_cct_id' => 'required|integer',
            'p_ecp_id' => 'required|integer',
            'p_cpt_activo' => 'required|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_cpt_id = $request->has('p_cpt_id') ? (int) $request->input('p_cpt_id') : 0;
            $p_cap_id = $request->has('p_cap_id') ? (int) $request->input('p_cap_id') : 0;
            $p_cct_id = $request->has('p_cct_id') ? (int) $request->input('p_cct_id') : 0;
            $p_ecp_id = $request->has('p_ecp_id') ? (int) $request->input('p_ecp_id') : 0;
            $p_cpt_activo = $request->has('p_cpt_activo') ? (int) $request->input('p_cpt_activo') : 1;

            $results = DB::select("SELECT * FROM testsoftware.spu_casopruebatraza_sel(?,?,?,?,?)", [
                $p_cpt_id,$p_cap_id,$p_cct_id,$p_ecp_id,$p_cpt_activo
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
    
    public function casopruebatrazaact(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_cpt_id' => 'required|integer',
            'p_cpt_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_cpt_id = $request->has('p_cpt_id') ? (int) $request->input('p_cpt_id') : 0;
            $p_cpt_activo = $request->has('p_cpt_activo') ? (int) $request->input('p_cpt_activo') : 0;

            $results = DB::select("SELECT * FROM testsoftware.spu_casopruebatraza_act(?,?)", [
                $p_cpt_id,$p_cpt_activo
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
    
    public function casopruebatrazareg(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_cpt_id' => 'required|integer',
            'p_cap_id' => 'required|integer',
            'p_ecp_id' => 'required|integer',
            'p_cct_id' => 'required|integer',
            'p_eqt_id' => 'required|integer',
            'p_cod_usuari' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_cpt_id = $request->has('p_cpt_id') ? (int) $request->input('p_cpt_id') : 0;
            $p_cap_id = $request->has('p_cap_id') ? (int) $request->input('p_cap_id') : 0;
            $p_ecp_id = $request->has('p_ecp_id') ? (int) $request->input('p_ecp_id') : 0;
            $p_cct_id = $request->has('p_cct_id') ? (int) $request->input('p_cct_id') : 0;
            $p_eqt_id = $request->has('p_eqt_id') ? (int) $request->input('p_eqt_id') : 0;
            $p_cpt_caurai = $request->has('p_cpt_caurai') ? (string) $request->input('p_cpt_caurai') : '';
            $p_cpt_fecdet = $request->has('p_cpt_fecdet') ? (string) $request->input('p_cpt_fecdet') : '';
            $p_cpt_feccor = $request->has('p_cpt_feccor') ? (string) $request->input('p_cpt_feccor') : '';
            $p_cpt_fecapr = $request->has('p_cpt_fecapr') ? (string) $request->input('p_cpt_fecapr') : '';
            $p_cpt_resobt = $request->has('p_cpt_resobt') ? (string) $request->input('p_cpt_resobt') : '';
            $p_cpt_observ = $request->has('p_cpt_observ') ? (string) $request->input('p_cpt_observ') : '';
            $p_cod_usuari = $request->has('p_cod_usuari') ? (int) $request->input('p_cod_usuari') : 0;

            $results = DB::select("SELECT * FROM testsoftware.spu_casopruebatraza_reg(?,?,?,?,?,?,?,?,?,?,?,?)", [
                $p_cpt_id,$p_cap_id,$p_ecp_id,$p_cct_id,$p_eqt_id,$p_cpt_caurai,$p_cpt_fecdet,$p_cpt_feccor,$p_cpt_fecapr,$p_cpt_resobt,$p_cpt_observ,$p_cod_usuari
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
    
    public function criticidadcasopruebatrazasel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_cct_id' => 'required|integer',
            'p_cct_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_cct_id = $request->has('p_cct_id') ? (int) $request->input('p_cct_id') : 0;
            $p_cct_activo = $request->has('p_cct_activo') ? (int) $request->input('p_cct_activo') : 0;

            $results = DB::select("SELECT * FROM testsoftware.spu_criticidadcasopruebatraza_sel(?,?)", [
                $p_cct_id,$p_cct_activo
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
