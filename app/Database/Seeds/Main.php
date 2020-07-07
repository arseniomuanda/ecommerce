<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Main extends Seeder
{
    public function run()
    {
        $this->call('User');
        $this->call('Item');
    }

    /**
     * Eu vou fazer ess func para o JP poder deletar as cenas 
     * essa class n tem nada a ver apenas n queria esquecer
     *
     * @return void
     */
    public function deleteFile()
    {

    }
}