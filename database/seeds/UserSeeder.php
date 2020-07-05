<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'about' => "About Me.",
            'phone' => '000000',
            'address' => 'Earth',
            'DOB' => '2020-05-07',
            'CV' => '/uploads/profile/IzzatsResume.pdf',
        ]);
    }
}
