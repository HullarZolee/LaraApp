@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary display-4 mb-4">Posts</h1>


    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="body"></div>
            <div class="card-body bg-primary p-2">
            <h3><a class="badge badge-primary p-3" href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                
            </div>
            <div class="card-footer">
                    <small><strong>Written on: </strong>{{$post->created_at}} </small>
            </div>
            <hr>
        @endforeach

        {{$posts->links()}}


    @else
            <p>No Posts Added Yet</p>
    @endif


    </div>


@endsection