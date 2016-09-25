@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($photos as $photo)
                @include('photos.partials.photo')
            @endforeach
        </div>
    </div>
</div>
@endsection
