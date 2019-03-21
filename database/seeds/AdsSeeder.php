<?php

use Illuminate\Database\Seeder;
use App\Ad;
class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/* Rellenar la tabla. */
       Ad::create([

       		'category_id' => '3',
       		'web_id' =>  '3',
       		'user_id' => '1',
       		'title' => 'Samsung Galaxy S10+',
       		'url' => 'https://www.mediamarkt.es/es/product/_m%C3%B3vil-samsung-galaxy-s10-6-4-edge-amoled-triple-dual-c%C3%A1mara-4k-8gb-ram-512gb-negro-cer%C3%A1mico-1446425.html',
       		'foto' => 'https://picscdn.redblue.de/doi/pixelboxx-mss-80569518/fee_786_587_png/M%C3%B3vil---Samsung-Galaxy-S10---6.4%22-Edge-AMOLED--Triple-Dual-C%C3%A1mara-4K--8GB-RAM--512GB--Negro-cer%C3%A1mico',
       		'precio_vta' => '1259',
       		'precio_chollo' => '1000',
       		'precio_alto' => '1100',

       	]);

        Ad::create([

          'category_id' => '3',
          'web_id' =>  '3',
          'user_id' => '1',
          'title' => 'Samsung Galaxy S9+',
          'url' => 'https://www.mediamarkt.es/es/product/_m%C3%B3vil-samsung-galaxy-s9-6-2-curva-super-amoled-octa-core-64-gb-6-gb-ram-12-12-mp-violeta-1398572.html',

          'foto' => 'https://picscdn.redblue.de/doi/pixelboxx-mss-79123948/fee_786_587_png/M%C3%B3vil---Samsung-Galaxy-S9---6.2--Curva-Super-AMOLED--Octa-Core--64-GB--6-GB-RAM--12---12-MP--Violeta',
          'precio_vta' => '599',
          'precio_chollo' => '499',
          'precio_alto' => '850',

        ]);

       factory(App\Ad::class,10)->create();
    }
}
