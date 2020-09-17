<?php

use App\Models\Entities\Content\AboutProject;
use Illuminate\Database\Seeder;

class AboutProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutProject::create([
            'main_title' => 'Жамбыл жастарының ресурстық орталығы',
            'main_description' => 'default',
            'main_image' => 'modules/front/assets/img/picture_slider.png',
            'footer_title' => 'Жастар Саясаты басқармасы',
            'footer_image' => 'modules/front/assets/img/logo.png',
            'footer_address' => 'Желтоқсан көшесі, 78',
            'footer_number' => '555-556-557'
        ]);
    }
}
