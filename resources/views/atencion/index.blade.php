@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
            <div class="panel panel-primary">
                <div class="panel-heading">LIsta Espera SAPU</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>FOLIO</th>
                                <th>RUT PACIENTE</th>
                                <th>RUT ACOMPANANTE</th>
                                <th>N° IDENTIFICACION</th>
                                <th>NOMBRE</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($aten as $row)
                                <tr class="{{($row->estado_id==2)?'success':''}}">
                                    <td> {{ $row->id }} </td>
                                    <td> {{ $row->usuario->runCompleto() }} </td>
                                    <td>{{ $row->usuario->run_acompanante }}  </td>
                                    <td>{{ $row->usuario->dni }}  </td>
                                    <td>{{ $row->usuario->nombreCompleto() }}  </td>
                                    <td>{{ $row->estado->nombre }}  </td>
                                    <td>
                                        <a href="{{ route('categorizacion.edit',$row->id) }}" class="btn btn-success justify-content-center">
                                            <i class="fa fa-heartbeat" aria-hidden="true"></i>
                                        </a>
                                        <a href="" class="btn btn-danger justify-content-center">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $aten->links() }}
                    </div>
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
