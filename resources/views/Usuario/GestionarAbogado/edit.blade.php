@extends('layout')

@section('content')

<div class="Container p-4">
    <div class="row align-items-center justify-content-center ">
        <div class="col-sm-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Modificar Abogado</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{url('Abogado/update/'.$Abogado['abg_ci'])}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">CI</label>
                                <input type="text" class="form-control" name="abg_ci" id="exampleInputEmail1" placeholder="ej.123456789" value="{{$Abogado->abg_ci}}" required readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" class="form-control" name="abg_nombre" id="exampleInputPassword1" placeholder="Ej.Sebastian" value="{{$Abogado->abg_nombre}}" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Apellido Paterno</label>
                                <input type="text" class="form-control" name="abg_apellidop" id="exampleInputPassword1" placeholder="Ej.Frankfurt" value="{{$Abogado->abg_apellidop}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Apellido Materno</label>
                                <input type="text" class="form-control" name="abg_apellidom" id="exampleInputPassword1" placeholder="Ej.Schniuler" value="{{$Abogado->abg_apellidom}}" required>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Especialidad</label>
                                <input type="text" class="form-control" name="abg_especialidad" id="exampleInputPassword1" placeholder="Ej.Penal" value="{{$Abogado->abg_especialidad}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Celular</label>
                                <input type="text" class="form-control" name="abg_celular" id="exampleInputPassword1" placeholder="Ej.77231123" value="{{$Abogado->abg_celular}}" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fecha de nacimiento</label>
                            <div class="row align-items-center justify-content-center">
                                <div class="col-xs">
                                    <label for="exampleInputPassword1">Año</label>
                                    <input type="text" class="form-control" name="abg_ano" id="exampleInputPassword1" placeholder="Ej.1995" value="{{substr($Abogado->abg_fnacimiento,0,4)}}" required>
                                </div>
                                <div class="col-xs">
                                    <label for="exampleInputPassword1">Mes</label>
                                    <input type="text" class="form-control" name="abg_mes" id="exampleInputPassword1" placeholder="Ej.10" value="{{substr($Abogado->abg_fnacimiento,5,2)}}" required>
                                </div>
                                <div class="col-xs">
                                    <label for="exampleInputPassword1">Dia</label>
                                    <input type="text" class="form-control" name="abg_dia" id="exampleInputPassword1" placeholder="Ej.25" value="{{substr($Abogado->abg_fnacimiento,8,2)}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="validationDefault04">Genero</label>
                                <div class="col-md-3 mb-3 col-md-6">
                                    <select class="custom-select" name="abg_genero" id="validationDefault04" required>
                                        <option>{{$Abogado->abg_genero}}</option>
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                        <option>Sin Especificar</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Numero de Registro en colegio de abogados</label>
                                <input type="text" class="form-control" name="abg_nrocolabogados" id="exampleInputPassword1" placeholder="Ej.25234" value="{{$Abogado->abg_nrocolabogados}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Numero de registro en el ministerio de justicia</label>
                                <input type="text" class="form-control" name="abg_nrominjusticia" id="exampleInputPassword1" placeholder="Ej.1442" value="{{$Abogado->abg_nrominjusticia}}">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Numero de registro en la corte</label>
                                <input type="text" class="form-control" name="abg_numregcorte" id="exampleInputPassword1" placeholder="Ej.7234" value="{{$Abogado->abg_numregcorte}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection