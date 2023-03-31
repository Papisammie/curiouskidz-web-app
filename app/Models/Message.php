<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'user_id',
        'course_id',
        'message'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }


    public function chat_replies() {
        return $this->belongsTo(ChatReply::class);    
     }
}
