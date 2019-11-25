<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->create()->each(function($u) {

         $u->rascategor()->saveMany(factory(App\RasCategor::class, 5)->make());
         $u->daxcategor()->savemany(factory(App\DaxCategor::class, 5)->make());



         $u->balans()->save(factory(App\Balans::class)->make());
         $u->daxod()->saveMany(factory(App\Daxod::class, 5)->make([

         'daxcategor_id' => function () {
        $daxod = \App\DaxCategor::inRandomOrder()->first();
        return $daxod->id;
    },
         
        ]));
         $u->rasxod()->saveMany(factory(App\Rasxod::class, 5)->make([

         'rascategor_id' => function () {
        $rasxod = \App\RasCategor::inRandomOrder()->first();
        return $rasxod->id;
    },
         
        ]));
        
});
    }
}
