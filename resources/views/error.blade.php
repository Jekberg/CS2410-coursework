@extends('layouts.app')
@section('header')
    Oopps!
@endsection
@section('content')
    <div class = "alert alert-danger">
        <p>
            {{$message}}
        </p>
    </div>
@endsection
