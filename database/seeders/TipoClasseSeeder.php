<?php

namespace Database\Seeders;

use App\Models\TipoClasse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoClasse::firstOrCreate(['nm_tipo_classes' => 'Executiva']);
        TipoClasse::firstOrCreate(['nm_tipo_classes' => 'Primeira classe']);
        TipoClasse::firstOrCreate(['nm_tipo_classes' => 'Econômica']);
    }
}
