<div class = "form-group">
	<label for = "date-time-div">When?</label>
	<div id = "date-time-div">
		<div class = "form-group">
			<input class = "form-control {{$errors->has('time')? 'is-invalid' : ''}}" name = "date" type = "date" value = "{{old('date')}}" required>
			@if ($errors->has('date'))
				<span class="invalid-feedback">
					<strong>{{$errors->first('date')}}</strong>
				</span>
			@endif
		</div>
		<div class = "form-group">
			<input class = "form-control {{$errors->has('time')? 'is-invalid' : ''}}" name = "time" type = "time" value = "{{old('time')}}" required>
			@if ($errors->has('time'))
				<span class="invalid-feedback">
					<strong>{{$errors->first('time')}}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
