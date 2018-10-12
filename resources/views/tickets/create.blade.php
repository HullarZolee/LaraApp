@extends('layouts.app')

@section('content')



<div class="container mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    <div class="card">
        <div class="card-body">
        <form  method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <fieldset>
                <legend>Submit a new ticket</legend>
                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="title" name="title"aceholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-lg-2 control-label">Content</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                        <span class="help-block">Feel free to ask us any question.</span>
                    </div>
                </div>
            </div>
                <div class="card-footer bg-primary">
                    <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                    </div>
                </div>
                </fieldset>
            </form>
        
    </div>
</div>
  
@endsection
