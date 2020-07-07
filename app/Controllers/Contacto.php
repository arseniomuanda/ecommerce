<?php
namespace App\Controllers;

class Contacto extends BaseController
{
    public function index()
    {
        $data = [];
        return view('templates/header').view('main/contacto',$data).view('templates/footer');
    }
}