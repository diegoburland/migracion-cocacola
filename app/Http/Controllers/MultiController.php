<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Multi;
use Illuminate\Http\Request;
use DB;
use Throwable;

class MultiController extends Controller
{
    //
    public function index(Request $request){
        // $data = DB::table('')
       
        // $this->uno();
        // $this->dos();
        // $this->tres();
        // $this->cuatro();
        // $this->cinco();
        // $this->siete();
        // $this->nueve();
        // $this->seis();
        // $this->ocho();
        // $this->diez();
        // $this->once();
        // $this->veintidos();
        // $this->veintitres();
        // $this->catorce();
        // $this->doce();
        // $this->trece();
        // $this->quince();
        // $this->dieciseis();
        // $this->diecisiete();
        // $this->dieciocho();
        // $this->veinticuatro();
        
        //$this->veinte();
        //$this->veintiuno();
        
        //$this->diecinueve();
        // $this->veinticinco();
        
        return response()->json('success');

        // $this->doce();
    }

    private function uno(){
        $data = DB::table('ic_perfil')->get();

        foreach($data as $d){
            
            $inserted = DB::insert('insert into profile (id, name, state, created_at, updated_at) values (?, ?, ?, ?, ?)', [
                $d->idperfil,
                $d->nombre,
                $d->estado > 0? true: false,
                Carbon::now()->format('Y-m-d H:i:s'),
                Carbon::now()->format('Y-m-d H:i:s')
            ]);

            error_log($inserted);

        }


    }

    private function dos(){
        $data = DB::table('ic_zona')->get();

        foreach($data as $d){
            try{
                $inserted = DB::insert('insert into zone (id, name, code, state, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', [
                    $d->idzona,
                    $d->nombre,
                    $d->codigo,
                    $d->estado > 0? true: false,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }
            

        }

    }

    private function tres(){
        $data = DB::table('ic_usuario')->orderBy('idusuario', 'asc')->get();
        foreach($data as $d){
            try{

                $inserted = DB::insert('insert into users (id, identification, names, surnames,code, date_registration, state, id_zone, id_profile, token_reset, token_access, key_auth, nomen, created_at, updated_at) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [
                    $d->idusuario,
                    $d->documento,
                    mb_strtolower($d->nombres, 'UTF-8'),
                    mb_strtolower($d->apellidos, 'UTF-8'),
                    $d->codempleado,
                    $d->fechareg,
                    $d->estado > 0? true: false,
                    $d->idzona,
                    $d->role,
                    $d->password_reset_token,
                    $d->access_token,
                    $d->auth_key,
                    $d->nomen,
                    $d->created_at,
                    $d->updated_at,
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function cuatro(){
        $data = DB::table('ic_gerencia')->orderBy('idgerencia', 'asc')->get();
        foreach($data as $d){
            try{

                $inserted = DB::insert('insert into management (id, name, code, id_zone, state, created_at, updated_at) values (?,?,?,?,?,?,?)', [
                    $d->idgerencia,
                    $d->codigo,
                    $d->nombre,
                    $d->idzona,
                    $d->estado > 0? true: false,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function cinco(){
        $data = DB::table('ic_gerenciausuario')->where('idgerencia', '!=', null)->orderBy('idgerenciausuario', 'asc')->get();
        foreach($data as $d){
            try{

                $inserted = DB::insert('insert into managementuser (id, id_management, id_user, created_at, updated_at) values (?,?,?,?,?)', [
                    $d->idgerenciausuario,
                    $d->idgerencia,
                    $d->idusuario,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function seis(){
        $data = DB::table('ic_ruta')->orderBy('idruta', 'asc')->get();
        foreach($data as $d){
            try{
                $inserted = DB::insert('insert into route (id, name, code, state, id_zone, id_management, id_leadership, id_distributor, code_boss, code_management,  created_at, updated_at) values (?,?,?,?,?,?,?,?,?,?,?,?)', [
                    $d->idruta,
                    $d->nombre,
                    $d->codigo,
                    $d->estado > 0? true: false,
                    $d->idzona,
                    $d->idgerencia,
                    $d->idjefatura,
                    $d->iddistribuidora,
                    $d->codjefe,
                    $d->codgerencia,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function siete (){
        $data = DB::table('ic_jefatura')->orderBy('idjefatura', 'asc')->get();
        foreach($data as $d){
            try{
                
                $inserted = DB::insert('insert into leadership (id, name, code, state, id_zone, created_at, updated_at) values (?,?,?,?,?,?,?)', [
                    $d->idjefatura,
                    $d->nombre,
                    $d->codigo,
                    $d->estado > 0? true: false,
                    $d->idzona,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function ocho (){
        $data = DB::table('ic_jefaturausuario')->orderBy('idjefaturausuario', 'asc')->get();
        foreach($data as $d){
            try{
                
                $inserted = DB::insert('insert into leadershipuser (id, id_leadership, id_user, created_at, updated_at) values (?,?,?,?,?)', [
                    $d->idjefaturausuario,
                    $d->idjefatura,
                    $d->idusuario,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function nueve (){
        $data = DB::table('ic_distribuidora')->orderBy('iddistribuidora', 'asc')->get();
        foreach($data as $d){
            try{
                
                $inserted = DB::insert(
                'insert into distributor (id, name, state, id_zone, created_at, updated_at)
                values (?,?,?,?,?,?)', [
                    $d->iddistribuidora,
                    $d->nombre,
                    $d->estado > 0? true: false,
                    $d->idzona,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function diez (){
        $data = DB::table('ic_clasificacion')->orderBy('idclasifica', 'asc')->get();
        
        foreach($data as $d){
            try{
               
                $inserted = DB::insert(
                'insert into classification (id, name, state, code, created_at, updated_at)
                values (?,?,?,?,?,?)', [
                    $d->idclasifica,
                    $d->nombre,
                    $d->estado > 0? true: false,
                    $d->codigo,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function once (){
        $data = DB::table('ic_categoria')->orderBy('idcategoria', 'asc')->get();
        return $data;
        foreach($data as $d){
            try{
               
                $inserted = DB::insert(
                'insert into category (id, name, state, created_at, updated_at)
                values (?,?,?,?,?)', [
                    $d->idcategoria,
                    $d->nombre,
                    $d->estado > 0? true: false,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
        return response()->json($data);
    }

    private function doce (){

        $data = DB::table('ic_formulario')->orderBy('idformulario', 'asc')->get();
        foreach($data as $d){
            try{

                $inserted = DB::insert(
                'insert into form (id, name, includes_fridge, id_departmentcategory, id_classification, state, created_at, updated_at)
                values (?,?,?,?,?,?,?,?)', [
                    $d->idformulario,
                    $d->nombre,
                    $d->incluyenevera,
                    $d->iddptocat,
                    $d->idclasificacion,
                    $d->estado > 0? true: false,
                    $d->fechareg,
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function trece (){

        $data = DB::table('ic_canal')->orderBy('idcanal', 'asc')->get();
        foreach($data as $d){
            try{

                $inserted = DB::insert(
                'insert into channel (id, name, state, id_category, created_at, updated_at)
                values (?,?,?,?,?,?)', [
                    $d->idcanal,
                    $d->nombre,
                    $d->estado > 0? true: false,
                    $d->idcategoria,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function catorce (){

        $data = DB::table('ic_dptocategoria')->orderBy('iddptocat', 'asc')->get();
        foreach($data as $d){
            try{

                $inserted = DB::insert(
                'insert into departmentcategory (id, id_department, id_category, created_at, updated_at)
                values (?,?,?,?,?)', [
                    $d->iddptocat,
                    $d->iddpto,
                    $d->idcategoria,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function quince (){

        $data = DB::table('ic_pregunta')->orderBy('idpregunta', 'asc')->get();
        
        foreach($data as $d){
            try{

                $inserted = DB::insert(
                'insert into question (id, name, state, description, url_img, view_order, created_at, updated_at)
                values (?,?,?,?,?,?,?,?)', [
                    $d->idpregunta,
                    $d->nombre,
                    $d->estado > 0? true: false,
                    $d->descripcion,
                    $d->urlimg,
                    $d->ordervista,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function dieciseis (){

        $data = DB::table('ic_formpregunta')->orderBy('idformpreg', 'asc')->get();
        
        
        foreach($data as $d){
            try{

                $inserted = DB::insert(
                'insert into formquestion (id, id_form, id_question, value_question, orden, created_at, updated_at)
                values (?,?,?,?,?,?,?)', [
                    $d->idformpreg,
                    $d->idformulario,
                    $d->idpreg,
                    $d->valorpreg,
                    $d->orden,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function diecisiete (){

        $data = DB::table('ic_respuesta')->orderBy('idrespuesta', 'asc')->get();
        
        foreach($data as $d){
            try{
                
                $inserted = DB::insert(
                'insert into reply (id, name, state, description, url_img, view_order, created_at, updated_at)
                values (?,?,?,?,?,?,?,?)', [
                    $d->idrespuesta,
                    $d->nombre,
                    $d->estado > 0? true: false,
                    $d->descripcion,
                    $d->urlimg,
                    $d->ordervista,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function dieciocho (){

        $data = DB::table('ic_formpregrespuesta')->orderBy('idformpregrta', 'asc')->get();
        
        foreach($data as $d){
            try{
                
                $inserted = DB::insert(
                'insert into formquestionreply (id, id_formquestion, id_reply, value_replay, orden, created_at, updated_at)
                values (?,?,?,?,?,?,?)', [
                    $d->idformpregrta,
                    $d->idformpreg,
                    $d->idrespuesta,
                    $d->valorrta,
                    $d->orden,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function diecinueve(){

        $data = DB::table('ic_calificapreg')->orderBy('idcalificapreg', 'asc')->get();
        
        foreach($data as $d){
            try{
                
                $inserted = DB::insert(
                'insert into ratingquestion (id, id_ratingstore, id_formquestion, value_question, score_question, created_at, updated_at)
                values (?,?,?,?,?,?,?)', [
                    $d->idcalificapreg,
                    $d->idcalificacion,
                    $d->idformpreg,
                    $d->valorpreg,
                    $d->puntajepreg,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function veinte (){

        $data = DB::table('ic_calificaneg')->orderBy('idcalificacion', 'asc')->get();
            foreach($data as $key => $d){
                error_log($key);
                
                try{

                    $stringSql = 
                    "insert into 
                    ratingstore (
                    id,
                    id_form,
                    id_store,
                    id_user, 
                    date_rating,
                    score_total,
                    id_departmentcategory, 
                    id_classification, 
                    includes_fridge, 
                    observation, 
                    code_store, 
                    created_at, 
                    updated_at,
                    rating_json)
                    values ";
                    $stringSql.= "(";
                    $stringSql.= "$d->idcalificacion,";
                    $stringSql.= "$d->idformulario,";
                    $stringSql.= (!empty($d->idnegocio))?$d->idnegocio: 5;
                    $stringSql.= ",";
                    $stringSql.= "$d->idusuario,";
                    $stringSql.= "'$d->fechacalifica',";
                    $stringSql.= "$d->puntajetotal,";
                    $stringSql.= "$d->iddptocat,";
                    $stringSql.= "$d->idclasificacion,";
                    $stringSql.=   (($d->incluyenevera > 0)? 'true': 'false') .",";
                    $stringSql.= "'$d->observacion',";
                    $stringSql.= "'$d->codigonegocio',";
                    $stringSql.= "'".Carbon::now()->format('Y-m-d H:i:s'). "'" . ",";
                    $stringSql.= "'".Carbon::now()->format('Y-m-d H:i:s'). "',";
                    $stringSql.= "'$d->calificacion'";
                    $stringSql.= ");";
                    // error_log($stringSql);
                    DB::insert($stringSql);

                }catch(\Exception $e){
                    error_log($e);
                    return false;
                }

            }

            
            echo 'success';
            die;
            

        
        
    }

    private function veintiuno (){

        $data = DB::table('ic_calificaevidencia')->orderBy('idcalificaevidencia', 'asc')->get();
        
        foreach($data as $d){
            try{
                
                $inserted = DB::insert(
                'insert into ratingevidence (id, id_ratingstore, url_img_route, created_at, updated_at)
                values (?,?,?,?,?)', [
                    $d->idcalificaevidencia,
                    $d->idcalificacion,
                    $d->rutaimg,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function veintidos (){

        $data = DB::table('ic_departamento')->orderBy('iddpto', 'asc')->get();
        
        foreach($data as $d){
            try{
                $inserted = DB::insert(
                'insert into department (id, name, state, created_at, updated_at)
                values (?,?,?,?,?)', [
                    $d->iddpto,
                    $d->nombre,
                    $d->estado > 0 ? true: false,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function veintitres (){

        $data = DB::table('ic_categoria')->orderBy('idcategoria', 'asc')->get();
        
        foreach($data as $d){
            try{
                $inserted = DB::insert(
                'insert into category (id, name, state, created_at, updated_at)
                values (?,?,?,?,?)', [
                    $d->idcategoria,
                    $d->nombre,
                    $d->estado > 0 ? true: false,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }

    private function veinticuatro (){

        $data = DB::table('ic_negocio')->orderBy('idnegocio', 'asc')->get();
        
        foreach($data as $d){
            try{
                $inserted = DB::insert(
                'insert into store (id, code, name, id_route, id_departmentcategory, id_classification, includes_fridge, includes_trellis, id_channel, state, deleted, created_at, updated_at)
                values (?,?,?,?,?,?,?,?,?,?,?,?,?)', [
                    $d->idnegocio,
                    $d->codigo,
                    $d->nombre,
                    $d->idruta,
                    $d->iddptocat,
                    $d->idclasificacion,
                    $d->incluyenevera,
                    $d->incluyeenrejado,
                    $d->idcanal,
                    $d->estado > 0 ? true: false,
                    $d->borrar,
                    $d->fechamod,
                    $d->fechamod
                ]);

                error_log('Tienda insertada '. $inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }
    //correr solito
    private function veinticinco(){

        $data = DB::table('ic_calificapregrespuesta')
        ->where('idcalificapreg', '>', 532758)
        ->orderBy('idcalificapregrta', 'asc')->get();
        
        foreach($data as $d){
            // error_log($d->idcalificapregrta);
            try{

                $inserted = DB::insert(
                'insert into ratingquestionreply (id, id_ratingquestion, id_formquestionreply, total_score, reply_score, created_at, updated_at)
                    values (?,?,?,?,?,?,?)', [
                    $d->idcalificapregrta,
                    $d->idcalificapreg,
                    $d->idformpregrta,
                    $d->valorrta,
                    $d->puntajerta,
                    Carbon::now()->format('Y-m-d H:i:s'),
                    Carbon::now()->format('Y-m-d H:i:s')
                ]);

                error_log($inserted);

            }catch(Throwable $e){
                report($e);
                dd($e);
                return false;
            }

        }
    }


    
}
