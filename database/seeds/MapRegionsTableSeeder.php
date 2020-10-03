<?php

use Illuminate\Database\Seeder;
use \App\Models\Entities\Content\Map\MapRegion;

class MapRegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MapRegion::create([
            'region' => 'Тараз қаласы',
            'title' => 'Тараз қаласы',
            'description' => 'Тараз қаласы',
            'boss' => 'Тараз қаласы',
            'email' => 'Тараз қаласы',
            'phones' => 'Тараз қаласы',
            'address' => 'Тараз қаласы',
        ]);
        MapRegion::create([
            'region' => 'Сарысу',
            'title' => 'Сарысу ауданы',
            'description' => 'Сарысу ауданы',
            'boss' => 'Сарысу ауданы',
            'email' => 'Сарысу ауданы',
            'phones' => 'Сарысу ауданы',
            'address' => 'Сарысу ауданы',
        ]);
        MapRegion::create([
            'region' => 'Мойынқұм',
            'title' => 'Мойынқұм ауданы',
            'description' => 'Мойынқұм ауданы',
            'boss' => 'Мойынқұм ауданы',
            'email' => 'Мойынқұм ауданы',
            'phones' => 'Мойынқұм ауданы',
            'address' => 'Мойынқұм ауданы',
        ]);
        MapRegion::create([
            'region' => 'Талас',
            'title' => 'Талас ауданы',
            'description' => 'Талас ауданы',
            'boss' => 'Талас ауданы',
            'email' => 'Талас ауданы',
            'phones' => 'Талас ауданы',
            'address' => 'Талас ауданы',
        ]);
        MapRegion::create([
            'region' => 'Шу',
            'title' => 'Шу ауданы',
            'description' => 'Шу ауданы',
            'boss' => 'Шу ауданы',
            'email' => 'Шу ауданы',
            'phones' => 'Шу ауданы',
            'address' => 'Шу ауданы',
        ]);
        MapRegion::create([
            'region' => 'Меркі',
            'title' => 'Меркі ауданы',
            'description' => 'Меркі ауданы',
            'boss' => 'Меркі ауданы',
            'email' => 'Меркі ауданы',
            'phones' => 'Меркі ауданы',
            'address' => 'Меркі ауданы',
        ]);
        MapRegion::create([
            'region' => 'Байзақ',
            'title' => 'Байзақ ауданы',
            'description' => 'Байзақ ауданы',
            'boss' => 'Байзақ ауданы',
            'email' => 'Байзақ ауданы',
            'phones' => 'Байзақ ауданы',
            'address' => 'Байзақ ауданы',
        ]);
        MapRegion::create([
            'region' => 'Қордай',
            'title' => 'Қордай ауданы',
            'description' => 'Қордай ауданы',
            'boss' => 'Қордай ауданы',
            'email' => 'Қордай ауданы',
            'phones' => 'Қордай ауданы',
            'address' => 'Қордай ауданы',
        ]);
        MapRegion::create([
            'region' => 'Жуалы',
            'title' => 'Жуалы ауданы',
            'description' => 'Жуалы ауданы',
            'boss' => 'Жуалы ауданы',
            'email' => 'Жуалы ауданы',
            'phones' => 'Жуалы ауданы',
            'address' => 'Жуалы ауданы',
        ]);
        MapRegion::create([
            'region' => 'Жамбыл',
            'title' => 'Жамбыл ауданы',
            'description' => 'Жамбыл ауданы',
            'boss' => 'Жамбыл ауданы',
            'email' => 'Жамбыл ауданы',
            'phones' => 'Жамбыл ауданы',
            'address' => 'Жамбыл ауданы',
        ]);
        MapRegion::create([
            'region' => 'Тұрар Рысқұлов',
            'title' => 'Тұрар Рысқұлов ауданы',
            'description' => 'Тұрар Рысқұлов ауданы',
            'boss' => 'Тұрар Рысқұлов ауданы',
            'email' => 'Тұрар Рысқұлов ауданы',
            'phones' => 'Тұрар Рысқұлов ауданы',
            'address' => 'Тұрар Рысқұлов ауданы',
        ]);
    }
}
