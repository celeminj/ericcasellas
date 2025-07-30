<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'picture';

    protected $primaryKey = 'id_picture';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'ruta_picture',
        'description_picture',
        'date_creation',
        'album_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id_album');
    }
}
