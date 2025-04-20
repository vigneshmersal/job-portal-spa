<?php

namespace Database\Seeders;

use App\Models\JobPosting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class JobPostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $job = JobPosting::create([
            "title" => "Sr. Full Stack Developer",
            "description" => "You will be responsible for designing, developing, and maintaining robust and scalable web applications from end to end. You must have a deep understanding of both frontend and backend development, thrives in a collaborative environment, and is passionate about delivering high-quality software solutions",
            "company_name" => "DWebPixel",
            // "company_logo" => asset('logo-3.svg'),
            "experience" => "4-5 Yrs",
            "salary" => "$ 4.5-8 Lacs PA",
            "location" => "Remote",
            "extra" => [
                "Remote",
                "Full-Time",
            ]
        ]);
        
        $skills = Skill::whereIn('name', ["Laravel", "React", "Vue", "MySQL"])->pluck('id')->toArray();
        $job->skills()->sync($skills);
            
        $job1 = JobPosting::create([
            "title" => "Sr. Frontend Developer",
            "description" => "You will leverage your expertise in modern frontend technologies and best practices to create exceptional user experiences.",
            "company_name" => "DWebPixel",
            // "company_logo" => asset('logo-2.svg'),
            "experience" => "3-4 Yrs",
            "salary" => "$ 2.5-4 Lacs PA",
            "location" => "Pune",
            "extra" => [
                "Remote",
                "Full-Time",
            ]
        ]);
        
        $skills = Skill::whereIn('name', ["React", "Vue"])->pluck('id')->toArray();
        $job1->skills()->sync($skills);
    }
}
