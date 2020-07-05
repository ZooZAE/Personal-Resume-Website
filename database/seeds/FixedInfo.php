<?php

use Illuminate\Database\Seeder;

class FixedInfo extends Seeder
{
    public function run()
    {
        App\SocialLink::create([
            'title' => 'Facebook',
            'icon' => 'fa-facebook-official',
            'url' => 'https://www.facebook.com/izzat.ala.eddine/',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Instagram',
            'icon' => 'fa-instagram',
            'url' => 'https://www.instagram.com/izzatae/?hl=en',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Github',
            'icon' => 'fa-github',
            'url' => 'https://github.com/ZooZAE',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Linked In',
            'icon' => 'fa-linkedin',
            'url' => 'linkedin.com/in/izzat-ala-eddine-40537818b',
            'enabled' => '1',
        ]);

        App\SocialLink::create([
            'title' => 'Stack Overflow',
            'icon' => 'fa-stack-overflow',
            'url' => 'https://stackoverflow.com/users/13629848/izzat-ala-eddine',
            'enabled' => '1',
        ]);

        

        App\SocialLink::create([
            'title' => 'Email',
            'icon' => 'fa-google',
            'url' => 'mailto:izzatalaeddine13@gmail.com',
            'enabled' => '1',
        ]);

        App\Education::create([
            'title' => 'Bachelor Degree in Computer Science',
            'place_name' => 'LIU "Lebanese International University"',
            'from' => '2018-09-01',
            'to' => '2020-09-17',
        ]);

        App\Education::create([
            'title' => 'Bachelor Degree in Computer Science',
            'place_name' => 'AUB "American University of Beirut"',
        ]);

        App\Education::create([
            'title' => 'Lebanese Baccalaureate Degree (BACCII)',
            'place_name' => 'Al-Kfeir High School',
            'from' => '2011-08-01',
            'to' => '2012-08-01',
        ]);

        App\Projects::create([
            'title' => 'Library Management System',
            'description' => 'University library system where you can borrow books using an RFID scanner and a mobile application to view Library books and books you have borrowed.',
            'image' => '/uploads/projects/LMS.jpg',
            'from' => '2020-02-01',
            'to' => '2020-05-01',
        ]);

        App\Projects::create([
            'title' => 'Library Management System Mobile Application',
            'description' => 'University library system where you can borrow books using an RFID scanner and a mobile application to view Library books and books you have borrowed.',
            'image' => '/uploads/projects/LMSApp.jpg',
            'from' => '2020-02-01',
            'to' => '2020-05-01',
        ]);

        App\Projects::create([
            'title' => 'Movie Viewer',
            'description' => 'A Mobile application using android studio and java as a language where you can view movies with ratings, add movies and create users.',
            'image' => '/uploads/projects/movie.jpg',
            'from' => '2019-11-01',
            'to' => '2020-12-01',
        ]);

        App\Projects::create([
            'title' => 'Security System',
            'description' => 'Security system and a ﬁre system using Arduino.',
            'image' => '/uploads/projects/SecuritySystem.jpeg',
            'from' => '2019-11-01',
            'to' => '2019-011-05',
        ]);

        App\Projects::create([
            'title' => 'Authentication Entrance against COVID19',
            'description' => 'A safe authentication entrance using an RFID and a screen to verify attendee without using to touch doors or scanners for protection against COVID19.',
            'image' => '/uploads/projects/accesssystem.jpg',
            'from' => '2020-05-01',
            'to' => '2020-06-01',
        ]);

        App\Experience::create([
            'title' => 'Medical Technician',
            'place_name' => 'American University Hospital (AUH)',
            'from' => '2013-08-01',
            'to' => '2015-08-01',
        ]);

        App\Skill::create([
            'skill' => 'Java',
            'icon' => '/uploads/skills/1592745388Java-icon.png',
        ]);

        App\Skill::create([
            'skill' => 'JavaScript',
            'icon' => '/uploads/skills/1592745531javascript-icon.png',
        ]);

        App\Skill::create([
            'skill' => 'Arduino',
            'icon' => '/uploads/skills/1592745596arduino-icon.png',
        ]);

        App\Skill::create([
            'skill' => 'Unity',
            'icon' => '/uploads/skills/1592745708unity-editor-icon-icon.png',
        ]);

        App\Skill::create([
            'skill' => 'Laravel',
            'icon' => '/uploads/skills/1592747840laravel.png',
        ]);

        App\Skill::create([
            'skill' => 'Asp.net',
            'icon' => '/uploads/skills/1592747951asp.png',
        ]);

        App\Skill::create([
            'skill' => 'C#',
            'icon' => '/uploads/skills/1592748393csharp.png',
        ]);

        App\Skill::create([
            'skill' => 'C/C++',
            'icon' => '/uploads/skills/1592748498icon-c-plus-plus.png',
        ]);

        App\Skill::create([
            'skill' => 'BootStrap',
            'icon' => '/uploads/skills/1592748578bootstrap-png-bootstrap-512.png',
        ]);

        App\Skill::create([
            'skill' => 'Html/CSS',
            'icon' => '/uploads/skills/1592748673html-5-icon.png',
        ]);

        App\Skill::create([
            'skill' => 'Sql',
            'icon' => '/uploads/skills/1592748739Files-Sql-icon.png',
        ]);

        App\Skill::create([
            'skill' => 'Latex',
            'icon' => '/uploads/skills/1592748836TeX-Icon.png',
        ]);

        App\Skill::create([
            'skill' => 'API',
            'icon' => '/uploads/skills/1592748911API.png',
        ]);

        App\Certificate::create([
            'title' => 'Bachelor Degree in Computer Science',   
            'from' => '2018-09-01',
            'to' => '2020-06-01',
        ]);

        App\Certificate::create([
            'title' => 'Certiﬁcate in Mobile Repair',
            'description' => 'Mobile hardware and software repair',
            'from' => '2017-08-01',
            'to' => '2017-10-01',
        ]);

        App\Certificate::create([
            'title' => 'Certiﬁcate in CCNA Routing and Switching: Introduction to Networks',
            'from' => '2018-02-01',
            'to' => '2018-06-01',
        ]);

        App\Certificate::create([
            'title' => 'Certiﬁcate in CCNA Routing and Switching: Routing and Switching Essentials',
            'from' => '2019-08-01',
            'to' => '2020-02-01',
        ]);

        App\Language::create([
            'name' => 'English',
            'level' => 'Full Professional Proficiency',
        ]);

        App\Language::create([
            'name' => 'Arabic',
            'level' => 'Native Speaker',
        ]);

        App\Interest::create([
            'interest' => 'Mobile Development',
        ]);

        App\Interest::create([
            'interest' => 'Web Development',
        ]);

        App\Interest::create([
            'interest' => 'Game Development',
        ]);
    }
}
