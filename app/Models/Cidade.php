<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'unidade_federativa'];

    public function aeroportos()
    {
        return $this->hasMany(Aeroporto::class);
    }
}
