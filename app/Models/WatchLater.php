<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchLater extends Model
{
    use HasFactory;

    protected $table = 'watch_later';

    protected $fillable = [
        'course_id',
        'user_id',
        'image'
    ];


}
