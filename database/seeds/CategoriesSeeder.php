<?php

use Illuminate\Database\Seeder;

/* Le decimos de donde*/
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/* Creamos la categoría*/
        Category::create (['nombre'=>'Informática']);
        Category::create (['nombre'=>'Electrónica']);
        Category::create (['nombre'=>'Telefonía']);
    
    }
}
