@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <h1>{{$post->title}}</h1>
    </div>
    <div class="d-flex justify-content-center mb-2">
            <hp>{{$post->body}}</hp>
    </div>

    <hr class=" d-flex w-75">

<div class="d-flex justify-content-around mt-5">
    
    <div><a href="/posts/edit/{{$post->id}}" class="btn text-info bg-dark float-sm-left">Edit</a></div>
    <div><a href="/posts" class="btn text-info bg-dark">Go Black</a></div>
    <div><a href="/posts" class="btn text-info bg-dark float-sm-right">Go Black</a></div>
    
</div>



@endsection