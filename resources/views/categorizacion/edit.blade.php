@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
            <div class="panel panel-primary">
                <div class="panel-heading">Categorizacion SAPU</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('categorizacion.update',$aten->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >R.U.N:</label><br>
                                <label> {{ $aten->usuario->runCompleto() }}</label>
                            </div>
                            <div class="col-md-2">
                                <label >R.U.N Acompañante</label><br>
                                <label> {{ $aten->usuario->run_acompanante }}</label>
                            </div>
                            <div class="col-md-2">
                                <label >DNI:</label><br>
                                <label> {{ $aten->usuario->dni }}</label>
                            </div>
                            <div class="col-md-4">
                                <label >Usuario:</label><br>
                                <label> {{ $aten->usuario->nombreCompleto() }}</label>
                            </div>
                            <div class="col-md-2">
                                <label >Nacionalidad:</label><br>
                                <label> {{ $aten->usuario->pais->nombre }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Fecha Nacimiento:</label><br>
                                <label> {{ $aten->usuario->fecha_nacimiento }}</label>
                            </div>
                            <div class="col-md-2">
                                <label >Sexo:</label><br>
                                <label> {{ $aten->usuario->sexo->nombre }}</label>
                            </div>
                            <div class="col-md-2">
                                <label >Prevision:</label><br>
                                <label> {{ $aten->usuario->prevision->nombre }}</label>
                            </div>
                            <div class="col-md-6">
                                <label >Direccion:</label><br>
                                <label> {{ $aten->usuario->direccion }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label >Motivo consulta SAPU:</label><br>
                                <label> {{ $aten->motivo }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="arterial">P. Arterial(mmHg)</label>
                                <div class="col-md-9">
                                    <input type="text" id="arterial" name="arterial" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="pulso">Pulso (x min)</label>
                                <div class="col-md-9">
                                    <input type="text" id="pulso" name="pulso" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="saturacion">Sat. O2 (%)</label>
                                <div class="col-md-9">
                                    <input type="text" id="saturacion" name="saturacion" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="axilar">T. Axilar (°C)</label>
                                <div class="col-md-9">
                                    <input type="text" id="axilar" name="axilar" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="rectal">T. Rectal (°C)</label>
                                <div class="col-md-9">
                                    <input type="text" id="rectal" name="rectal" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="resp">F. Resp (x min)</label>
                                <div class="col-md-9">
                                    <input type="text" id="resp" name="resp" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="peso">Peso (Kg)</label>
                                <div class="col-md-9">
                                    <input type="text" id="peso" name="peso" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="talla">Talla (cm)</label>
                                <div class="col-md-9">
                                    <input type="text" id="talla" name="talla" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="eva">EVA</label><br>
                                <div class="col-md-9">
                                    <input type="text" id="eva" name="eva" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                               <label for="hgt">HGT</label><br>
                                <div class="col-md-9">
                                    <input type="text" id="hgt" name="hgt" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="glasgow">Glasgow</label>
                                <div class="col-md-9">
                                    <input type="text" id="glasgow" name="glasgow" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            @foreach($cro as $clave => $row)
                             <div class="col-md-2">
                                 <label class="checkbox-inline"><input type="checkbox" name="cronico[]" value="{{ $clave }}">{{ $row }}</label>
                             </div>
                            @endforeach
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="categoria">Categoria</label>
                                <select id="categoria" class="form-control" name="categoria" required>
                                    <option value=""> --Seleccione -- </option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    <option value="C4">C4</option>
                                    <option value="C5">C5</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="valor_boleta">Categorizar</label>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                                    Categorizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('div.alert').not('.alert-important').delay(3000).fadeOut("slow");
    });
</script>
@endsection
