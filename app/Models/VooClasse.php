<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VooClasse extends Model
{
    use HasFactory;

    protected $table = 'voos_classes';
    protected $primaryKey = 'cd_voo_classe';

    protected $fillable = [
         'cd_voo',
         'cd_classe'
    ];

    
    public function voo()
    {
        return $this->belongsTo(Voo::class, 'cd_voo', 'cd_voo');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'cd_classe', 'cd_classe');
    }
}
