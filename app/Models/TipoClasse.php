<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoClasse extends Model
{
    use HasFactory;

    // protected $table = "tipo_classes";
    protected $primaryKey = 'cd_tipo_classes';

    protected $fillable = [
        'nm_tipo_classes'
    ];

    public function classe()
    {
        return $this->hasMany(Classe::class, 'cd_tipo_classes', 'cd_tipo_classe');
    }

    public function scopeExecutiva($query)
    {
        return $query->where("nm_tipo_classes", "Executiva");
    }

    public function scopePrimeiraClasse($query)
    {
        return $query->where("nm_tipo_classes", "Primeira classe");
    }

    public function scopeEconomica($query)
    {
        return $query->where("nm_tipo_classes", "Econômica");
    }
}
