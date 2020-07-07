<?php
namespace App\Database\Seeds;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $total = 1;
        for ($i=0; $i < $total; $i++) { 
            $data = [
                'setting_id' => 1,
                'name' => 'Vegan Commerce',
                'password' => '123',
                'email' => 'eu@email.com',
                'phone' => '999999999',
                'is_admin' => '1',
                'status' => '1',
                'country' => 'South Africa',
                'city' => 'Cape Town',
                'district' => '',
                'street' => '',
                'home' => '32As4',
            ];
    
            $this->db->table('user')->insert($data);
            CLI::showProgress(0,$total);
        }
    }
}