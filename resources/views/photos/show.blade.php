@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('photos.partials.photo')
        </div>
    </div>
</div>
@endsection
