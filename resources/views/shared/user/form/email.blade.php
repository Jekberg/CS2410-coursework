<div class = "form-group">
    <label for = "email"> Email:</label>
    <input id = "email" class = "form-control {{$errors->has('name')? 'is-invalid' : ''}}" type = "text" value = "{{old('email', Auth::user()->email)}}" readonly>
</div>
