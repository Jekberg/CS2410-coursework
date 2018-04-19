<div class = "form-group">
    <label for = "phone">Phone:</label>
    <input id = "phone" class = "form-control {{$errors->has('phone')? 'is-invalid' : ''}}" name = "phone" type = "tel" value = "{{old('phone', Auth::user()->phone)}}">
    @if ($errors->has('phone'))
		<span class="invalid-feedback">
			<strong>{{$errors->first('phone')}}</strong>
		</span>
	@endif
</div>
