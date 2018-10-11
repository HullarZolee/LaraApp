@extends('layouts.app')

@section('content')

<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2> Tickets </h2>
        </div>
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
        @if ($tickets->isEmpty())
            <p> There is no ticket.</p>
        @else
            <table class="table table-dark table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="row">ID</th>
                        <th scope="row">Title</th>
                        <th scope="row">Status</th>
                        <th scope="row">Slug</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{!! $ticket->id !!} </td>
                            <td>
                                <a href="{!! action('TicketsController@show', $ticket->slug) !!}">
                                    {!! $ticket->title !!} </a>
                            </td>
                            <td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
                            <td>{!! $ticket->slug !!}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{ $tickets->links() }}
</div>
@endsection

{{-- @section('name')

<h5>{{ $posts }}</h5>

@parent 

    
@endsection --}}