@section('title', 'Home')
@extends('layout')

@section('content')

@foreach ($posts as $post)
    @include('partials.summary')
@endforeach

@endsection
