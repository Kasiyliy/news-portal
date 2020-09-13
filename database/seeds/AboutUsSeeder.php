<?php

use App\Models\Entities\Content\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'title' => 'Жастар саны',
            'count' => '0',
            'type' => AboutUs::TEENAGERS_COUNT
        ]);
        AboutUs::create([
            'title' => 'Мемлекеттік бағдарламалар',
            'count' => '0',
            'type' => AboutUs::APPLICATIONS_COUNT
        ]);
        AboutUs::create([
            'title' => 'Еріктілер саны',
            'count' => '0',
            'type' => AboutUs::VOLUNTEERS_COUNT
        ]);
        AboutUs::create([
            'title' => 'Ресурстық орталық',
            'count' => '0',
            'type' => AboutUs::RESOURCES_CENTER_COUNT
        ]);
    }
}
