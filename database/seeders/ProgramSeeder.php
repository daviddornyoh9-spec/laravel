<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        Program::create([
            'title' => 'Full Stack Development',
            'category' => 'IT',
            'description' => 'Learn Laravel, React and APIs',
            'outcomes' => 'Build real applications',
            'duration' => '6 months',
            'price' => 200,
            'instructor' => 'John Doe',
            'certificate_included' => true,
        ]);

        Program::create([
            'title' => 'Digital Marketing',
            'category' => 'Marketing',
            'description' => 'SEO, Ads, Social Media',
            'outcomes' => 'Become marketer',
            'duration' => '3 months',
            'price' => 100,
            'instructor' => 'Jane Smith',
            'certificate_included' => true,
        ]);
    }
}
