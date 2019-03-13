<?php

use Illuminate\Database\Seeder;
use App\Web;

class WebsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Web::create(['nombre' => 'Ebay', 'url'=>'http://www.ebay.es']);
     Web::create(['nombre' => 'Wallapop']);

    }
}
