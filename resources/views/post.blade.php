
@extends('layouts.body')

@section('container')

<a href="/posts">Back</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>
            <p> by <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> Category :<a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">  {{ $post->category->name }} </a> </p>
            <img src="https://source.unsplash.com/500x250/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
            <article class="my-3 fs-5">
                 {!! $post->body !!}
            </article>
        </div>
    </div>
</div>



    
@endsection