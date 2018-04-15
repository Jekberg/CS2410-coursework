@extends('layouts.app')
@section('header')
	{{$event->name}}
@endsection
@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-6">
				<label for = "like-counter">Likes:</label>
				<span id = "like-count">{{$event->likes}}</span>
			</div>
			<div class = "col-6">				
				@if (Auth::check() && Auth::user()->id == $event->user_id)
					<a href = "{{route('edit.event', $event->id)}}" class = "col-12 btn btn-success">Edit</a>
				@elseif (!array_key_exists($event->id, Session::get('likes')))
					<form class = "col-12" action = "{{route('like.event')}}" method = "POST">
						@csrf
						<input name = "id" type = "hidden" value = "{{$event->id}}">
						<input class = "form-control btn btn-primary" type = "submit" value = "Like">
					</form>
				@else
					<form class = "col-12" action = "{{route('unlike.event')}}" method = "POST">
						@csrf
						<input name = "id" type = "hidden" value = "{{$event->id}}">
						<input class = "form-control btn btn-secondary" type = "submit" value = "Unlike">
					</form>
				@endif
			</div>
		</div>
		<div>
			<p>
				<h4>Description:</h4>
			</p>
			<p>
				{{$event->description}}
			</p>
		</div>
		<div class = "row card">
			<div id="event-img-carousel" class="carousel slide my-100" data-ride="carousel">
				<div class="carousel-inner">
					<?
						$count = 0;
					?>
					@foreach($event->images as $image)
						<?
							$carouselItemClass = 'carousel-item'. ($count++ == 0? ' active': '');
						?>
						<div class ="{{$carouselItemClass}}" >
							<img class="d-block mx-auto my-auto" src = "{{asset('storage/uploads/' . $image->name)}}" alt="First slide">
						</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#event-img-carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#event-img-carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div>
			<div class = "container">
				<div class = "row">
					<p>
						<h4>Details:</h4>
					</p>
				</div>
				<div class = "row">
					<label for = "time">Time:</label>
					<span id = "time" class = "mx-auto">{{$event->time}}</span>
				</div>
				<div class = "row">
					<label for = "time">Date:</label>
					<span id = "time" class = "mx-auto">{{$event->date}}</span>
				</div>
				<div class = "row">
					<label for = "address">Address:</label>
					<span id = "address" class = "mx-auto">{{$event->address}}</span>
				</div>
				<div class = "row">
					<label for = "postcode">Postcode:</label>
					<span id = "postcode" class = "mx-auto">{{$event->postcode}}</span>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer')
	<div class = "container">
		<div class = "row">
			<div class = "col-4">
				Organiser: {{$event->user->name}}
			</div>
			<div class = "col-4">
				Email: {{$event->user->email}}
			</div>
			<div class = "col-4">
				Phone: {{$event->user->phone}}
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script>
		const LIKE_URL = {{$event->id}};
		const LIKE_API_URL = {{$event->id}};
	</script>
	<script src = "{{asset('js/view.js')}}"></script>
@endsection
