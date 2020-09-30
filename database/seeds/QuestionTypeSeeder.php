<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Content\Survey\QuestionType;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionType::create([
            'name' => 'Один ответ'
        ]);

        QuestionType::create([
            'name' => 'Множество ответов'
        ]);


    }
}
