@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <p class="col-lg-12">
            {{$title}}
        </p>
    </div>
    <div class="row">
        <div class="col-lg-3">
            @can('ticket_create')
            <p>
                <a href="{{ route('admin.tickets.createTicket') }}" class="btn btn-primary btn-block">
                    {{ trans('global.new_ticket') }}
                </a>
            </p>
            @endcan
            <div class="list-group">
                <a href="{{ route('admin.tickets.showOpen') }}" class="list-group-item">
                    @if($unanswerd > 0)
                    <strong>
                        {{ trans('global.open') }}
                        ({{ $unanswerd }})
                    </strong>
                    @else
                    {{ trans('global.open') }}
                    @endif
                </a>
                <a href="{{ route('admin.tickets.showClosed') }}" class="list-group-item">
                    {{ trans('global.closed') }}
                </a>
                @can('all_ticket_access')
                <a href="{{ route('admin.tickets.index') }}" class="list-group-item">
                    {{ trans('global.all_tickets') }}
                </a>
                @endcan
            </div>
        </div>
        <div class="col-lg-9">

            <div class="row">
                <div class="col-lg-12">
                    <div class="list-group">
                        @forelse($tickets as $ticket)
                        <div class="row list-group-item m-2">
                            <h5 class="d-inline-block">
                                <a href="{{ route('admin.tickets.showMessages', [$ticket->id]) }}">Ticket No.{{$ticket->id}}</a>
                            </h5>
                            @if($ticket->answerd == 0) 
                                <p class="d-inline-block"> - Not Answerd</p>
                            @endif
                            <div class="row d-flex">
                                <div class="col-lg-2">{{ ucfirst($ticket->status) }}</div>
                                <div class="col-lg-4">
                                    <a href="{{ route('admin.tickets.showMessages', [$ticket->id]) }}">
                                        @if($ticket->answerd == 0)
                                        <strong>
                                            {{ $ticket->subject }}
                                        </strong>
                                        @else
                                            {{ $ticket->subject }}
                                        @endif
                                    </a>
                                </div>
                                <div class="col-lg-2 text-right">{{ $ticket->updated_at->diffForHumans() }}</div>
                                @can('ticket_access')
                                @if ($ticket->status == 'open')
                                    <div class="col text-center">
                                        <form action="{{ route('admin.ticket.close', [$ticket->id]) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                            @csrf
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="Close Ticket">
                                        </form>
                                    </div>
                                @else
                                    <div class="col text-center">
                                        <form action="{{ route('admin.ticket.open', [$ticket->id]) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                            @csrf
                                            <input type="submit" class="btn btn-xs btn-success"
                                                value="Open Ticket">
                                        </form>
                                    </div>
                                @endif
                                @if ($ticket->status != 'permanently')
                                    <div class="col text-center">
                                        <form action="{{ route('admin.ticket.permanently', [$ticket->id]) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                            @csrf
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="Permanently Close Ticket">
                                        </form>
                                    </div>
                                @endif
                                @can('ticket_delete')
                                <div class="col text-center">
                                    <form action="{{ route('admin.tickets.destroyTicket', [$ticket->id]) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>
                                </div>
                                @endcan
            
                                @endcan
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
        </div>
    </div>
</div>
@endsection
