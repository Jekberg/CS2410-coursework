@extends('layouts.app')
@section('header')
	New Event
@endsection
@section('content')
	<form id = "new-event-form" action = "{{route('add.event')}}" method = "POST" enctype = "multipart/form-data">
		@csrf
		@include('shared.form.event_cat')
		@include('shared.form.event_name')
		@include('shared.form.event_desc')
		@include('shared.form.event_loc')
		@include('shared.form.event_time')
		@include('shared.form.event_img')
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
