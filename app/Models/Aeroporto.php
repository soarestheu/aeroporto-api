<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeroporto extends Model
{
    use HasFactory;

    protected $primaryKey = 'cd_aeroporto';

    protected $fillable = [
        'nome',
        'codigo_iata',
        'cd_cidade'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cd_cidade', 'cd_cidade');
    }

    public function scopeComNome($query, $filtro)
    {
        return $query->where("nome", $filtro);
    }

    public function scopeComCidade($query, $filtro)
    {
        return $query->where("cd_cidade", $filtro);
    }

    public function scopeComCodigoIata($query, $filtro)
    {
        return $query->where("codigo_iata", $filtro);
    }
}
