@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Bienvenido {{auth()->user()->email}}</h1>
                    <h1>{{session('nombre')}}</h1>

                    <h2>{{auth()->user()->colora}}</h2>
                    <h2>{{auth()->user()->colorb}}</h2>
                    <h2>{{auth()->user()->colorc}}</h2>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection