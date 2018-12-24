<?php

use Illuminate\Database\Seeder;

class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Major::class, 1)->create();
    }
}
