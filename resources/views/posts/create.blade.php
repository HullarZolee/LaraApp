@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-primary mb-3">New Post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{Form::textarea('body', '', ['id' => 'article-ckeditor',
            'class' => 'form-control', 'placeholder' => 'Body Text'])}}

        </div>

        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}


    @include('inc.messages')
</div>

@endsection