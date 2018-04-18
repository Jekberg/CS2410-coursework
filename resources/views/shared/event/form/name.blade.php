<div class = "form-group">
	<label for = "name-input">Event name</label>
	<input id = "name-input" class = "form-control {{$errors->has('name')? 'is-invalid' : ''}}" name = "name" type = "text" placeholder = "Name" pattern = "[0-9a-zA-Z][0-9a-zA-Z ]*" value = "{{old('name', isset($event)? $event->name: '')}}" required>
	@if ($errors->has('name'))
		<span class="invalid-feedback">
			<strong>{{$errors->first('name')}}</strong>
		</span>
	@endif
</div>
