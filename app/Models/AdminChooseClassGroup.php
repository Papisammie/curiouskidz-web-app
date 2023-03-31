<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminChooseClassGroup extends Model
{
    use HasFactory;
 
    protected $table = 'adminChooseClassGroup';

    protected $fillable = [
        'title',
        'slug',
    ];


}
