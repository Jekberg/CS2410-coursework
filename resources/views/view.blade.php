@extends('layouts.app')
@section('style')
	<link href = "{{asset('css/img_fluid.css')}}" rel = "stylesheet">
@endsection
@section('header')
	@include('shared.event.view.name')
@endsection
@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-6">
				@include('shared.event.view.like_cnt')
			</div>
			<div class = "col-6">
				@if (Auth::check() && Auth::user()->id == $event->user_id)
					@include('shared.event.view.edit_btn')
				@else
					@include('shared.event.view.like_btn')
				@endif
			</div>
		</div>
		<div>
			@include('shared.event.view.description')
		</div>
		<div>
			<div class = "row card">
				@include('shared.event.view.images')
			</div>
		</div>
		<div>
			@include('shared.event.view.details')
		</div>
	</div>
@endsection
@section('footer')
	@include('shared.event.view.organiser')
@endsection
@section('js')
	<script>
		const LIKE_URL = {{$event->id}};
		const LIKE_API_URL = {{$event->id}};
	</script>
	<script src = "{{asset('js/view.js')}}"></script>
@endsection
