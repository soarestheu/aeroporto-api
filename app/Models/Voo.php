<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 
        'cd_aeroporto_origem',
        'cd_aeroporto_destino', 
        'data_partida', 
        'hora_partida'
    ];

    public function getDataPartidaAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function aeroportoOrigem()
    {
        return $this->belongsTo(Aeroporto::class, 'cd_aeroporto_origem', 'cd_aeroporto');
    }

    public function aeroportoDestino()
    {
        return $this->belongsTo(Aeroporto::class, 'cd_aeroporto_destino', 'cd_aeroporto');
    }

    public function classes()
    {
        return $this->hasMany(Classe::class, 'cd_voo', 'cd_voo');
    }
}
