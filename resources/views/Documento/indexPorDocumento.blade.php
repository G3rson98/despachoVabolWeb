@extends('layout')

@section('content')
<div class="container">
    <div class="card card-primary card-outline">
        <div class="card-header">
              <h3 class="card-title">Documentos de la categoría: {{$categoria->catdoc_nombre}} </h3>
        </div>
        <div class="card-footer bg-white">
                <div class="row">
                    @if($documentosPorCategoria->count())  
                        @foreach($documentosPorCategoria as $docCat) 
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <span class="mailbox-attachment-icon"><i class="far fa-file-alt"></i></span>

                                <div class="mailbox-attachment-info">
                                <div  class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{$docCat->doc_titulo}}</div>
                                    <span class="mailbox-attachment-size clearfix mt-1">
                                        <span>{{$docCat->doc_fechasubida}}</span>
                                        <a href="{{ route('documento.show', $docCat->doc_id) }}" class="btn btn-primary btn-sm float-right">Ver</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                           
                        @endforeach
                    @else
                        <h1>No hay documentos en esta categoría</h1>
                    @endif 
                </div>
               
        </div>

    </div>
</div>
@endsection()