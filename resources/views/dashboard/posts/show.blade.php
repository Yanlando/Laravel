@extends('dashboard.layout.main')

@section('container')

<h2>HHaHAH</h2>

@foreach ($posts as $post)
    <h1>{{ $post->name }}</h1>
@endforeach

@endsection