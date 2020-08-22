@extends('layout')

@section('content')
{{-- <div style="margin: 50px 20px 20px 20px"> --}}
    <div class="container" style="padding: 30px 20px 20px 0px">
        <h1 class="text-center">Anuncios</h1>
        <br>
        <a href="{{ url('/anuncio/create') }}" class="btn btn-success">
            Agregar Anuncio +
        </a> 
    </div>
    <div class="container">
    {{-- </div> --}}
    <table class="table table-hover">
        <thead>
          <tr class="bg-danger">
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Contenido</th>
            <th scope="col">Fecha de publicación</th>
            <th scope="col">Hora de publicación</th>
            <th scope="col">Abogado</th>
            <th scope="col">Categoría</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($anuncios as $anuncio)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $anuncio->anu_titulo }}</td>
                <td>{{ $anuncio->anu_contenido }}</td>
                <td>{{ $anuncio->anu_fechapub }}</td>
                <td>{{ $anuncio->anu_horapub }}</td>
                <td>{{ $anuncio->abg_nombre }} {{ $anuncio->abg_apellidop }} {{ $anuncio->abg_apellidom }}</td>
                <td>{{ $anuncio->cat_nombre }}</td>
                {{-- <td>{{ $anuncio->anu_estado }}</td> --}}
                <td>
                    @if ($anuncio->anu_estado === 1)
                    <a href="{{url('/anuncio/'.$anuncio->anu_id.'/estado')}}" class="btn btn-success">
                        Activo
                    </a> 
                    @else
                    <a href="{{url('/anuncio/'.$anuncio->anu_id.'/estado')}}" class="btn btn-warning">
                        Inactivo
                    </a>    
                    @endif
                    
                </td>
                <td>
                    <a href="{{url('/anuncio/'.$anuncio->anu_id.'/edit')}}" class="btn btn-primary">
                        Editar
                    </a>
                    <form action="{{ url('/anuncio/'.$anuncio->anu_id) }}" method="POST" style="display: inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar el anuncio?');">Borrar</button>
                    </form>  
                </td>
            </tr>  
            @endforeach
          
        </tbody>
      </table>
      <br>
      <div style="display: flex; justify-content: flex-end">
        {{-- @foreach ($visitas as $visita)
            <h4>Cantidad de visitas: {{ $visita->numero_visitas }}</h4>
        @endforeach --}}
        <h4>Cantidad de visitas: {{ $visitas[0]->numero_visitas }}</h4>
      </div>
        
</div>

@endsection()