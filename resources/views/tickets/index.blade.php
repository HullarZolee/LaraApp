@extends('layouts.app')

@section('content')

<div class="container col-md-8 col-md-offset-2 mt-5">
    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="text-primary mb-3 display-4"> Tickets </p>
        </div>
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
        @if ($tickets->isEmpty())
            <p> There is no ticket.</p>
        @else
            <table class="table table-hover">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scope="row">ID</th>
                        <th scope="row">Title</th>
                        <th scope="row">Status</th>
                        <th scope="row">Slug</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach($tickets as $ticket)
                        <tr>
                            <td scope="row">{!! $ticket->id !!} </td>
                            <td class="p-3">
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