<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'cpf', 
        'data_nascimento', 
        'email'
    ];

    public function passagens()
    {
        return $this->hasMany(Passagem::class);
    }
}
