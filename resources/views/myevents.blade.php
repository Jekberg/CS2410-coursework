@extends('layouts.app')
@section('style')
	<link href = "{{asset('css/cell.css')}}" rel = "stylesheet">
@endsection
@section('header')
	My events
@endsection
@section('content')
	<table class = "table table-striped table-bordered table-hover">
			@include('shared.event.table.head')
		<tbody id = "main-table">
			@foreach (Auth::user()->events as $id => $event)
				<tr value = "{{$event->id}}">
					<td class = "text-truncate cell-l">{{$event->name}}</td>
					<td class = "text-truncate cell-l">{{$event->description}}</td>
					<td class = "text-truncate cell-l">{{$event->date}}</td>
					<td class = "text-truncate cell-m">{{$event->time}}</td>
					<td class = "text-truncate cell-s">{{$event->likes}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
@section('js')
	@include('shared.js.routing_util')
	<script src = "{{asset('js/view_main_table.js')}}"></script>
@endsection
