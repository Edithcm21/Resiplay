<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestreo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_muestreo';
    protected $fillable = ['num_muestreo','zona','dia','anio','fecha','fk_playa','fk_capturista', 'autorizado'];
    public function playa()
    {
        return $this->belongsTo(Playa::class, 'fk_playa');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_capturista');
    }

    
}
