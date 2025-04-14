<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie = [
            'Donna',
            'Uomo',
            'Bambini',
            'Accessori',
            'Casa',
            'Auto',
            'Giochi',
            'Sport',
            'Elettronica',
            'Animali',
        ];
        foreach ($categorie as $nomeCategoria) {
            Category::create([
                'name' => $nomeCategoria
            ]);
        }
    }
}
