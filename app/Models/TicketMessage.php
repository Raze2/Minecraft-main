<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    protected $fillable = [
        'topic_id',
        'sender_id',
        'is_admin',
        'content',
        'read_at'
    ];

    protected $dates = [
        'sent_at',
    ];

    public function topic()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id')->withTrashed();
    }
}
