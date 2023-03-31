<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamify extends Model
{
    use HasFactory;

    protected $table = 'gamifications';

    protected $fillable = [
        'gamify_id',
        'course_title',
        'course_image',
        'course_cat',
        'course_id',
        'ageGroup',
        'status',
        'badge_to_be_won',
        'howManyCourse',
    ];


    public function categories() {
        return $this->belongsTo( Category::class);
    }


}
