<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            'Science',
            'General Arts',
            'Agric',
            'Visual Arts',
            'Business'
        ];

        foreach($courses as $c){
            Course::create([
                'name' =>$c
            ]);
        }
    }
}
