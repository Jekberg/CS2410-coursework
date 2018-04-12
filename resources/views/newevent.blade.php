@extends('layouts.app')
@section('header')
	New Event
@endsection
@section('content')
	<form id = "new-event-form" action = "{{route('add.event')}}" method = "POST" enctype = "multipart/form-data">
		@csrf
		<input id = "category-hidden" type = "hidden" name = "event-cat">
		<div class = "form-group">
			<label for = "category-input">Category</label>
			<select id = "category-input" class = "form-control" form = "new-event-form">
				<option value = "SPORT">Sport</option>
				<option value = "CULTURE">Culture</option>
				<option value = "OTHER">Other</option>
			</select>
		</div>
		<div class = "form-group">
			<label for = "name-input">Event name</label>
			<input id = "name-input" class = "form-control" name = "event-name" type = "text" placeholder = "Name" pattern = "[0-9a-zA-Z][0-9a-zA-Z ]*" required>
		</div>
		<div class = "form-group">
			<label for = "description-input">What?</label>
			<textarea id = "description-input" class = "form-control" name = "event-desc" placeholder = "Description" pattern = ".+" required></textarea>
		</div>
		<div class = "form-group">
			<label for = "location-div">Where?</label>
			<div id = "location-div">
				<div class = "form-group">
					<input class = "form-control" name = "event-address" type = "text" placeholder = "Address" pattern = "[0-9a-zA-Z][0-9a-zA-Z\\, ]*" required>
				</div>
				<div class = "form-group">
					<input class = "form-control" name = "event-postcode" type = "text" placeholder = "Postcode" pattern = "[a-zA-Z]+[0-9]+[ ][0-9]+[a-zA-Z]+" required>
				</div>
			</div>
		</div>
		<div class = "form-group">
			<label for = "date-time-div">When?</label>
			<div id = "date-time-div">
				<div class = "form-group">
					<input class = "form-control" name = "event-date" type = "date" required>
				</div>
				<div class = "form-group">
					<input class = "form-control" name = "event-time" type = "time" required>
				</div>
			</div>
		</div>
		<div class = "form-group">
			<label for = "file-input">Add an image to your event!</label>
			<input id = "file-input" class = "form-control form-control-file" name = "file[]" type = "file" multiple required>
		</div>
		<div class = "form-group">
			<input class = "form-control btn btn-success" type = "submit" value = "Add"/>
		</div>
		<div class = "form-group">
			<input class = "form-control" type = "reset" value = "Restart"/>
		</div>
	</form>
@endsection
@section('js')
	<script src = "{{asset('js/newevent.js')}}"></script>
@endsection