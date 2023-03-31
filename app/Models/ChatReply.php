<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatReply extends Model
{
    use HasFactory;

    protected $table = 'chat_replies';

    protected $fillable = [
        'message_id',
        'user_id',
        'course_id',
        'message',
        'date'
    ];

    public function messages() {
     
        return $this->belongsTo(Message::class);
            
     }

     public function users() {
        return $this->belongsTo(User::class);
    }

    public function courses() {
        return $this->belongsTo(Course::class);
    }

}
