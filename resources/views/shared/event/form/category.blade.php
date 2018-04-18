<input id = "category-hidden" type = "hidden" name = "category">
<div class = "form-group">
	<label for = "category-input">Category</label>
	<select id = "category-input" class = "form-control {{$errors->has('category') ? 'is-invalid' : ''}}" form = "new-event-form">
		<option value = "SPORT" {{old('category', isset($event)? $event->category: '') == 'SPORT'? 'selected': ''}}>Sport</option>
		<option value = "CULTURE" {{old('category', isset($event)? $event->category: '') == 'CULTURE'? 'selected': ''}}>Culture</option>
		<option value = "OTHER" {{old('category', isset($event)? $event->category: '') == 'OTHER'? 'selected': ''}}>Other</option>
	</select>
	@if ($errors->has('category'))
		<span class="invalid-feedback">
			<strong>{{$errors->first('category')}}</strong>
		</span>
	@endif
</div>
