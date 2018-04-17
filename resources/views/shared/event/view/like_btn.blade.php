@if (!array_key_exists($event->id, Session::get('likes')))
    <form class = "col-12" action = "{{route('like.event')}}" method = "POST">
        {{csrf_field()}}
        <input name = "id" type = "hidden" value = "{{$event->id}}">
        <input class = "form-control btn btn-primary" type = "submit" value = "Like">
    </form>
@else
    <form class = "col-12" action = "{{route('unlike.event')}}" method = "POST">
        {{csrf_field()}}
        <input name = "id" type = "hidden" value = "{{$event->id}}">
        <input class = "form-control btn btn-secondary" type = "submit" value = "Unlike">
    </form>
@endif
