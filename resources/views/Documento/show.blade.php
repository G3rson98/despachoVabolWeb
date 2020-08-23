@extends('layout')

@section('content')
<br>
<div class="container">
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
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Documento</h3>
        </div>
        <div class="card-body p-0">
            <div class="mailbox-controls with-border text-center">
                <div class="mailbox-read-message">
                    <section class="content">

                    <!-- Default box -->
                    <div class="card card-solid">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h3 class="d-inline-block d-sm-none">Título:  {{$documento[0]->doc_titulo}} </h3>
                                        <div class="col-12">
                                            @if($extensionArchivo === 'pdf')
                                            <img src="{{asset('storage/upload/imagenPDF.png')}}" class="product-image" style="width:400px; height:500px;" >
                                            @elseif($extensionArchivo === 'docx')
                                            <img src="{{asset('storage/upload/imagenWord.svg.png')}}" class="product-image" style="width:500px; height:500px;" >
                                            @elseif($extensionArchivo === 'rar')
                                            <img src="{{asset('storage/upload/imagenRar.webp')}}" class="product-image" style="width:500px; height:500px;" >
                                            @elseif($extensionArchivo === 'txt')
                                            <img src="{{asset('storage/upload/imagenTxt.png')}}" class="product-image" style="width:500px; height:500px;" >
                                            @elseif($extensionArchivo === 'xlsx')
                                            <img src="{{asset('storage/upload/imagenExcel.png')}}" class="product-image" style="width:500px; height:500px;" >
                                            @elseif($extensionArchivo === 'ppt')
                                            <img src="{{asset('storage/upload/imagenPpt.png')}}" class="product-image" style="width:500px; height:500px;" >
                                            @elseif($extensionArchivo === 'jpg' )
                                            <img src="{{asset('storage/'.$documento[0]->doc_url)}}" class="product-image" style="width:500px; height:500px;" >
                                            @elseif($extensionArchivo === 'png' )
                                            <img src="{{asset('storage/'.$documento[0]->doc_url)}}" class="product-image" style="width:500px; height:500px;" >
                                            @elseif($extensionArchivo === 'jpeg' )
                                            <img src="{{asset('storage/'.$documento[0]->doc_url)}}" class="product-image" style="width:500px; height:500px;" >
                                            @elseif($extensionArchivo === 'webp' )
                                            <img src="{{asset('storage/'.$documento[0]->doc_url)}}" class="product-image" style="width:500px; height:500px;" >
                                            @else
                                            <img src="{{asset('storage/upload/imagenFile.svg')}}" class="product-image" style="width:500px; height:500px;" >
                                            @endif
                                        </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h3 class="my-3">Título:  {{$documento[0]->doc_titulo}}</h3>
                                    <p>Descripción: {{$documento[0]->doc_descripcion}}</p>
                                    <hr>
                                    <p>Subido por: Abg. {{$documento[0]->abg_nombre}} {{$documento[0]->abg_apellidop}} {{$documento[0]->abg_apellidom}}</p>
                                    <p>Para: {{$documento[0]->cl_razonsocial}}</p>
                                    <hr>
                                    <p>Fecha subida:  {{$documento[0]->doc_fechasubida}}</p>
                                    <p>Hora subida: {{$documento[0]->doc_horasubida}}</p>
                                    <div class="mt-4">
                                        <a href="{{route('documento.download', $documento[0]->doc_id)}}" class="btn btn-danger btn-lg btn-flat">
                                            <i class="fas fa-download"></i>
                                                Descargar
                                        </a>
                                        @if(auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Abogado')
                                        <button href="#" id="edit_documento" class="btn btn-primary btn-lg btn-flat" data-myid="{{$documento[0]->doc_id}}" data-mydescripcion="{{$documento[0]->doc_descripcion}}" data-toggle="modal" data-target="#editdocumento"> <i class="fas fa-edit"></i>Editar</button>
                                        <form method="post" action="{{route('documento.destroy',  $documento[0]->doc_id)}}" style="display: inline">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button  class="btn btn-warning btn-lg btn-flat" type="submit" onclick="return confirm('¿Seguro que desea eliminar el documento?');"> <i class="fas fa-trash-alt"></i> Eliminar </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="card direct-chat direct-chat-warning card-warning">
        <div class="card-header ">
            <h3 class="card-title">Comentarios</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
        </div>
        <div class="card-body">
            <div class="direct-chat-messages">
                @foreach($comentariosDoc as $comdoc)
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">{{$comdoc->email}}</span>
                            <span class="direct-chat-timestamp float-right">{{$comdoc->com_fecha}} || {{$comdoc->com_hora}}</span>
                        </div>
                        <img class="direct-chat-img" src="/dist/img/user1-128x128.jpg" alt="message user image">
                        <div class="direct-chat-text">
                            {{$comdoc->com_contenido}}
                                @if(auth()->user()->id == $comdoc->com_usuario)
                                    <button href="#" id="edit_item" class="btn" data-myid="{{$comdoc->com_id}}" data-mycontent="{{$comdoc->com_contenido}}" data-mydoc="{{$comdoc->com_doc}}" data-myuser="{{$comdoc->com_usuario}}" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>
                                    <form method="post" action="{{route('comentario.destroy', $comdoc->com_id)}}" style="display: inline">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button  class="btn" type="submit" onclick="return confirm('¿Seguro que desea eliminar el comentario?');"><i class="fas fa-trash-alt"></i></i></button>
                                    </form>
                                @endif
                            
                        </div>
                    </div>
                    
                @endforeach
            </div>
            <div class="card-footer">
                <form method="POST" action="{{ route('comentario.store') }}" role="form">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="com_contenido" id="com_contenido" placeholder="Escribe tu comentario..." class="form-control">
                        <input type="hidden" name="com_doc" id="com_doc" class="form-control" value="{{$documento[0]->doc_id}}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-warning">Enviar</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Comentario-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('comentario.update', 'test') }}" role="form">
            {{method_field('patch')}}
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="catdoc_nombre">Contenido</label>
                    <textarea  class="form-control" name="com_contenido" id="com_contenido"></textarea>
                </div>
                    <input type="hidden" class="form-control" name="com_id" id="com_id">
                    <input type="hidden" class="form-control" name="com_doc" id="com_doc">
                    <input type="hidden" class="form-control" name="com_usuario" id="com_usuario">
                    <button type="submit" class="btn btn-primary btn-bottom-right">Editar</button>
            </div>
                
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Documento -->
<div class="modal fade" id="editdocumento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar documento: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('documento.update', 'test') }}" role="form">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="catdoc_nombre">Descripción: </label>
                    <textarea  class="form-control" name="doc_descripcion" id="doc_descripcion"></textarea>
                </div>
                    <input type="hidden" class="form-control" name="doc_id" id="doc_id">
                    <button type="submit" class="btn btn-primary btn-bottom-right">Editar</button>
            </div>
                
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
    </div>
    </div>
  </div>
</div>

<div style="display: flex; justify-content: flex-end">
        <h4>Cantidad de visitas: {{ $visitas[0]->numero_visitas }}</h4>
</div>

@endsection()