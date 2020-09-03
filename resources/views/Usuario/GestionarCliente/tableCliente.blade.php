<table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
    <thead>
        <tr role="row">
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">NIT</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ciudad</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column descending" aria-sort="ascending">Descripcion</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Direccion</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nombre de representante</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Pagina web</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Pais</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Razonsocial</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Rubro</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Telefono</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @csrf
        @foreach ($Clientes as $Cliente)
        <tr role="row" class="odd">
            <td class="" tabindex="0">{{$Cliente->cl_nit}}</td>
            <td class="" tabindex="0">{{$Cliente->cl_ciudad}}</td>
            <td class="" tabindex="0">{{$Cliente->cl_descripcion }}</td>
            <td class="" tabindex="0">{{$Cliente->cl_direccion}}</td>
            <td class="" tabindex="0">{{$Cliente->cl_nrepresentante}}</td>
            <td class="" tabindex="0">{{$Cliente->cl_paginaweb}}</td>
            <td class="" tabindex="0">{{$Cliente->cl_pais}}</td>
            <td class="" tabindex="0">{{$Cliente->cl_razonsocial}}</td>
            <td class="" tabindex="0">{{$Cliente->cl_rubro}}</td>
            <td class="" tabindex="0">{{$Cliente->cl_telefono}}</td>
            <td class="" tabindex="0">
                <div class="btn-group btn-group-sm">
                    <a href="{{url('Cliente/edit',$Cliente->cl_nit)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    <a href="{{url('Cliente/destroy',$Cliente->cl_nit)}}" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar el cliente?');"><i class="fas fa-trash"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th rowspan="1" colspan="1">NIT</th>
            <th rowspan="1" colspan="1">Ciudad</th>
            <th rowspan="1" colspan="1">Descripcion</th>
            <th rowspan="1" colspan="1">Direccion</th>
            <th rowspan="1" colspan="1">Nombre de representante</th>
            <th rowspan="1" colspan="1">Pagina web</th>
            <th rowspan="1" colspan="1">Pais</th>
            <th rowspan="1" colspan="1">Razonsocial</th>
            <th rowspan="1" colspan="1">Rubro</th>
            <th rowspan="1" colspan="1">Telefono</th>
            <th rowspan="1" colspan="1">Acciones</th>
        </tr>
    </tfoot>
</table>