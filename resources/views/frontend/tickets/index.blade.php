@extends('layouts.frontend', ['breadcrumb' => $title])

@section('breadcrumb', $title)

@section('content')
<div class="content container">
    <div class="row">
        <p class="col-lg-12">
            {{$title}}
        </p>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <p>
                <a href="{{ route('frontend.tickets.createTicket') }}" class="btn btn_1 btn-block">
                    {{ trans('global.new_ticket') }}
                </a>
            </p>
            <div class="list-group">
                <a href="{{ route('frontend.tickets.showOpen') }}" class="list-group-item">
                    @if($unreads['open'] > 0)
                    <strong>
                        {{ trans('global.open_tickets') }}
                        ({{ $unreads['open'] }})
                    </strong>
                    @else
                    {{ trans('global.open_tickets') }}
                    @endif
                </a>
                <a href="{{ route('frontend.tickets.showClosed') }}" class="list-group-item">
                    @if($unreads['closed'] > 0)
                    <strong>
                        {{ trans('global.closed') }}
                        ({{ $unreads['closed'] }})
                    </strong>
                    @else
                    {{ trans('global.closed_tickets') }}
                    @endif
                </a>
                <a href="{{ route('frontend.tickets.index') }}" class="list-group-item">
                    {{ trans('global.all_tickets') }}
                </a>
            </div>
        </div>
        <div class="col">
            <div class="list-group">
                @forelse($tickets as $ticket)
                <div class="row list-group-item m-2">
                    <h5 class="d-inline-block">
                        <a href="{{ route('frontend.tickets.showMessages', [$ticket->id]) }}">Ticket No.{{$ticket->id}}</a>
                    </h5>
                    @if($ticket->hasUnreads()) 
                    <p class="d-inline-block"> - {{ $ticket->unreads()->count()}} New Message</p>
                    @endif
                    <div class="row d-flex">
                        <div class="col-lg-2">{{ ucfirst($ticket->status) }}</div>
                        <div class="col-lg-6">
                            <a href="{{ route('frontend.tickets.showMessages', [$ticket->id]) }}">
                                {{-- {{dd($ticket->unreads()->count())}} --}}
                                <strong>
                                    {{ $ticket->subject }}

                                </strong>
                            </a>
                        </div>
                        <div class="col-lg-4 text-right">{{ $ticket->updated_at->diffForHumans() }}</div>
                    </div>
                </div>
                @empty
                <div class="row list-group-item">
                    {{ trans('global.you_have_no_tickets') }}
                </div>
                @endforelse
                @isset($tickets)
                    <div class="d-flex justify-content-center">
                        {{$tickets->links()}}
                    </div>
                @endisset
            </div>
        </div>
    </div>
    @endsection
