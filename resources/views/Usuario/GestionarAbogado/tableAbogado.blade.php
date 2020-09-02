<table class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
    <thead>
        <tr role="row">
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Ci</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nombre</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column descending" aria-sort="ascending">Apellido</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Especialidad</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Celular</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Fecha de nacimiento</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Genero</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nro de colegio de abogados</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nro de min de justicia</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nro de registro en la corte</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @csrf
        @foreach ($Abogados as $Abogado)
        <tr role="row" class="odd">
            <td class="" tabindex="0">{{$Abogado->abg_ci}}</td>
            <td class="" tabindex="0">{{$Abogado->abg_nombre}}</td>
            <td class="" tabindex="0">{{$Abogado->abg_apellidop }}</td>
            <td class="" tabindex="0">{{$Abogado->abg_especialidad}}</td>
            <td class="" tabindex="0">{{$Abogado->abg_celular}}</td>
            <td class="" tabindex="0">{{$Abogado->abg_fnacimiento}}</td>
            <td class="" tabindex="0">{{$Abogado->abg_genero}}</td>
            <td class="" tabindex="0">{{$Abogado->abg_nrocolabogados}}</td>
            <td class="" tabindex="0">{{$Abogado->abg_nrominjusticia}}</td>
            <td class="" tabindex="0">{{$Abogado->abg_numregcorte}}</td>
            <td class="" tabindex="0">
                <div class="btn-group btn-group-sm">
                    <a href="{{url('Abogado/edit',$Abogado->abg_ci)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    <a href="{{url('Abogado/destroy',$Abogado->abg_ci)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th rowspan="1" colspan="1">Ci</th>
            <th rowspan="1" colspan="1">Nombre</th>
            <th rowspan="1" colspan="1">Apellidos</th>
            <th rowspan="1" colspan="1">Especialidad</th>
            <th rowspan="1" colspan="1">celular</th>
            <th rowspan="1" colspan="1">Fecha de nacimiento</th>
            <th rowspan="1" colspan="1">Genero</th>
            <th rowspan="1" colspan="1">Nro de colegio de abogados</th>
            <th rowspan="1" colspan="1">Nro de min de justicia</th>
            <th rowspan="1" colspan="1">Nro de registro en la corte</th>
            <th rowspan="1" colspan="1">Acciones</th>
        </tr>
    </tfoot>
</table>