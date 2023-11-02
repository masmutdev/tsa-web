<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
  public function run()
  {
      $faker = Faker::create('id_ID');
      for ($i = 1; $i <= 100; $i++) {
          DB::table('users')->insert([
              'user_id' => 'TSA - ' . $i,
              'name' => $faker->name,
              'email' => $faker->unique()->safeEmail,
              'password' => bcrypt('123321'),
              'photo' => null,
              'status' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
              'level' => $faker->randomElement(['Admin', 'User']),
              'role' => $faker->randomElement(['Full', 'Member', 'Guest']),
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
  }
}
