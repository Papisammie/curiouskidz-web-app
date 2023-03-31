<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCounter extends Model
{
    use HasFactory;

    protected $table = 'video_counters';

    protected $fillable = [
        'course_id',
        'user_name',
        'course_title',
        'course_images',
        'course_cat',
        'ageGroup',
        'class',
        'libraryGroup',
        'counter',
    ];


    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

}
