@extends('layouts.app')
@section('header')
	Events I like
@endsection
@section('content')
	@if (empty(Session::get('likes')))
		<span class = "mx-auto">
			<h4>You have not liked any events.</h4>
		</span>
	@else
		<table class = "table table-striped table-bordered table-hover">
			<thead>
				<th>Name</th>
				<th>Description</th>
				<th>Date</th>
				<th>Time</th>
				<th>Likes</th>
			</thead>
			<tbody id = "main-table">
				@foreach (Session::get('likes') as $id => $event)
					<tr value = "{{$id}}">
						<td>{{$event->name}}</td>
						<td>{{$event->description}}</td>
						<td>{{$event->date}}</td>
						<td>{{$event->time}}</td>
						<td>{{$event->likes}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection
@section('js')
	@include('shared.routing_util')
	<script src = "{{asset('js/view_main_table.js')}}"></script>
@endsection