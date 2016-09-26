@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Hi {{ Auth::user()->name }} You are logged in!</p>

                    <p><a href="{{ route('photos.index') }}">Ir a la pagina de fotos</a></p>                    
                </div>
            </div>
        </div>
    </div>

    @if( Auth::user()->friends()->count())
        <div class="col-md-6 col-md-offset-3"><h2>Fotos de tus amigos</h2></div>
        @foreach(Auth::user()->friends as $friend)
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $friend->name }}</div>

                    @foreach($friend->photos as $photo)
                        @include('photos.partials.photo')
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    @else
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Añade amigos a tu perfil y ve sus fotos</div>
            </div>
        </div>
    </div>    
    @endif    
</div>
@endsection
