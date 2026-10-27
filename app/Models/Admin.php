<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['nama_lengkap', 'email', 'password', 'role', 'foto_profil'];

    public function events() { return $this->hasMany(Event::class); }
    // public function beritas() { return $this->hasMany(Berita::class, 'id_admin', 'id_admin'); }
    // public function kontaks() { return $this->hasMany(Kontak::class, 'id_admin', 'id_admin'); }
    
}
