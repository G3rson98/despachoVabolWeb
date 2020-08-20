@extends('layout')

@section('content')
    <div class="container" style="padding: 30px 20px 20px 0px">
        <h1 class="text-center">Bitácora</h1>
        <br>
    </div>
    <div class="container">
    {{-- </div> --}}
    <table class="table table-hover">
        <thead>
          <tr class="bg-danger">
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acción</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datos as $dato)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $dato->bit_nombre }}</td>
                <td>{{ $dato->bit_accion }}</td>
                <td>{{ $dato->bit_fecha }}</td>
                <td>{{ $dato->bit_hora }}</td>
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