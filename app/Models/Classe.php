<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'quantidade_assentos',
        'valor_assento', 
        'cd_voo',
    ];

    public function voo()
    {
        return $this->belongsTo(Voo::class);
    }
}
