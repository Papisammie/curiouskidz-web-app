<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersOnGamified extends Model 
{
    use HasFactory;

    protected $table = 'users_on_gamifications';

    protected $fillable = [
        'gamify_id',
        'user_id',
        'ageGroup',
        'click',
        'status', 
        'course_title',
        'course_image',
        'course_cat',
        'course_id',
        'clickToView',
        'badge_to_be_won',
        'howManyCourse',
    ];


}
