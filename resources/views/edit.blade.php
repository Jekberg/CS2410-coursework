@extends('layouts.app')
@section('header')
	Edit event
@endsection
@section('content')
	<form id = "event-form" action = "{{route('update.event', $event->id)}}" method = "POST" enctype = "multipart/form-data">
		{{csrf_field()}}
		@include('shared.event.form.category')
		@include('shared.event.form.name')
		@include('shared.event.form.description')
		@include('shared.event.form.location')
		@include('shared.event.form.time')
		@include('shared.event.form.image')
		@include('shared.event.form.remove_image')
		<input class = "form-control btn btn-success" type = "submit" value = "Update">
	</form>
	<form action = "{{route('delete.event', $event->id)}}" method = "POST">
		<div class = "form-group mt-3" >
			{{csrf_field()}}
			<input class = "form-control btn btn-danger" type = "submit" value = "Remove">
		</div>
	</form>
@endsection
@section('js')
	<script src = "{{asset('js/event_form.js')}}"></script>
@endsection
