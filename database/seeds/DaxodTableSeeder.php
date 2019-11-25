<?php

use Illuminate\Database\Seeder;

class DaxodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Daxod::class, 5)->create([

         'user_id' => $this->getRandomUserId(),
         'daxcategor_id' => $this->getRandomDaxCategorId(),
        ]);
    }

    private function getRandomUserId() {
        $user = \App\User::inRandomOrder()->first();
        return $user->id;
    }
    private function getRandomDaxCategorId() {
        $categor = \App\DaxCategor::inRandomOrder()->first();
        return $categor->id;
    }

}
