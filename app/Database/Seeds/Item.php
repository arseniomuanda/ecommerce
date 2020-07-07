<?php
namespace App\Database\Seeds;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;

class Item extends Seeder
{
    public function run()
    {
        $total = 1;
        for ($i=0; $i < $total; $i++) { 
            $data = [
                'setting_id' => 1,
                'name' => 'Salada',
                'cost' => '10000',
                'price' => '1000',
                'amount' => '4',
                'manufactured' => '2020-06-03',
                'due_date' => '2020-06-04',
            ];
    
            $this->db->table('item')->insert($data);
            CLI::showProgress(0,$total);
        }
    }
}