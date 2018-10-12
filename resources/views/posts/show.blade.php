@extends('layouts.app')

@section('content')

<div class="container">
        <div class="d-flex justify-content-center mt-4 mb-3">
                <h1>
                    {{ $post->title }}
                </h1>
            </div>
        
            <div>  
                <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
            </div>        
</div>

<div class="container">
<div class="d-flex justify-content-center mb-2 mt-5">
    <p class="lead text-cyan">
        {{ $post->body }}
    </p>
</div>
<hr class="d-flex w-75">

<div class="d-flex justify-content-center mb-3">
    <a href="#submit-comment" class="btn btn-success btn-lg mt-2" data-toggle="collapse" 
    data-target="#submit-comment" >New Comment</a>
</div>


@foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
    
            @if(session('status'))
                <div id="status" class="alert alert-success fixed-top mt-5" data-toggle="collapse" 
                data-target="#status">
                    {{ session('status') }}
                </div>
@endif
</div>

<div id="submit-comment" class="container collapse" >

    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}

        <div class="form-group">
            {{Form::textarea('content', '', ['id' => 'article-ckeditor',
            'class' => 'form-control', 'placeholder' => 'The comment'])}}
        </div>

        {{Form::hidden('user_id', $post->user_id)}}
        {{Form::hidden('post_id', $post->id)}}
        
        {{Form::submit('Submit', ['class' => 'd-flex justify-content-center btn btn-primary'])}}

    {!! Form::close() !!}
</div>


<div class="container mt-5">
    <h3 class="ml-5">Comments</h3>
@if(count($comments) > 0)
@foreach ($comments as $comment)
<div class="card mr-5 ml-5 mb-2">
    <div class="card-body bg-primary text-light">
        <p>{{$comment->content}}</p>
    </div>
    <div class="card-footer">
        <small><strong>Date: </strong>{{$comment->created_at}}</small>
    </div>
</div>
@endforeach
@else
<h5 class="text-white ml-5">No commnents added yet</h5>
@endif

</div>
@endsection