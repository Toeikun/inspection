<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DegreeTableSeeder::class,
            DepartmentTableSeeder::class,
            FacultyTableSeeder::class,
            MajorTableSeeder::class,
            PermissionTableSeeder::class,
            PositionTableSeeder::class,
            StatusTableSeeder::class,
            StaffTableSeeder::class,
        ]);
    }
}
