<?php
namespace App\Http\Controllers;

use App\Entities\Dueno;
use App\Entities\Residencia;
use App\Entities\Persona;
use App\Entities\TipoResidencia;
use App\Entities\Urbanizacion;
use App\Entities\Usuario;
use App\Procedures\PersonasProcedures;
use DB;
use Illuminate\Auth\Guard as Auth;
use Illuminate\Http\Request;
use ErrorException;


class ResidenciasController extends Controller {
    private $personasProcedures;
    private $request;
    private $auth;

    public function __construct(PersonasProcedures $personasProcedures, Request $request, Auth $auth){
        $this->middleware('auth');
        $this->personasProcedures = $personasProcedures;
        $this->request = $request;
        $this->auth = $auth;
    }

    public function getIndex(Residencia $residencia, Persona $persona, TipoResidencia $tipoResidencia, Urbanizacion $urbanizacion){
        if($this->request->input('e') == 'activos'){
            $residencias = $residencia->where('estado', 1)->get();
        } elseif($this->request->input('e') == 'inactivos'){
            $residencias = $residencia->where('estado', 0)->get();
        }  else {
            $residencias = $residencia->all();
        }
        $personas = DB::select("Select p.id_persona, p.nombres, p.paterno, p.correo, ifnull(d.id_dueño, 0) as dueño from persona p LEFT JOIN dueño d on (p.id_persona=d.id_persona)");
        $tiposResidencia = $tipoResidencia->all();
        $urbanizaciones = $urbanizacion->all();
        return view('residencias.index', compact('residencias', 'personas', 'tiposResidencia', 'urbanizaciones'));
    }

    public function postInactivarResidencia(Residencia $residencia, $idResidencia){
        if(!$this->request->ajax()){
            return app()->abort(404);
        }
        $res = $residencia->findOrNew($idResidencia);
        $res->estado = 0;
        $res->save();
        return 'Residencia inactiva.';
    }

    public function getDevolverPersona(Persona $persona, $idPersona){
        if(!$this->request->ajax()){
            return app()->abort(404);
        }
        $persona = $persona->findOrNew($idPersona);
        return response()->json($persona);
    }

    public function getObtenerPorDueno(Persona $persona, $idPersona){
        $data = null;
        try {
            $data = $persona->findOrNew($idPersona)->dueño->residencias;
        } catch(ErrorException $e){
            $data = 0;
        }
        return response()->json($data);
    }

    public function postRegistrarDueno(){
        $formData = $this->request->all();

        dd($formData);
/*
        $result = $this->personasProcedures->guardarII(
            $formData['nombres'],
            $formData['paterno'],
            $formData['materno'],
            $formData['tipodocumento'],
            $formData['nrodocumento'],
            $formData['sexo'],
            $formData['cel'],
            $formData['fechanacimiento'],
            $formData['correo'],
            '',
            $this->auth->user()->id_usuario
        );

        if($result->_mensaje == 'ERROR!!'){
            return 'Error';
        }

        $dueno = new Dueno();
        $dueno->id_persona = $result['varNuevoID'];
        $dueno->nroafiliacion = $formData['nroafiliacion'];
        $dueno->idusuario = $this->auth->user()->id_usuario;
        $dueno->fecharegistro = date('Y-m-d H:i:s');
        $dueno->save();

        $usuario = new Usuario();
        $usuario->id_persona = $result['varNuevoID'];
        $usuario->usuario = '';
        $usuario->contrasena = $formData['conf_contrasena'];
        $usuario->idusuarioreg = $this->auth->user()->id_usuario;
        $usuario->fechareg = date('Y-m-d H:i:s');
        $usuario->save();*/
    }

    public function postConvertirEnDueno($idPersona){

    }

    public function postActualizarDueno($idPersona){

    }

}