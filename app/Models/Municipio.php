<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_municipio';
    protected $fillable = ['nombre_municipio','fk_estado'];
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'fk_estado');
    }
}

