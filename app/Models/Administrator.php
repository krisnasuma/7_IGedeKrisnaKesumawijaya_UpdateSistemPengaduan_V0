<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'administrator';
    protected $guard = 'admin';

    protected $fillable = [
        'username', 'nama', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}