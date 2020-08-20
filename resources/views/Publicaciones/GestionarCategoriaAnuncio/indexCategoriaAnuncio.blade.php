@extends('layout')

@section('content')
{{-- <div style="margin: 50px 20px 20px 20px"> --}}
    <div class="container" style="padding: 30px 20px 20px 0px">
        <h1 class="text-center">Categorías de Anuncios</h1>
        <br>
        <a href="{{ url('/categoriaanuncio/create') }}" class="btn btn-success">
            Agregar Categoría de Anuncio +
        </a> 
    </div>
    <div class="container">
    {{-- </div> --}}
    <table class="table table-hover">
        <thead>
          <tr class="bg-danger">
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $categoria->cat_nombre }}</td>
                <td>{{ $categoria->cat_descripcion }}</td>
                <td>
                    <a href="{{url('/categoriaanuncio/'.$categoria->cat_id.'/edit')}}" class="btn btn-primary">
                        Editar
                    </a>
                    <form action="{{ url('/categoriaanuncio/'.$categoria->cat_id) }}" method="POST" style="display: inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar la categoría?');">Borrar</button>
                    </form>  
                </td>
            </tr>  
            @endforeach
          
        </tbody>
      </table>
      <br>
    <div style="display: flex; justify-content: flex-end">
        @foreach ($visitas as $visita)
            <h4>Cantidad de visitas: {{ $visita->numero_visitas }}</h4>
        @endforeach
    </div>
</div>

@endsection()