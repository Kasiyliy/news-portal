<?php

use Illuminate\Database\Seeder;
use \App\Models\Entities\Core\User;
use \App\Models\Entities\Core\Role;
use \App\Models\Entities\Support\AppFile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'phone' => '7123',
            'password' => bcrypt('password'),
            'avatar_file_id' => AppFile::DEFAULT_IMAGE_ID,
            'role_id' => Role::ADMIN_ID
        ]);
    }
}
