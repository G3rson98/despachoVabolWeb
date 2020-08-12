@extends('layout')

@section('content')
<div style="margin: 50px 20px 20px 20px">
    <table class="table">
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
                    <form action="{{ url('/categoriaanuncio/'.$categoria->cat_id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar la categoría?');">Borrar</button>
                    </form>  
                </td>
            </tr>  
            @endforeach
          
        </tbody>
      </table>
</div>

@endsection()