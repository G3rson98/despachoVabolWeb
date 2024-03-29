@extends('layout')

@section('content')
<h1>Gestionar Abogado</h1>
<br>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))

    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    @endforeach
</div> <!-- end .flash-message -->
<br>
<br>
<div class="input-group flex-nowrap">
    <div class="input-group-prepend">
        <span class="input-group-text" id="addon-wrapping">Buscar</span>
    </div>
    <input type="text" class="form-control" id="texto" placeholder="Numero de CI">
</div>

<div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row" style="margin-top: 5%; margin-bottom: 15px">
            <div class="col-sm-12">
                <a href="{{route('abogado.create')}}" role="button" class="btn btn-success">Registrar Abogado</a>
            </div>

        </div>
        <div id="resultado" class="row">
            <div class="col-sm-12">
                @include('Usuario.GestionarAbogado.tableAbogado')
            </div>
        </div>

    </div>
</div>
<div class="card-footer text-muted">
    <div style="display: flex; justify-content: flex-end">
        <h4>Cantidad de visitas: {{ $visitas[0]->numero_visitas }}</h4>
    </div>
</div>


<script>
    window.addEventListener("load", function() {
        document.getElementById("texto").addEventListener("keyup", function() {
            //console.log(document.getElementById("texto").value)
            fetch(`http://tecnoweb.org.bo/grupo02sa/despachoVabolWeb/public/Abogado/buscador?texto=${document.getElementById("texto").value}`, {
                    method: 'get'
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById("resultado").innerHTML = html
                })
        })
    })
</script>

@endsection