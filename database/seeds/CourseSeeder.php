<?php

declare(strict_types=1);

use App\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(Course::class, 500)->create()->each(function (Course $course): void {
            $course->save(factory(Course::class)->make()->toArray());
        });
    }
}
