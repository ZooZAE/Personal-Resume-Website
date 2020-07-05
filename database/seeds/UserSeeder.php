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
            'name' => 'Izzat Ala Eddine',
            'email' => 'izzatalaeddine13@gmail.com',
            'password' => bcrypt('password'),
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'about' => "I'm a University Student studying Computer Science to get my Bachelor Degree. I got interested in web designing first class i took and i'm always interested in learning more.",
            'phone' => '71407902',
            'address' => 'Lebanon/Beirut',
            'DOB' => '1993-04-13',
            'CV' => '/uploads/profile/IzzatsResume.pdf',
        ]);
    }
}
