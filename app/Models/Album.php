<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'album';

    protected $primaryKey = 'id_album'; // Clave primaria personalizada

    public $timestamps = false; // No usas created_at ni updated_at

    protected $fillable = [
        'title',
        'description_album',
        'image_rute',
        'date_creation',
        'user_id',
    ];

    // Relación con usuario (si tienes modelo User)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relación con las imágenes del álbum
    public function pictures()
    {
        return $this->hasMany(Picture::class, 'album_id', 'id_album');
    }
}
