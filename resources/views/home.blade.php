@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a class="btn btn-outline-primary" href="/posts/create">
                        Create post
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@if(count($posts) > 0)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mt-2">
                <div class="card-header">
                    <strong>
                        Title
                    </strong>
                    <span class="ml-2">
                        {{$post->title}}
                    </span>
                </div>
                <div class="card-body figure">
                    <a class="btn btn-outline-success" href="/posts/{{$post->id}}/edit">
                        Edit Post
                    </a>
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE') }}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">
                    <strong>
                        You have no post yet
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
