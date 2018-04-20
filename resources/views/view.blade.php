@extends('layouts.app')
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
				<div class = "container">
					<div class = "row">
						@if (Gate::allows('event-edit-access', $event))
							@include('shared.event.view.edit_btn')
						@else
							@include('shared.event.view.like_btn')
						@endif
					</div>
					<div class = "row">
							@include('shared.event.view.mail_btn')
					</div>
				</div>
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
