<div class="panel panel-default">
    <div class="panel-heading"><a href="{{ route('photos.show', $photo->id) }}">{{ $photo->title }}</a> <b>By:</b> {{ $photo->author->name }}</i></div>
    @can('destroy', $photo)
    <div>
        <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
            {{ csrf_field() }}

            {{ method_field('DELETE') }}

            <button class="btn btn-danger">Delete photo</button>
        </form>
    </div>
    @endcan
    <div>
      <img class="img-responsive" src="{{ $photo->image_url }}" alt="{{ $photo->title }} {{ $photo->image_url }}">
    </div>
    <div class="panel-body">
        {{ $photo->body }}
    </div>
</div>