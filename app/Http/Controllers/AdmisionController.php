<?php

namespace App\Http\Controllers;

use App\Atencion;
use App\AtencionEvento;
use App\Prevision;
use App\Sexo;
use App\Usuario;
use App\Pais;
use Illuminate\Http\Request;

class AdmisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admision.index',['ActiveMenu'=>'admision']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->estado==1){

            $user = new Usuario($request->all());
            if(!empty($request->run)){
                $user->run= explode('-',$request->run)[0];
                $user->dv = explode('-',$request->run)[1];
            }
            $user->save();
            $atencion = new Atencion();
            $atencion->usuario_id=$user->id;
            $atencion->estado_id=1;
            $atencion->motivo=$request->motivo;
            $atencion->num_boleta=$request->num_boleta;
            $atencion->valor_boleta=$request->valor_boleta;
            $atencion->nota_boleta=$request->nota_boleta;
            $atencion->save();
            $evento = new AtencionEvento();
            $evento->profesional_id=auth()->user()->id;
            $evento->atencion_id=$atencion->id;
            $evento->evento="Ingreso";
            $evento->save();

        }else{
            $run = explode('-',$request->run)[0];
            $data=Usuario::where('run',$run)->get();
            $user = Usuario::Find($data[0]->id);
            $user->fill($request->all());
            $user->save();
            $atencion = new Atencion();
            $atencion->usuario_id=$user->id;
            $atencion->estado_id=1;
            $atencion->motivo=$request->motivo;
            $atencion->num_boleta=$request->num_boleta;
            $atencion->valor_boleta=$request->valor_boleta;
            $atencion->nota_boleta=$request->nota_boleta;
            $atencion->save();
            $evento = new AtencionEvento();
            $evento->profesional_id=auth()->user()->id;
            $evento->atencion_id=$atencion->id;
            $evento->evento="Ingreso";
            $evento->save();
        }
        flash('Paciente Ingresado Correctamente');
        return redirect()->route('admision');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $run = explode('-',$request->run)[0];
        $cont_run=count(Usuario::where('run',$run)->get());
        if($cont_run==1){
            $data=Usuario::where('run',$run)->get();
            $paciente = Usuario::Find($data[0]->id);
            $paciente->runCompleto=$paciente->runCompleto();
            $array= array("estado" =>1);
        }else{
            $paciente = file_get_contents("http://unisag.cormudesi.cl/ws/fonasa/?run=".$request->run);
            $a=json_decode($paciente);
            if(isset($a->Codigo)){
                $array = array("estado" => 3);
            }else {
                $array = array("estado" => 2);
            }
        }
        $estado = json_encode($array);
        $respuesta = array_merge(json_decode($paciente, true),json_decode($estado, true));
        $pais = Pais::pluck('nombre','id');
        $sexo = Sexo::pluck('nombre','id');
        $previ = Prevision::pluck('nombre','id');
        return view('admision.store')
            ->with('respuesta',$respuesta)
            ->with('pais',$pais)
            ->with('sex',$sexo)
            ->with('previ',$previ);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
