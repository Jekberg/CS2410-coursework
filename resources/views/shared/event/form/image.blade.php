<div class = "form-group">
	<label for = "file-input">Add an image to your event!</label>
	<input id = "file-input" class = "form-control form-control-file {{$errors->has('file[]')? 'is-invalid' : ''}}" name = "file[]" type = "file" value = "{{old('file[]')}}"  multiple required>
	@if ($errors->has('file[]'))
		<span class="invalid-feedback">
			<strong>{{$errors->first('file[]')}}</strong>
		</span>
	@endif
</div>
