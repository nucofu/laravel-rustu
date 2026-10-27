<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['judul_event', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'lokasi', 'gambar', 'admin_id'];

    public function admin() { return $this->belongsTo(Admin::class); }
}
