<?php

namespace App\Http\Controllers;

use App\Atencion;
use App\AtencionEvento;
use App\Cronico;
use Illuminate\Http\Request;

class CategorizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $atencion = Atencion::where('estado_id',1)->orderBy('id','DESC')->paginate(5);
        return view('categorizacion.index',['aten'=>$atencion,'ActiveMenu'=>'categorizacion']);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atencion = Atencion::Find($id);
        $cronico = Cronico::pluck('nombre','id');
        return view('categorizacion.edit')
            ->with('cro',$cronico)
            ->with('aten',$atencion);
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

        $atencion = Atencion::Find($id);

        $atencion->fill($request->all());
        $atencion->estado_id=2;
        $atencion->save();
        $evento = new AtencionEvento();
        $evento->profesional_id=auth()->user()->id;
        $evento->atencion_id=$atencion->id;
        $evento->evento="Categorizado";
        $evento->save();

        $atencion->usuario->cronicos()->detach();

        foreach ($request->cronico as $row){
              $atencion->usuario->cronicos()->attach($row);
        }

        flash('Paciente Categorizado Correctamente');
        return redirect()->route('categorizacion');

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
