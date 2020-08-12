@extends('layout')

@section('content')
<br>
<div class="container">
    
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Read Mail</h3>

            <div class="card-tools">
            <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <h5>Message Subject Is Placed Here</h5>
                <h6>From: support@adminlte.io
                    <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span></h6>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
        
            <!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                    <p>Hello John,</p>

                    <p>Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird
                        on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
                        master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
                        gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon
                        asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu
                        blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American
                        Apparel.</p>

                    <p>Raw denim McSweeney's bicycle rights, iPhone trust fund quinoa Neutra VHS kale chips vegan PBR&amp;B
                        literally Thundercats +1. Forage tilde four dollar toast, banjo health goth paleo butcher. Four dollar
                        toast Brooklyn pour-over American Apparel sustainable, lumbersexual listicle gluten-free health goth
                        umami hoodie. Synth Echo Park bicycle rights DIY farm-to-table, retro kogi sriracha dreamcatcher PBR&amp;B
                        flannel hashtag irony Wes Anderson. Lumbersexual Williamsburg Helvetica next level. Cold-pressed
                        slow-carb pop-up normcore Thundercats Portland, cardigan literally meditation lumbersexual crucifix.
                        Wayfarers raw denim paleo Bushwick, keytar Helvetica scenester keffiyeh 8-bit irony mumblecore
                        whatever viral Truffaut.</p>

                    <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny
                        pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar
                        toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo
                        locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney's messenger bag swag
                        slow-carb. Odd Future photo booth pork belly, you probably haven't heard of them actually tofu ennui
                        keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>

                    <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray
                        leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American
                        Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral
                        plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid
                        vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha
                        flannel chambray chia cronut.</p>

                    <p>Thanks,<br>Jane</p>
                </div>
            <!-- /.mailbox-read-message -->
                </div>
        </div>
    </div>

    <div class="card direct-chat direct-chat-warning">
        <div class="card-header">
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
                            <span class="direct-chat-name float-left">{{$comdoc->usu_email}}</span>
                            <span class="direct-chat-timestamp float-right">{{$comdoc->com_fecha}} || {{$comdoc->com_hora}}</span>
                        </div>
                        <img class="direct-chat-img" src="/dist/img/user1-128x128.jpg" alt="message user image">
                        <div class="direct-chat-text">
                            {{$comdoc->com_contenido}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <form method="POST" action="{{ route('comentario.store') }}" role="form">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="com_contenido" id="com_contenido" placeholder="Escribe tu comentario..." class="form-control">
                        <input type="hidden" name="com_doc" id="com_doc" class="form-control" value="{{$documento->doc_id}}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-warning">Enviar</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection()