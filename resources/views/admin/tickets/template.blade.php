@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <p class="col-lg-12">
            @yield('title')
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
                @can('all_ticket_access')
                    <a href="{{ route('admin.tickets.index') }}" class="list-group-item">
                        {{ trans('global.all_tickets') }}
                    </a>
                @endcan
                <a href="{{ route('admin.tickets.showOpen') }}" class="list-group-item">
                    @if($unanswerd > 0)
                        <strong>
                            {{ trans('global.open_tickets') }}
                            ({{ $unanswerd }})
                        </strong>
                    @else
                        {{ trans('global.open_tickets') }}
                    @endif
                </a>
                <a href="{{ route('admin.tickets.showClosed') }}" class="list-group-item">
                    {{ trans('global.closed_tickets') }}
                </a>
            </div>
        </div>
        <div class="col-lg-9">
            @yield('tickets-content')
        </div>
    </div>
</div>
@stop