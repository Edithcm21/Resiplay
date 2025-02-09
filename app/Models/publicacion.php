<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class publicacion extends Model
{
    use HasFactory;
    protected $table = 'publicaciones';
    protected $fillable = ['titulo','descripcion','autores','fecha','file','img'];
}
