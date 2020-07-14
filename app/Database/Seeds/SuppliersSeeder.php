<?php namespace App\Database\Seeds;

class SuppliersSeeder extends \CodeIgniter\Database\Seeder
{

  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');

    for($i = 0; $i < 10; $i++){
      $data = [
        'nama_supplier' => $faker->name,
        'stok' => $faker->randomDigitNot(0),
      ];
      $this->db->table('suppliers')->insert($data);
    }
  }
}