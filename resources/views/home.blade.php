@extends('layouts.app')
@section('header')
	Dashboard
@endsection
@section('content')
	@if (session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
	@endif
	<div class = "container">
		<div class = "row my-4">
			<button class = "btn btn-default btn-block">My events</button>
		</div>
		<div class = "row my-4">
			<button class = "btn btn-default btn-block">My profile</button>
		</div>
		<div class = "row my-4">
			<div class = "btn-group btn-group-justified">
				<a class = "btn btn-primary btn-block" href = "#">Logout</a>
			</div>
		</div>
	</div>
@endsection
