@extends('layouts.app')
@section('header')
	Profile
@endsection
@section('content')
	<form action = "{{route('user.update')}}" method = "POST">
		{{csrf_field()}}
		@include('shared.user.form.name')
		@include('shared.user.form.email')
		@include('shared.user.form.phone')
		<input class = "form-control btn btn-success" type = "submit" value = "Update">
	</form>
@endsection
