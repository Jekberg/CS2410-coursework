@if (!in_array($event->id, Session::get('likes')))
    <form class = "col-12" action = "{{route('like.event', $event->id)}}" method = "POST">
        {{csrf_field()}}
        <input class = "form-control btn btn-primary" type = "submit" value = "Like">
    </form>
@else
    <form class = "col-12" action = "{{route('unlike.event', $event->id)}}" method = "POST">
        {{csrf_field()}}
        <input class = "form-control btn btn-secondary" type = "submit" value = "Unlike">
    </form>
@endif
