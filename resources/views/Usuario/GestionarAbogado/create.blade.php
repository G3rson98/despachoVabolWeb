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
                    <h3 class="card-title">Registrar Abogado</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{url('Abogado/store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">CI</label>
                                <input type="text" class="form-control" name="abg_ci" id="exampleInputEmail1" placeholder="ej.123456789" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" class="form-control" name="abg_nombre" id="exampleInputPassword1" placeholder="Ej.Sebastian" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Apellido Paterno</label>
                                <input type="text" class="form-control" name="abg_apellidop" id="exampleInputPassword1" placeholder="Ej.Frankfurt" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Apellido Materno</label>
                                <input type="text" class="form-control" name="abg_apellidom" id="exampleInputPassword1" placeholder="Ej.Schniuler" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Especialidad</label>
                                <input type="text" class="form-control" name="abg_especialidad" id="exampleInputPassword1" placeholder="Ej.Penal" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Celular</label>
                                <input type="text" class="form-control" name="abg_celular" id="exampleInputPassword1" placeholder="Ej.77231123" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fecha de nacimiento</label>
                            <div class="row align-items-center justify-content-center">
                                <div class="col-xs">
                                    <label for="exampleInputPassword1">Año</label>
                                    <input type="text" class="form-control" name="abg_ano" id="exampleInputPassword1" placeholder="Ej.1995" required>
                                </div>
                                <div class="col-xs">
                                    <label for="exampleInputPassword1">Mes</label>
                                    <input type="text" class="form-control" name="abg_mes" id="exampleInputPassword1" placeholder="Ej.10" required>
                                </div>
                                <div class="col-xs">
                                    <label for="exampleInputPassword1">Dia</label>
                                    <input type="text" class="form-control" name="abg_dia" id="exampleInputPassword1" placeholder="Ej.25" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="validationDefault04">Genero</label>
                                <div class="col-md-3 mb-3 col-md-6">
                                    <select class="custom-select" name="abg_genero" id="validationDefault04" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                        <option>Sin Especificar</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Numero de Registro en colegio de abogados</label>
                                <input type="text" class="form-control" name="abg_nrocolabogados" id="exampleInputPassword1" placeholder="Ej.25234">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Numero de registro en el ministerio de justicia</label>
                                <input type="text" class="form-control" name="abg_nrominjusticia" id="exampleInputPassword1" placeholder="Ej.1442">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Numero de registro en la corte</label>
                                <input type="text" class="form-control" name="abg_numregcorte" id="exampleInputPassword1" placeholder="Ej.7234">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" class="form-control" name="email" id="exampleInputPassword1" placeholder="Ejemplo@tecnoweb.com">
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault04">Rol</label>
                                <div class="col-md-3 mb-3 col-md-6">
                                    <select class="custom-select" name="rol" id="validationDefault04" required>
                                        <option selected>Abogado</option>
                                        @if(auth()->user()->rol === 'Administrador')
                                        <option>Administrador</option>
                                        @endif
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Confirmar contraseña</label>
                                <input type="password" class="form-control" name="password_Confirm" id="exampleInputPassword1">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <button type="submit" class="btn btn-primary">Submit</button>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="text-muted">
    <div style="display: flex; justify-content: flex-end">
        <h4>Cantidad de visitas: {{ $visitas[0]->numero_visitas }}</h4>
    </div>
</div>

@endsection