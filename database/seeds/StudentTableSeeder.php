<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 51; $i++) {
        	$student = Student::find($i);
        	$student->firstname = $faker->firstName($gender = null);
        	$student->lastname = $faker->lastName;
        	$student->email = $faker->freeEmail;
            $student->save();
        }
    }
}
