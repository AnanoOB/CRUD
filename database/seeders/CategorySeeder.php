<?php
/*Para insertar el dato en específico en la base de datos, ejecutar el siguiente comando:
php artisan db:seed --class=CategorySeeder --force
*/
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Genérico',
            'description' => 'Genérico.'
        ]);


        Category::create([
            'name' => 'Económica',
            'description' => 'Económica.'
        ]);


        Category::create([
            'name' => 'Bebidas',
            'description' => 'Productos bebibles.'
        ]);
    }
}