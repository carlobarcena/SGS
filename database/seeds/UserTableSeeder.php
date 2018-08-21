<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            $user = new User();
            $user->username = $faker->name;
            $user->password = bcrypt('12345');
            $roles = ['admin', 'teacher', 'student'];
            $user->role = $roles[$faker->numberBetween(0,2)];
            $user->save();
        }
    }
}
