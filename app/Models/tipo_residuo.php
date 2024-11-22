<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_residuo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tipo';
    protected $fillable = ['nombre_tipo','fk_clasificacion'];
    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'fk_clasificacion');
    }
}
