<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voo extends Model
{
    use HasFactory;
    use SoftDeletes;
        /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cd_voo';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'numero', 
        'cd_aeroporto_origem',
        'cd_aeroporto_destino', 
        'data_partida', 
        'hora_partida',
        'cancelado'
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

    public function vooClasse()
    {
        return $this->hasMany(VooClasse::class, 'cd_voo', 'cd_voo');
    }

    public function scopeComNumero($query, $filtro)
    {
        return $query->where("numero", $filtro);
    }

    public function scopeComAeroportoOrigem($query, $filtro)
    {
        return $query->where("numero", $filtro);
    }

    public function scopeComAeroportoDestino($query, $filtro)
    {
        return $query->where("numero", $filtro);
    }

    public function scopeComDataPartida($query, $filtro)
    {
        return $query->where("numero", $filtro);
    }

    public function scopeComHoraPartida($query, $filtro)
    {
        return $query->where("numero", $filtro);
    }

}
