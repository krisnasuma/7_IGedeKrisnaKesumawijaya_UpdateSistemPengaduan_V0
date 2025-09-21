<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'masyarakat_id', 'jenis', 'judul', 'deskripsi', 
        'status', 'keterangan', 'admin_id'
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }

    public function admin()
    {
        return $this->belongsTo(Administrator::class, 'admin_id');
    }
}