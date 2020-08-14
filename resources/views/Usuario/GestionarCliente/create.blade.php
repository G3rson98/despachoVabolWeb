@extends('layout')

@section('content')

<div class="Container p-4">
    <div class="row align-items-center justify-content-center ">
        <div class="col-sm-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registrar Cliente</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{url('Cliente/store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">NIT</label>
                                <input type="text" class="form-control" name="cl_nit" id="exampleInputEmail1" placeholder="ej.1234567" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Ciudad</label>
                                <input type="text" class="form-control" name="cl_ciudad" id="exampleInputPassword1" placeholder="Ej.Santa cruz" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Descripcion</label>
                                <input type="text" class="form-control" name="cl_descripcion" id="exampleInputPassword1" placeholder="Ej.Fabrica de hamburguesas" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Direccion</label>
                                <input type="text" class="form-control" name="cl_direccion" id="exampleInputPassword1" placeholder="Ej.Calle la alegria #50" required>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Nombre de representante</label>
                                <input type="text" class="form-control" name="cl_nrepresentante" id="exampleInputPassword1" placeholder="Ej.Sebastian Frankfurt" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Pagina Web</label>
                                <input type="text" class="form-control" name="cl_paginaweb" id="exampleInputPassword1" placeholder="Ej.www.Santacruz.com" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Pais</label>
                                <input type="text" class="form-control" name="cl_pais" id="exampleInputPassword1" placeholder="Ej.Bolivia">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Razon social</label>
                                <input type="text" class="form-control" name="cl_razonsocial" id="exampleInputPassword1" placeholder="Ej.Bioseguros.srl">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Rubro</label>
                                <input type="text" class="form-control" name="cl_rubro" id="exampleInputPassword1" placeholder="Ej.Material de bioseguridad">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Telefono</label>
                                <input type="text" class="form-control" name="cl_telefono" id="exampleInputPassword1" placeholder="Ej.723443">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection