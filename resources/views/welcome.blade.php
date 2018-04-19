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
			@include('shared.event.table.head')
			<tbody id = "main-table">
				@foreach (Session::get('likes') as $id)
					<?php
						$event = App\Event::find($id);
					?>
					@if (isset($event))
						<tr value = "{{$id}}">
							<td class = "text-truncate cell-l">{{$event->name}}</td>
							<td class = "text-truncate cell-l">{{$event->description}}</td>
							<td class = "text-truncate cell-l">{{$event->date}}</td>
							<td class = "text-truncate cell-m">{{$event->time}}</td>
							<td class = "text-truncate cell-s">{{$event->likes}}</td>
						</tr>
					@else
						<?php
							$likes = Session::get('likes');
							unset($likes[array_search($id, $likes)]);
							Session::put($id, 'likes');
						?>
					@endif
				@endforeach
			</tbody>
		</table>
	@endif
@endsection
@section('js')
	@include('shared.js.routing_util')
	<script src = "{{asset('js/view_main_table.js')}}"></script>
@endsection
