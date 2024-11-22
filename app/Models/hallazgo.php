<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hallazgo extends Model
{

    protected $primaryKey = 'id_hallazgo';
    protected $fillable = ['fk_tipo','fk_muestreo','cantidad','porcentaje'];
    public function tipo_residuo()
    {
        return $this->belongsTo(tipo_residuo::class, 'fk_tipo');
    }
   
    public function muestreo()
    {
        return $this->belongsTo(muestreo::class, 'fk_muestreo');
    }
    

}
