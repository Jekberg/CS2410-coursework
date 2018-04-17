<input id = "category-hidden" type = "hidden" name = "category">
<div class = "form-group">
	<label for = "category-input">Category</label>
	<select id = "category-input" class = "form-control {{$errors->has('category') ? 'is-invalid' : ''}}" form = "new-event-form">
		<option value = "SPORT" {{old('category') == 'SPORT'? 'seclected': ''}}>Sport</option>
		<option value = "CULTURE" {{old('category') == 'CULTURE'? 'seclected': ''}}>Culture</option>
		<option value = "OTHER" {{old('category') == 'OTHER'? 'seclected': ''}}>Other</option>
	</select>
	@if ($errors->has('category'))
		<span class="invalid-feedback">
			<strong>{{$errors->first('category')}}</strong>
		</span>
	@endif
</div>
