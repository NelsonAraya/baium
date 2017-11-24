@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('flash::message')
            <div class="panel panel-primary">
                <div class="panel-heading">Busqueda Usuarios</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admision.show') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="run">R.U.N</label>
                                <input type="text" id="run" class="form-control" name="run" placeholder="12345678-9" autocomplete="off">
                            </div>
                            <div class="col-md-1">
                                <label for="btn_buscar">Buscar</label>
                                <button id="btn_buscar" class="btn btn-success">Buscar</button>
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
