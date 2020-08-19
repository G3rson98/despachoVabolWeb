@extends('layout')

@section('content')
    <div class="container" style="padding: 30px 20px 20px 0px">
        <h1 class="text-center">Solicitudes de contacto</h1>
        <br>
    </div>
    <div class="container">
    {{-- </div> --}}
    <table class="table table-hover">
        <thead>
          <tr class="bg-danger">
            <th scope="col">#</th>
            <th scope="col">Solicitante</th>
            <th scope="col">Celular</th>
            <th scope="col">Email</th>
            <th scope="col">Contenido</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $solicitud->sol_nombre }} {{ $solicitud->sol_apellido }}</td>
                <td>{{ $solicitud->sol_celular }}</td>
                <td>{{ $solicitud->sol_email }}</td>
                <td>{{ $solicitud->sol_contenido }}</td>
                <td> {{ $solicitud->sol_fecha }}</td>
                <td>
                    @if ($solicitud->sol_estado === "Pendiente")
                    <a href="{{url('/solicitudcontacto/'.$solicitud->sol_id.'/estado')}}" class="btn btn-warning">
                        Pendiente
                    </a> 
                    @else
                    <span class="badge badge-success">Revisado</span>
                    @endif
                    
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