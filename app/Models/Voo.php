<?php

namespace App\Models;

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
        'hora_partida'];

    public function aeroportoOrigem()
    {
        return $this->belongsTo(Aeroporto::class, 'cd_aeroporto_origem');
    }

    public function aeroportoDestino()
    {
        return $this->belongsTo(Aeroporto::class, 'cd_aeroporto_destino');
    }

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
}
