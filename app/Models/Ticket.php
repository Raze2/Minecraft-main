<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Gate;

class Ticket extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'subject',
        'creator_id',
        'assign_id',
        'status',
        'answerd',
        'sent_at',
    ];

    public function messages()
    {
        return $this->hasMany(TicketMessage::class, 'ticket_id')
            ->orderBy('created_at', 'desc');
    }

    public function hasUnreads()
    {
        return $this->messages()->whereNull('read_at')->where('sender_id', '!=', Auth::user()->id)->exists();
    }

    public function unreads()
    {
        return $this->messages()->whereNull('read_at')->where('sender_id', '!=', Auth::user()->id);
    }

    public function receiverOrCreator()
    {
        return Auth::user();
    }

    public static function unreadCount()
    {
        $tickets = Ticket::where('creator_id', Auth::user()->id)
            ->with('messages')
            ->orderBy('created_at', 'DESC')
            ->get();

        $unreadCount = 0;

        foreach ($tickets as $ticket) {
            foreach ($ticket->messages as $message) {
                if ($message->sender_id !== Auth::user()->id && $message->read_at === null) {
                    ++$unreadCount;
                }
            }
        }

        return $unreadCount;
    }

    public static function unAnswerdCount()
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
}
