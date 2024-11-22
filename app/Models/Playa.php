<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playa extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_playa';
    protected $fillable = ['nombre_playa','latitud','longitud','fk_municipio','fk_region'];
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'fk_municipio');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'fk_region');
    }

}
