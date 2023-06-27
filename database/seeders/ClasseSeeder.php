<?php

namespace Database\Seeders;

use App\Models\Classe;
use App\Models\TipoClasse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classe::firstOrCreate([
            'cd_tipo_classe' => TipoClasse::primeiraClasse()->first()->cd_tipo_classes,
            'quantidade_assentos' => 50,
            'valor_assento' => 200
        ]);
     
        Classe::firstOrCreate([
            'cd_tipo_classe' => TipoClasse::executiva()->first()->cd_tipo_classes,
            'quantidade_assentos' => 100,
            'valor_assento' => 100
        ]);

        Classe::firstOrCreate([
            'cd_tipo_classe' => TipoClasse::economica()->first()->cd_tipo_classes,
            'quantidade_assentos' => 200,
            'valor_assento' => 50
        ]);
    }
}
