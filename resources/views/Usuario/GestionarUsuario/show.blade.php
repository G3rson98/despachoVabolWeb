@extends('layout')

@section('content')

<div class="Container p-4">
    <div class="row align-items-center justify-content-center ">
        <div class="col-sm-8">
            <div class="card card-primary">
                {{-- errores --}}
                @if (count($errors)>0)
                <div class="alert alert-default-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- errores --}}
                <div class="card-header">
                    <h3 class="card-title">Perfil de Usuario</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{url('Usuario/update')}}" enctype = "multipart/form-data" files = "true">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" value="{{ auth()->user()->email}}" readonly>
                            </div>
                        </div>
                        <label for="">Cambiar contraseña</label>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Nueva Contraseña</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Confirmar contraseña</label>
                                <input type="password" class="form-control" name="password_Confirm" id="exampleInputPassword1">
                            </div>
                        </div>
                        <!-- <label>Escoja una foto de perfil:</label>
                        <div class="form-group">
                            <input type="file" id="picture" name="picture">
                        </div> -->
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{url('/dashboard')}}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('¿Seguro que desea modificar su contraseña?');">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection