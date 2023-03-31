<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    use HasFactory;
 
    protected $table = 'badges';

    protected $fillable = [
        'title',
        'image',
        'ageGroup',
        'status',
        'description',
    ];


}