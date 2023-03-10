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

    protected $guarded = ['*'];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $status = [
        2 => [
            'name' => 'Đã kích hoạt',
            'class' => 'badge-success'
        ],
        1 => [
            'name' => 'Chưa kích hoạt',
            'class' => 'badge-secondary'
        ]
    ];
    public function getStatus() 
    {
        return array_get($this->status, $this->active, '[N\A]');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
