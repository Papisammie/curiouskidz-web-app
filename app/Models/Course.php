<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'course_id',
        'title',
        'author',
        'description',
        'video_url',
        'type',
        'image',
        'requirements',
        'cat_id',
        'ageGroup',
        'libraryGroup',
        'class',
        'status',
    ];

    /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
    protected $casts = [
        'placeditems' => 'array',
    ];



    public function video_counters()
    {
        return $this->morphMany(VideoCounter::class);
    }


}
