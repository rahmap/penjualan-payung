<?php namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{

  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');

    for($i = 0; $i < 10; $i++){
      $data = [
        'user_name' => $faker->name,
        'user_email' => $faker->email,
        'user_password' => $faker->password
      ];
      $this->db->table('users')->insert($data);
    }
  }
}