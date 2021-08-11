@extends('layouts.admin')

@section('content')
<div class="content container">
    <div class="row">
        <!-- Start The Middle Side -->
        <div class="col-12 conversations p-0 mb-2">
            <div class="nav">
                <a href="{{ route('admin.tickets.showOpen') }}"><i class="fa fa-arrow-left fa-lg"
                        aria-hidden="true"></i>
                </a>
                <p><span class="bold">{{$ticket->subject }}</span> - Ticket No. {{$ticket->id}}</p>
                <div class="icons float-right d-flex">
                    @can('ticket_access')
                        @if ($ticket->status == 'open')
                            <form action="{{ route('admin.ticket.close', [$ticket->id]) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                @csrf
                                <button class="mr-3" type="submit" name=""><i class="fa fa-times fa-lg  b-left" aria-hidden="true"></i> Close
                                    Ticket
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.ticket.open', [$ticket->id]) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                @csrf
                                <button class="mr-3" type="submit" name=""><i class="fa fa-times fa-lg  b-left" aria-hidden="true"></i> Open
                                    Ticket
                                </button>
                            </form>
                        @endif
                        @if ($ticket->status != 'permanently')
                            <form action="{{ route('admin.ticket.permanently', [$ticket->id]) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                @csrf
                                <button class="mr-3" type="submit" name=""><i class="fa fa-times fa-lg  b-left" aria-hidden="true"></i> Close Permanently
                                </button>
                            </form>
                        @endif
                        @can('ticket_delete')
                            <form action="{{ route('admin.tickets.destroyTicket', [$ticket->id]) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button class="mr-3" type="submit" name=""><i class="fa fa-times fa-lg  b-left" aria-hidden="true"></i> Delete</button>
                            </form>
                        @endcan
                    @endcan
                </div>
            </div>
            <div class="messeges wrap" id="messeges">
                @foreach($ticket->messages as $message)
                <div class="text {{ $message->is_admin ? 'in-going' : 'out-going'}}">
                    <span
                        class=" {{ $message->is_admin ? 'float-left' : 'float-right'}} m-3">{{ $message->sender->name }}</span>
                    {{-- <img src="img/avatar1.jpg" class="img-fluid rounded-circle float-left" alt=""> --}}
                    <hgroup class="speech-bubble messege {{ $message->is_admin ? 'float-left' : 'float-right'}}">
                        <p class="text-dark font-weight-bold">{!! nl2br(e($message->content)) !!}</p>
                        <small class="text-muted m-3">{{ $message->created_at->diffForHumans() }}</small>
                    </hgroup>
                </div>
                @endforeach
            </div>
            @if($ticket->receiverOrCreator() !== null && !$ticket->receiverOrCreator()->trashed())
            @if ($ticket->status == 'open')
            <div class="row text">
                <div class="text-input">
                    <form class="mb-0 row" action="{{ route("admin.tickets.reply", [$ticket->id]) }}" method="POST">
                        @csrf
                        <!-- Attachment button -->
                        {{-- <button class="col " type="button" name=""><i class="fa fa-paperclip fa-lg"></i>
                            </button> --}}
                        <!-- Text input -->
                        <div class="form-group messege-input col-10">
                            <textarea class="form-control" name="content" placeholder="Type your message"
                                required></textarea>
                        </div>
                        <!-- send button -->
                        <button class="col btn btn-primary mr-3" type="submit" name=""><i
                                class="fa fa fa-paper-plane fa-3x"></i>
                        </button>
                    </form>
                </div>
            </div>
            @elseif ($ticket->status == 'closed')
            <div class="row text">
                <div class="text-input text-center mb-3">
                    <form action="{{ route('admin.ticket.open', [$ticket->id]) }}" method="POST"
                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                        @csrf
                        This Ticket is Closed You Can Open it again <button class="btn btn-default p-3" type="submit" name="">
                            Open Ticket</button>
                    </form>
                </div>
            </div>
            @else
            <div class="row text">
                <div class="text-input text-center ">
                    This Ticket is permanently Closed
                </div>
            </div>
            @endif
            @endif
        </div>
        <!-- End The Middle Side -->
    </div>
</div>
@endsection
