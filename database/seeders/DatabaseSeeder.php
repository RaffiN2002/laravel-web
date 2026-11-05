<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\page;
use App\Models\metadata;
use App\Models\background;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Admin User (authorizes raffinaufal2002@gmail.com for Google Login)
        User::updateOrCreate(
            ['email' => 'raffinaufal2002@gmail.com'],
            [
                'name' => 'Raffi Naufal',
                'google_id' => 'temp_google_id',
                'avatar' => 'face1.jpg',
            ]
        );

        // 2. Default Pages
        $about = page::updateOrCreate(
            ['title' => 'Raffi Naufal'],
            ['content' => '<p>Hi, I am a passionate Web Developer focused on building clean, efficient, and responsive web applications.</p>']
        );

        $interest = page::updateOrCreate(
            ['title' => 'Interests'],
            ['content' => 'Web Development, Open-source Software, Cloud Computing, UI/UX Design']
        );

        $award = page::updateOrCreate(
            ['title' => 'Awards'],
            ['content' => 'Academic Excellence Award, Best Project Presentation']
        );

        // 3. Metadata
        $metadata = [
            'page_about' => $about->id,
            'page_interest' => $interest->id,
            'page_award' => $award->id,
            'photo' => '230502031821.jpg',
            'city' => 'Jakarta',
            'province' => 'Indonesia',
            'email' => 'raffinaufal2002@gmail.com',
            'phonenum' => '+62 812-3456-7890',
            'facebook' => 'https://facebook.com',
            'linkedin' => 'https://linkedin.com',
            'github' => 'https://github.com',
            'twitter' => 'https://twitter.com',
            'language' => 'PHP, Laravel, JavaScript, HTML5, CSS3, MySQL',
            'workflow' => 'Git, Agile/Scrum, Responsive Web Design',
        ];

        foreach ($metadata as $key => $value) {
            metadata::updateOrCreate(['metakey' => $key], ['metavalue' => $value]);
        }

        // 4. Sample Experience
        background::updateOrCreate(
            ['title' => 'Web Developer', 'type' => 'experience'],
            [
                'start' => '2023-01-01',
                'end' => null,
                'info1' => 'Tech Studio',
                'content' => '<p>Built and maintained modern web applications using Laravel, MySQL, and modern frontend tools.</p>',
            ]
        );

        // 5. Sample Education
        background::updateOrCreate(
            ['title' => 'Computer Science', 'type' => 'education'],
            [
                'start' => '2019-09-01',
                'end' => '2023-07-01',
                'info1' => 'University Degree',
                'info2' => 'Bachelor of Computer Science',
                'info3' => '3.80',
                'content' => '<p>Graduated with honors in Computer Science.</p>',
            ]
        );
    }
}
