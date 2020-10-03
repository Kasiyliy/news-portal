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
        $this->call(RolesTableSeeder::class);
        $this->call(AppFilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(AboutProjectSeeder::class);
        $this->call(QuestionTypeSeeder::class);
        $this->call(MapRegionsTableSeeder::class);
    }
}
