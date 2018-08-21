<?php

use Illuminate\Database\Seeder;
use App\Teacher;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 6; $i++) {
        	$student = Teacher::find($i);
        	$student->firstname = $faker->firstName($gender = null);
        	$student->lastname = $faker->lastName;
        	$student->email = $faker->freeEmail;
            $student->save();
        }
    }
}
