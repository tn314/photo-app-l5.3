@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-default">
                <div class="panel-heading">Edita tu foto</div>

                <div class="panel-body">
                    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $photo->title) }}">
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        </div>

                        <div>
                            <img class="img-responsive" src="{{ $photo->image_url }}" alt="{{ $photo->title }}">
                        </div>

                        <br>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="control-label">Body</label>
                            <textarea name="body" id="body" class="form-control" cols="10">{{ old('body', $photo->body) }}</textarea>
                            <span class="help-block">{{ $errors->first('body') }}</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Upload image</button>                                                 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection