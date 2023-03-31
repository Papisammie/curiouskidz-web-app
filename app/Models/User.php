<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'roles',
        'avatar',
        'password',
        'activation_code',
        'verified_code',
        'status',
        'google_id',
        'parentImage',
        'class',
        'parentName',
        'parentNumber',
        'how_many_kids',
        'classGroup',
        'nameOfSchool',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function chat_replies() {
        return $this->hasMany(ChatReply::class);
    }
}
