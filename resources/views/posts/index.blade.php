@extends('layouts.app')

@section('content')
    <h1 class="text-muted">Posts</h1>
    {{-- @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-block">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on: {{$post->created_at}} </small>
            </div>
            <hr>
        @endforeach

        {{$posts->links()}}


    @else
            <p>No Posts Added Yet</p>
    @endif --}}

    <div id="example">
    </div>

@endsection