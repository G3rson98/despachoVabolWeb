@extends('layout')

@section('content')
<div class="card-body p-0">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row" style="margin-top: 5%; margin-bottom: 15px">
            <div class="col-sm-12">
                <a href="{{route('cliente.create')}}" role="button" class="btn btn-success">Registrar Cliente</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
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
                                    <a href="{{url('Cliente/destroy',$Cliente->cl_nit)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                        <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection