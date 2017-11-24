@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Admision de Usuarios</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admision.store') }}">
                        {{ csrf_field() }}
                        @if($respuesta['estado']==2)
                            <input type="hidden" name="estado" value="1">
                         @else
                            <input type="hidden" name="estado" value="2">
                        @endif
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="run">R.U.N</label>
                                <input id="run" type="text" class="form-control" name="run"
                                       @if($respuesta['estado']==2)
                                            value=" {{ $respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['rutbenef'].'-'.$respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['dgvbenef'] }}"
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['runCompleto'] }}"
                                       @else
                                            value=""
                                       @endif
                                       autocomplete="off" placeholder="1234567-8">
                            </div>
                            <div class="col-md-3">
                                <label for="run_representante">R.U.N Acompañante</label>
                                <input id="run_representante" type="text" class="form-control" name="run_representante"
                                       @if($respuesta['estado']==2)
                                            value=""
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['run_acompanante'] }}"
                                       @else
                                            value=""
                                       @endif
                                       autocomplete="off" placeholder="1234567-8">
                            </div>
                            <div class="col-md-3">
                                <label for="dni">DNI Usuario</label>
                                <input id="dni" type="text" class="form-control" name="dni"
                                       @if($respuesta['estado']==2)
                                            value=""
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['dni'] }}"
                                       @else
                                            value=""
                                       @endif
                                       autocomplete="off" placeholder="1234567-8">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="pais">Nacionalidad</label>
                                <select class="form-control" id="pais" name="pais_id" required>
                                    <option value=""> --Seleccione Pais-- </option>
                                    @if($respuesta['estado']==2)
                                        @php
                                            $p = 46;
                                        @endphp
                                    @foreach($pais as $clave => $row)
                                         @if($p==$clave)
                                             <option value="{{ $clave }}" selected> {{ $row }}</option>
                                         @else
                                            <option value="{{ $clave }}"> {{ $row }}</option>
                                        @endif
                                    @endforeach
                                    @elseif($respuesta['estado']==1)
                                        @foreach($pais as $clave => $row)
                                            @if($respuesta['pais_id']==$clave)
                                                <option value="{{ $clave }}" selected> {{ $row }}</option>
                                            @else
                                                <option value="{{ $clave }}"> {{ $row }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($pais as $clave => $row)
                                            <option value="{{ $clave }}"> {{ $row }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="fecha">Fecha Nacimiento</label>
                                <input id="fecha" type="date" class="form-control" name="fecha_nacimiento"
                                       @if($respuesta['estado']==2)
                                            value="{{ $respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['fechaNacimiento'] }}"
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['fecha_nacimiento'] }}"
                                       @else
                                            value=""
                                       @endif
                                       autocomplete="off" placeholder="1234567-8">
                            </div>
                            <div class="col-md-3">
                                <label for="sexo">Sexo</label>
                                <select class="form-control" id="sexo" name="sexo_id" required>
                                    <option value=""> -- Seleccione Sexo -- </option>
                                    @if($respuesta['estado']==2)
                                        @if($respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['genero']=='M')
                                            @php
                                             $s = 3;
                                            @endphp
                                         @else
                                            @php
                                                $s = 2;
                                            @endphp
                                        @endif
                                    @foreach($sex as $clave => $row)
                                        @if($s == $clave)
                                            <option value="{{ $clave }}" selected> {{ $row }}</option>
                                        @else
                                            <option value="{{ $clave }}"> {{ $row }}</option>
                                        @endif
                                    @endforeach
                                    @elseif($respuesta['estado']==1)
                                        @foreach($sex as $clave => $row)
                                            @if($respuesta['sexo_id'] == $clave)
                                                <option value="{{ $clave }}" selected> {{ $row }}</option>
                                            @else
                                                <option value="{{ $clave }}"> {{ $row }}</option>
                                            @endif

                                        @endforeach
                                    @else
                                        @foreach($sex as $clave => $row)
                                                <option value="{{ $clave }}"> {{ $row }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="prevision">Prevision</label>
                                <select class="form-control" id="prevision" name="prevision_id" required>
                                    <option value=""> -- Seleccione Prevision -- </option>
                                    @if($respuesta['estado']==1)
                                        @foreach($previ as $clave => $row)
                                            @if($respuesta['prevision_id'] == $clave)
                                                <option value="{{ $clave }}" selected> {{ $row }}</option>
                                            @else
                                                <option value="{{ $clave }}"> {{ $row }}</option>
                                            @endif
                                        @endforeach
                                     @else
                                        @foreach($previ as $clave => $row)
                                            <option value="{{ $clave }}"> {{ $row }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="nombres">Nombres</label>
                                <input id="nombres" type="text" class="form-control" name="nombres"
                                       @if($respuesta['estado']==2)
                                            value=" {{ $respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['nombres'] }}"
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['nombres'] }}"
                                       @else
                                            value=""
                                       @endif
                                       autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="paterno">Paterno</label>
                                <input id="paterno" type="text" class="form-control" name="apellidop"
                                       @if($respuesta['estado']==2)
                                            value=" {{ $respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['apell1'] }}"
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['apellidop'] }}"
                                       @else
                                            value=""
                                       @endif
                                       autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="materno">Materno</label>
                                <input id="materno" type="text" class="form-control" name="apellidom"
                                       @if($respuesta['estado']==2)
                                            value=" {{ $respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['apell2'] }}"
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['apellidom'] }}"
                                       @else
                                            value=""
                                       @endif
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="fono">Telefono</label>
                                <input id="fono" type="text" class="form-control" name="telefono"
                                       @if($respuesta['estado']==2)
                                            value=" {{ $respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['telefono'] }}"
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['telefono'] }}"
                                       @else
                                             value=""
                                       @endif
                                       autocomplete="off">
                            </div>
                            <div class="col-md-8">
                                <label for="dire">Direccion</label>
                                <input id="dire" type="text" class="form-control" name="direccion"
                                       @if($respuesta['estado']==2)
                                            value=" {{ $respuesta['getCertificadoPrevisionalResult']['beneficiarioTO']['direccion'] }}"
                                       @elseif($respuesta['estado']==1)
                                            value="{{ $respuesta['direccion'] }}"
                                       @else
                                            value=""
                                       @endif
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="motivo">Motivo Consulta SAPU</label>
                                <textarea id="motivo" name="motivo" class="form-control" style="resize: none"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="num_boleta">Boleta</label>
                                <input type="text" class="form-control" id="num_boleta" name="num_boleta" value="0" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <label for="valor_boleta">Valor Boleta</label>
                                <input type="text" class="form-control" id="valor_boleta" name="valor_boleta" value="0" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="nota_boleta">Nota Boleta</label>
                                <input type="text" class="form-control" id="nota_boleta" name="nota_boleta" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <label for="valor_boleta">Registrar</label>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
