<?php

namespace App\Models;

use App\Models\Rol;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory,HasApiTokens, Notifiable;
    
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function rol(){
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
