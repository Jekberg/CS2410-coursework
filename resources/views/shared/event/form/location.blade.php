<div class = "form-group">
	<label for = "location-div">Where?</label>
	<div id = "location-div">
		<div class = "form-group">
			<input class = "form-control {{$errors->has('address')? 'is-invalid' : ''}}" name = "address" type = "text" placeholder = "Address" pattern = "[0-9a-zA-Z][0-9a-zA-Z\\, ]*"  value="{{old('address', isset($event)? $event->address: '')}}" required>
			@if ($errors->has('address'))
				<span class="invalid-feedback">
					<strong>{{$errors->first('address')}}</strong>
				</span>
			@endif
		</div>
		<div class = "form-group">
			<input class = "form-control {{$errors->has('postcode')? 'is-invalid' : ''}}" name = "postcode" type = "text" placeholder = "Postcode" pattern = "[a-zA-Z]+[0-9]+[ ][0-9]+[a-zA-Z]+" value="{{old('postcode', isset($event)? $event->postcode: '')}}" required>
			@if ($errors->has('postcode'))
				<span class="invalid-feedback">
					<strong>{{$errors->first('postcode')}}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
