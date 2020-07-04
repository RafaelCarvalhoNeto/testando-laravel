<?php

use Illuminate\Database\Seeder;
use App\Card;
class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Card::create([
        //     'title' => 'Card Principal',
        //     'content'=> 'Conteudo do card princpal'
        // ]);
        
        factory(Card::class, 20)->create();
    }
}
