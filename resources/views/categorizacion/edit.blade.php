@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
            <div class="panel panel-primary">
                <div class="panel-heading">Categorizacion SAPU</div>
                <div class="panel-body">
                    <form id="form-cat" class="form-horizontal" method="POST" action="{{ route('categorizacion.update',$aten->id) }}">
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
                                    @php
                                    $flag=false;
                                    @endphp
                                @foreach($aten->usuario->cronicos as $cronico)

                                    @if($clave == $cronico->id)
                                        @php
                                        $flag=true;
                                        break;
                                        @endphp
                                     @else 
                                        @php
                                        $flag=false;
                                        @endphp   
                                    @endif
                                @endforeach           
                                     <div class="col-md-2">
                                         <label class="checkbox-inline"><input type="checkbox" name="cronico[]" value="{{ $clave }}" 
                                          @if($flag) checked="checked" @endif >{{ $row }}
                                         </label>
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
                            <div class="col-md-6">
                                <label for="nom_alergia">Alergias</label>
                                <div class="input-group">
                                     <input type="text" id="nom_alergia" name="alergia" class="form-control">
                                        <span class="input-group-btn">
                                            <button id="btn_agregar"
                                             class="btn btn-primary" type="button">
                                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                        <span class="input-group-btn">
                                            <button id="btn_eliminar"
                                             class="btn btn-danger" type="button">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <table id="tbl_alergia" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ALERGIA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="valor_boleta">Categorizar</label>
                                <button id="btn_submit" type="submit" class="btn btn-success">
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
        
        $("#nom_alergia").autocomplete({
            source: "{{ URL('search/alergias')}}",
            minLength: 3,
            select: function(event, ui) {
            $("#nom_alergia").attr("data-id", ui.item.id);
            }
        });

        var table = $('#tbl_alergia').DataTable({
            "ordering": false,
            "paging": false,
            "searching": false
        });
        @foreach($aten->usuario->alergias as $aler)
             table.row.add([
                        '{{ $aler->id }}',
                        '{{ $aler->nombre }}'
                    ]).draw(false);
        @endforeach

         $('#btn_agregar').on('click', function () {

            var alergia = $('#nom_alergia').attr('data-id');
            var nombre = $('#nom_alergia').val();
                if (alergia!="") {
                    table.row.add([
                        alergia,
                        nombre
                    ]).draw(false);
                    $("#nom_alergia").attr("data-id","");
                    $("#nom_alergia").val("");
                    $("#nom_alergia").focus();
                } else {
                    alert("No Se Permite Agregar Campo Vacio");
                }
            

        });

         $('#tbl_alergia tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#btn_eliminar').click(function () {
            var data = table.row('.selected').data();
            table.row('.selected').remove().draw( false );
        });

        $('#btn_submit').click( function() {
             if(!table.data().count()){
                    $("#nom_alergia").val("vacio");
                }else {
                   var json = $('#tbl_alergia').tableToJSON(); 
                    $('#nom_alergia').val(JSON.stringify(json));
                }
        });
    });
</script>
@endsection
