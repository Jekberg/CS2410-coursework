@extends('layouts.app')
@section('style')
	<link href = "{{asset('css/cell.css')}}" rel = "stylesheet">
@endsection
@section('header')
	Events
@endsection
@section('content')
	<form>
		<div class = "container">
		<div class = "row">
			<div class = "col-4">
				<div class = "mx-auto">
					<label for = "filter-sport">Sport</label>
					<input id = "filter-sport" name = "filter" type = "checkbox" value = "SPORT" checked>
				</div>
			</div>
			<div class = "col-4">
				<div class = "mx-auto">
					<label for = "filter-culture">Culture</label>
					<input id = "filter-culture" class = "" name = "filter" type = "checkbox" value = "CULTURE" checked>
				</div>
			</div>
			<div class = "col-4">
				<label for = "filter-other">Other</label>
				<input id = "filter-others" class = "" name = "filter" type = "checkbox" value = "OTHER" checked>
			</div>
		</div>
	</div>
		<div class = "form-group">
			<select id = "order-select" class = "form-control">
				<option value = "no-order">Order by none</option>
				<option value = "name-asc">Order by name ASC</option>
				<option value = "name-desc">Order by name DESC</option>
				<option value = "like-asc">Order by likes ASC</option>
				<option value = "like-desc">Order by likes DESC</option>
				<option value = "date-asc">Order by date ASC</option>
				<option value = "date-desc">Order by date DESC</option>
			<select>
		</div>
	</form>
	<table class = "table table-striped table-bordered table-hover">
		<thead>
			@include('shared.event_thead')
		</thead>
		<tbody id = "main-table">
		</tbody>
	</table>
@endsection
@section('js')
	@include('shared.api_setup')
	@include('shared.routing_util')
	<script src = "{{asset('js/events.js')}}"></script>
	<script src = "{{asset('js/view_main_table.js')}}"></script>
@endsection
