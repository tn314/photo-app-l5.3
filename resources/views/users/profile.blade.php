<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <div class="row">
            <div class="col-md-9">
                {{ $user->name }}
            </div>
            <div class="col-md-3">
                @if(Auth::check() && (Auth::id() !== $user->id))
                    @if($user->is_friend)
                        <form action="{{ route('friends', $user->name) }}" method="POST">    
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}                  
                            <button class="btn btn-default" type="submit">Delete friend</button>
                        </form>
                    @else
                        <form action="{{ route('friends', $user->name) }}" method="POST">    
                            {{ csrf_field() }}
                            <button class="btn btn-success" type="submit">Add friend</button>
                        </form>
                    @endif
                @endif
            </div>            
        </div>
    </div>
</div>