<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
                'preloader' => '#FFFFFF',
                'font' => '#FFFFFF',
                'lightbox' => '#ff0000',
                'icon' =>'/uploads/settings/favicon.png',
                'background' => '/uploads/settings/abstract-technology-background-hacker-concept-programming-coding-binary-computer-code-matrix-background-style_87788-179.jpg',
        ]);
    }
}
