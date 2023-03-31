<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminChooseAgeGroup extends Model
{
    use HasFactory;
 
    protected $table = 'adminChooseAgeGroup';

    protected $fillable = [
        'title',
    ];


}
