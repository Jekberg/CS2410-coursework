@extends('layouts.app')
@section('style')
	<link href = "{{asset('css/cell.css')}}" rel = "stylesheet">
@endsection
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
			@include('shared.event_thead')
			<tbody id = "main-table">
				@foreach (Session::get('likes') as $id => $event)
					<tr value = "{{$id}}">
						<td class = "text-truncate cell-l">{{$event->name}}</td>
						<td class = "text-truncate cell-l">{{$event->description}}</td>
						<td class = "text-truncate cell-l">{{$event->date}}</td>
						<td class = "text-truncate cell-m">{{$event->time}}</td>
						<td class = "text-truncate cell-s">{{$event->likes}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection
@section('js')
	@include('shared.js.routing_util')
	<script src = "{{asset('js/view_main_table.js')}}"></script>
@endsection
