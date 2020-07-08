<?php
namespace App\Database\Seeds;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Item extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $total = 30;
        for ($i=0; $i < $total; $i++) { 
            $data = [
                'setting_id' => 1,
                'name' => $faker->name,
                'cost' => $faker->numberBetween(100, 300),
                'price' => $faker->numberBetween(400, 600),
                'amount' => $faker->numberBetween(40, 60),
                'manufactured' => '2020-06-03',
                'due_date' => '2020-06-04',
                'category' => 'legume'
            ];
    
            $this->db->table('item')->insert($data);
            CLI::showProgress($i,$total-1);
        }
    }
}