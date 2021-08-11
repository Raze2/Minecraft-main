<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketCreateRequest;
use App\Http\Requests\TicketReplyRequest;
use App\Models\Ticket;
use App\Models\User;
use Auth;
use Gate;
use Symfony\Component\HttpFoundation\Response;  
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('all_ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tickets = Ticket::orderBy('updated_at', 'DESC')
            ->paginate(10);

        $title   = trans('global.all_tickets');
        $unanswerd = $this->unAnswerdTickets();

        return view('admin.tickets.index', compact('tickets', 'title', 'unanswerd'));
    }

    public function createTicket()
    {
        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()
            ->except(Auth::id());

        $unanswerd = $this->unAnswerdTickets();

        return view('admin.tickets.create', compact('users', 'unanswerd'));
    }

    public function storeTicket(TicketCreateRequest $request)
    {
        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket = Ticket::create([
            'subject'     => $request->input('subject'),
            'creator_id'  => $request->input('creator'),
            'answerd'     => 1
        ]);

        $ticket->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => $request->input('content'),
            'is_admin' => 1
        ]);

        return redirect()->route('admin.tickets.index');
    }

    public function showMessages(Ticket $ticket)
    {
        $this->checkAccessRights($ticket);

        return view('admin.tickets.show', compact('ticket'));
    }

    public function destroyTicket(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket->delete();

        return redirect()->route('admin.tickets.index');
    }

    public function showOpenAssigned()
    {
        abort_if(Gate::denies('ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $title = trans('global.open');

        if(Gate::allows('all_ticket_access')){
            $tickets = Ticket::where('status', 'open')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
        } else {
            $tickets = Ticket::where('assign_id', Auth::id())
            ->where('status', 'open')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
        }
        

        $unanswerd = $this->unAnswerdTickets();

        return view('admin.tickets.index', compact('tickets', 'title', 'unanswerd'));
    }

    public function showClosedAssigned()
    {
        abort_if(Gate::denies('ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $title = trans('global.closed');

        if(Gate::allows('all_ticket_access')){
            $tickets = Ticket::whereIn('status',['closed','permanently'])
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
        } else {
            $tickets = Ticket::where('assign_id', Auth::id())
            ->whereIn('status',['closed','permanently'])
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
        }

        $unanswerd = $this->unAnswerdTickets();

        return view('admin.tickets.index', compact('tickets', 'title', 'unanswerd'));
    }

    public function replyToTicket(TicketReplyRequest $request, Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $this->checkAccessRights($ticket);

        $ticket->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => $request->input('content'),
            'is_admin' => 1
        ]);

        $ticket->touch();
        $ticket->answerd = 1;
        $ticket->save();

        return redirect()->route('admin.tickets.index');
    }

    public function showReply(Ticket $ticket)
    {
        $this->checkAccessRights($ticket);

        return view('admin.tickets.reply', compact('ticket'));
    }

    public function openTicket(Ticket $ticket)
    {
        $this->checkAccessRights($ticket);

        $ticket->status = 'open';
        $ticket->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => 'Admin Opened The Ticket',
            'is_admin' => 1
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
            'content'   => 'Admin Closed The Ticket',
            'is_admin' => 1
        ]);

        $ticket->touch();
        $ticket->answerd = 1;
        $ticket->save();

        return redirect()->back();
    }

    public function permanentlyCloseTicket(Ticket $ticket)
    {
        $this->checkAccessRights($ticket);

        $ticket->status = 'permanently';
        $ticket->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => 'Admin Permanently Closed The Ticket',
            'is_admin' => 1
        ]);
        
        $ticket->touch();
        $ticket->answerd = 1;
        $ticket->save();

        return redirect()->back();
    }

    public function unAnswerdTickets()
    {
        if(Gate::allows('all_ticket_access')){
            return Ticket::where('answerd', 0)
            ->where('status', 'open')
            ->count();
        }

        return Ticket::where('assign_id', Auth::id())
            ->where('answerd', 0)
            ->where('status', 'open')
            ->count();

    }

    private function checkAccessRights(Ticket $ticket)
    {
        $user = Auth::user();

        if ($ticket->assign_id !== $user->id && !Gate::allows('all_ticket_access')) {
            return abort(401);
        }
    }
}
