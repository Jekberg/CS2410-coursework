@extends('layouts.app')
@section('header')
	Edit event
@endsection
@section('content')
	<form>
		@csrf
		@include('shared.form.event_cat')
		@include('shared.form.event_name')
		@include('shared.form.event_desc')
		@include('shared.form.event_loc')
		@include('shared.form.event_time')
		@include('shared.form.event_img')
		<input class = "form-control btn btn-success" type = "submit" value = "Update">
	</form>
@endsection
