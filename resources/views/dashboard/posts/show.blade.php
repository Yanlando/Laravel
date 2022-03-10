@extends('dashboard.layout.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>
            <p> by <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> Category :<a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">  {{ $post->category->name }} </a> </p>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back To my Posts</a>
            <a href="/dashboard/posts" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <a href="/dashboard/posts" class="btn btn-danger"><span data-feather="x-circle"></span> Delete</a>
            <img src="https://source.unsplash.com/500x250/?{{ $post->category->name }}" class="card-img-top mt-2" alt="{{ $post->category->name }}">
            <article class="my-3 fs-5">
                 {!! $post->body !!}
            </article>
        </div>
    </div>
</div>

@endsection