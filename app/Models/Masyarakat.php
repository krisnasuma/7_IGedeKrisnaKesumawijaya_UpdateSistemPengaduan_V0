<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Masyarakat extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'masyarakat';
    protected $guard = 'masyarakat';

    protected $fillable = [
        'nik', 'nama', 'email', 'password', 'telepon', 'alamat'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}