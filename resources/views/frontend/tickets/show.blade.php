@extends('layouts.frontend', ['breadcrumb' => 'Ticket No. ' . $ticket->id])

@section('content')
<div class="content container">
    <div class="row">
        <!-- Start The Middle Side -->
        <div class="col-12 conversations p-0">
            <div class="nav">
                <a class="text-white" href="{{ route('frontend.tickets.showOpen') }}"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>
                </a>
                <p class="text-white"><span class="bold">{{$ticket->subject }}</span> - Ticket No. {{$ticket->id}}</p>
                @if ($ticket->status == 'open')
                    <div class="icons float-right">
                        <form action="{{ route('frontend.ticket.close', [$ticket->id]) }}" method="POST"
                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                            @csrf
                        <button class="text-white mr-3" type="submit" name=""><i class="fa fa-close fa-lg text-white b-left" aria-hidden="true"></i> Close Ticket
                        </button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="messeges wrap" id="messeges">
                @foreach($ticket->messages as $message)
                <div class="text {{ $message->is_admin ? 'in-going' : 'out-going'}}">
                    <span class="text-white {{ $message->is_admin ? 'float-left' : 'float-right'}} m-3">{{ $message->sender->name }}</span>
                    {{-- <img src="img/avatar1.jpg" class="img-fluid rounded-circle float-left" alt=""> --}}
                    <hgroup class="speech-bubble messege {{ $message->is_admin ? 'float-left' : 'float-right'}}">
                        <p class="text-dark font-weight-bold">{!! nl2br(e($message->content)) !!}</p>
                        <small class="text-muted m-3">{{ $message->created_at->diffForHumans() }}</small>
                    </hgroup>
                </div>
                @endforeach
{{--                 
                <!-- Out Going attachment Messege -->
                <div class="out-going text">
                    <img src="img/avatar.jpg" class="img-fluid rounded-circle float-right"
                    alt="">
                    <hgroup class="speech-bubble messege float-right">
                        <div class="attachment">
                            <img src="img/attachment.jpg" class="img-thumbnail img-fluid" alt="">
                            <div class="float-right text">
                                 <h2>Night Book</h2>
                                <p>A book about night</p>
                                <button class="btn btn-primary">$12.98 - Buy now</button>
                            </div>
                        </div>
                    </hgroup>
                    <div class="clearfix"></div>
                </div>
                <!-- in Going attachment Messege -->
                <div class="in-going text">
                    <img src="img/avatar1.jpg" class="img-fluid rounded-circle float-left"
                    alt="">
                    <hgroup class="speech-bubble messege float-left">
                        <div class="attachment">
                            <img src="img/attachment.jpg" class="img-thumbnail img-fluid float-right"
                            alt="">
                            <div class="float-left text">
                                 <h2>Night Book</h2>
                                <p>A book about night</p>
                                <button class="btn btn-primary">$12.98 - Buy now</button>
                            </div>
                        </div>
                    </hgroup>
                    <div class="clearfix"></div>
                </div> --}}
            </div>
            @if($ticket->receiverOrCreator() !== null && !$ticket->receiverOrCreator()->trashed())
            @if ($ticket->status == 'open')
                <div class="row text">
                    <div class="text-input">
                        <form class="mb-0 row" action="{{ route("frontend.tickets.reply", [$ticket->id]) }}" method="POST">
                            @csrf
                            <!-- Attachment button -->
                            {{-- <button class="col text-white" type="button" name=""><i class="fa fa-paperclip fa-lg"></i>
                            </button> --}}
                            <!-- Text input -->
                            <div class="form-group messege-input col-10">
                                <textarea class="form-control" name="content" placeholder="Type your message" required></textarea>
                            </div>
                            <!-- send button -->
                            <button class="col btn_1 text-white mr-3" type="submit" name=""><i class="fa fa-send fa-3x"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @elseif ($ticket->status == 'closed')
                <div class="row text">
                    <div class="text-input text-center text-white">
                        <form action="{{ route('frontend.ticket.open', [$ticket->id]) }}" method="POST"
                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                            @csrf
                            This Ticket is Closed You Can Open it again   <button class="text-white btn_1 p-3" type="submit" name=""> Open Ticket</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="row text">
                    <div class="text-input text-center text-white">
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
