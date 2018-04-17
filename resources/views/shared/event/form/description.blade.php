<div class = "form-group">
	<label for = "description-input">What?</label>
	<textarea id = "description-input" class = "form-control {{$errors->has('description')? 'is-invalid' : ''}}" name = "description" placeholder = "Description" pattern = ".+" required>{{old('description')}}</textarea>
	@if ($errors->has('description'))
		<span class="invalid-feedback">
			<strong>{{$errors->first('description')}}</strong>
		</span>
	@endif
</div>
