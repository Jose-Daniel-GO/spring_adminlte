<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','color'];
    // POR ALGUNA RAZON NO QUIERE SERVIR EL METODO getRouteKeyName
    // public function getRouteKeyName()
    // {
    //     return "slug";
    // }
    
    // Relacion Muchos a Muchos Inversa
    public function post(){ return $this->belongsToMany(Post::class);}
}
