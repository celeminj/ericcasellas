<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';
    
    protected $primaryKey = 'id_rol';

    public $timestamps = false;

    public function usuario(){
        return $this->hasMany(User::class, 'id');
    }
}
