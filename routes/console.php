<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command("bootstrap", function () {
    Artisan::call("key:generate");
    $this->comment("Key generated");
    if (!env('JWT_SECRET')) {
        Artisan::call("jwt:secret");
        $this->comment("Jwt secret generated");
    } else {
        $this->comment("Jwt secret already exists");
    }
    Artisan::call("migrate");
    $this->comment("Database migrated");
    Artisan::call("db:seed");
    $this->comment("Database seeded");
    Artisan::call("optimize");
    $this->comment("Project optimized");
});