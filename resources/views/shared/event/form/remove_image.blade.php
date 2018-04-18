<div class = "form-group">
    <label for = "old-img-div">Remove old images</label>
    <div id = "old-img-div" class = "form-group">
        @foreach($event->images as $img)
            <div class = "form-check">
                <input id = "{{$img->name}}" class = "form-check-input" type = "checkbox" name = "{{$img->id}}" value = "{{$img->name}}">
                <label for = "{{$img->name}}">
                    <a href = "{{asset('storage/uploads/' . $img->name)}}" target = "_blank">{{$img->name}}</a>
                </label>
            </div>
        @endforeach
    </div>
</div>
<input class = "form-control btn btn-success" type = "submit" value = "Update">
