@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-default">
                <div class="panel-heading">Añade tu foto</div>

                <div class="panel-body">
                    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image" class="form-control">
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="control-label">Body</label>
                            <textarea name="body" id="body" class="form-control" cols="10">{{ old('body') }}</textarea>
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