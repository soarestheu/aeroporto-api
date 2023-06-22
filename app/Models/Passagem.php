<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_identificacao', 
        'preco_total', 
        'cd_classe', 
        'cd_voo', 
        'cd_passageiro', 
        'cd_comprador'
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function voo()
    {
        return $this->belongsTo(Voo::class);
    }

    public function passageiro()
    {
        return $this->belongsTo(Passageiro::class);
    }

    public function comprador()
    {
        return $this->belongsTo(Comprador::class);
    }

    public function bagagem()
    {
        return $this->hasOne(Bagagem::class);
    }
}
