@extends('layouts.app')
@section('header')
	Edit event
@endsection
@section('content')
	<form>
		{{csrf_field()}}
		@include('shared.event.form.category')
		@include('shared.event.form.name')
		@include('shared.event.form.description')
		@include('shared.event.form.location')
		@include('shared.event.form.time')
		@include('shared.event.form.image')
		<input class = "form-control btn btn-success" type = "submit" value = "Update">
	</form>
@endsection
