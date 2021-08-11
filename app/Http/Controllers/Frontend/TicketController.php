<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketCreateRequest;
use App\Http\Requests\TicketReplyRequest;
use App\Models\Ticket;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('creator_id', Auth::id())
        ->orderBy('updated_at', 'DESC')
        ->paginate(10);

        $title   = trans('global.all_tickets');
        $unreads = $this->unreadTickets();

        return view('frontend.tickets.index', compact('tickets', 'title', 'unreads'));
    }

    public function createTicket()
    {

        $unreads = $this->unreadTickets();

        return view('frontend.tickets.create', compact('unreads'));
    }

    public function storeTicket(TicketCreateRequest $request)
    {
        $ticket = Ticket::create([
            'subject'     => $request->input('subject'),
            'creator_id'  => Auth::id(),
        ]);

        $ticket->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => $request->input('content'),
        ]);

        return redirect()->route('frontend.tickets.index');
    }

    public function showMessages(Ticket $ticket)
    {
        $this->checkAccessRights($ticket);

        foreach ($ticket->messages as $message) {
            if ($message->sender_id !== Auth::id() && $message->read_at === null) {
                $message->read_at = Carbon::now();
                $message->save();
            }
        }

        return view('frontend.tickets.show', compact('ticket'));
    }

    public function showOpen()
    {
        $title = trans('global.open_tickets');

        $tickets = Ticket::where('creator_id', Auth::id())
            ->where('status','open')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        $unreads = $this->unreadTickets();

        return view('frontend.tickets.index', compact('tickets', 'title', 'unreads'));
    }

    public function showClosed()
    {
        $title = trans('global.closed_tickets');

        $tickets = Ticket::where('creator_id', Auth::id())
            ->whereIn('status',['closed','permanently'])
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        $unreads = $this->unreadTickets();

        return view('frontend.tickets.index', compact('tickets', 'title', 'unreads'));
    }

    public function replyToTicket(TicketReplyRequest $request, Ticket $ticket)
    {
        $this->checkAccessRights($ticket);

        $ticket->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => $request->input('content'),
        ]);

        $ticket->touch();
        $ticket->answerd = 0;
        $ticket->save();

        return redirect()->back();
    }

    public function openTicket(Ticket $ticket)
    {
        $this->checkAccessRights($ticket);

        $ticket->status = 'open';
        $ticket->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => 'User Opened The Ticket',
        ]);

        $ticket->touch();
        $ticket->answerd = 0;
        $ticket->save();

        return redirect()->back();
    }

    public function closeTicket(Ticket $ticket)
    {
        $this->checkAccessRights($ticket);

        $ticket->status = 'closed';
        $ticket->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => 'User Closed The Ticket',
        ]);

        $ticket->touch();
        $ticket->answerd = 1;
        $ticket->save();

        return redirect()->back();
    }

    public function unreadTickets(): array
    {
        $tickets = Ticket::where('creator_id', Auth::id())
            ->with('messages')
            ->orderBy('created_at', 'DESC')
            ->get();

        $OpenUnreadCount  = 0;
        $ClosedUnreadCount = 0;

        foreach ($tickets as $ticket) {
            foreach ($ticket->messages as $message) {
                if (
                    $message->sender_id !== Auth::id()
                    && $message->read_at === null
                ) {
                    if ($ticket->status == 'open') {
                        ++$OpenUnreadCount;
                    } else {
                        ++$ClosedUnreadCount;
                    }
                }
            }
        }

        return [
            'open'  => $OpenUnreadCount,
            'closed' => $ClosedUnreadCount,
        ];
    }

    private function checkAccessRights(Ticket $ticket)
    {
        $user = Auth::user();

        if ($ticket->creator_id !== $user->id) {
            return abort(401);
        }
    }
}
