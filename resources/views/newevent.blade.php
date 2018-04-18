@extends('layouts.app')
@section('header')
	New Event
@endsection
@section('content')
	<form id = "event-form" action = "{{route('add.event')}}" method = "POST" enctype = "multipart/form-data">
		{{csrf_field()}}
		@include('shared.event.form.category')
		@include('shared.event.form.name')
		@include('shared.event.form.description')
		@include('shared.event.form.location')
		@include('shared.event.form.time')
		@include('shared.event.form.image')
		<div class = "form-group">
			<input class = "form-control btn btn-success" type = "submit" value = "Add"/>
		</div>
		<div class = "form-group">
			<input class = "form-control" type = "reset" value = "Restart"/>
		</div>
	</form>
@endsection
@section('js')
	<script src = "{{asset('js/event_form.js')}}"></script>
@endsection
