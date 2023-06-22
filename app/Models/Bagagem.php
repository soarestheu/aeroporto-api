<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_identificacao',
        'cd_passagem'
    ];

    public function passagem()
    {
        return $this->belongsTo(Passagem::class);
    }
}
