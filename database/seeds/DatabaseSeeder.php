<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Generator as Faker;
use Faker\Factory;

use \Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $USERS_NUMBER = 20;

        $faker = Factory::create();

        for ($i = 0; $i < $USERS_NUMBER; $i++) {
            $user = new \App\User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = Hash::make(str_random(20));

            $user->options_json = \json_encode([
                'cinema' => rand(-100, 100),
                'food' => rand(-100, 100),
                'walking' => rand(-100, 100)
            ]);

            $user->save();
        }
    }
}
