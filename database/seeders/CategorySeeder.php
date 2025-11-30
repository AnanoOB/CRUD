<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Genérico'
            // Quita 'description'
        ]);

        Category::create([
            'name' => 'Tecnología'
        ]);

        Category::create([
            'name' => 'Deportes'
        ]);
    }
}

        Category::create([
            'name' => 'Bebidas',
            'description' => 'Productos bebibles.'
        ]);
    }
}
