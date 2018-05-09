<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Menu', 5)->create();


        factory(App\Menu::class, 5)->create()->each(function ($u) {
            $u->dishes()->save(factory(App\Dish::class)->make());
        });
    }
}
