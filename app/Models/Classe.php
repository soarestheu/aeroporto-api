<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'cd_tipo_classe',
        'quantidade_assentos',
        'valor_assento', 
    ];

    public function tipoClasse()
    {
        return $this->belongsTo(TipoClasse::class, 'cd_tipo_classe', 'cd_tipo_classes');
    }

    public function vooClasse()
    {
        return $this->hasMany(VooClasse::class, 'cd_classe', 'cd_classe');
    }
}
