<div class = "form-group">
    <label for = "name"> Name:</label>
    <input id = "name" class = "form-control {{$errors->has('name')? 'is-invalid' : ''}}" name = "name" type = "text" value = "{{old('name', Auth::user()->name)}}">
    @if ($errors->has('name'))
		<span class="invalid-feedback">
			<strong>{{$errors->first('name')}}</strong>
		</span>
	@endif
</div>
