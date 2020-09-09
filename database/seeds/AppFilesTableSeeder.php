<?php

use Illuminate\Database\Seeder;
use \App\Models\Entities\Support\AppFile;

class AppFilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppFile::create([
            'filename' => 'avatar.png',
            'relative_path' => 'images/avatar.png',
            'system_url' => url('images/avatar.png'),
            'cloud_url' => url('images/avatar.png'),
        ]);
    }
}
