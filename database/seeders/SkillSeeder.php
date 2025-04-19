<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::insert([
            ['name' => 'Laravel'],
            ['name' => 'Inertia'],
            ['name' => 'Vue'],
            ['name' => 'Livewire'],
            ['name' => 'Alpine'],
            ['name' => 'TailwindCSS'],
            ['name' => 'MySQL'],
            ['name' => 'React'],
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'Alpine'],
            ['name' => 'Bootstrap'],
            ['name' => 'Git'],
            ['name' => 'AWS'],
        ]);
        
        // Skill::factory(25)->create();
    }
}
