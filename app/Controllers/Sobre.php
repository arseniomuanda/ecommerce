<?php
namespace app\Controllers;

class Sobre extends BaseController 
{
    public function index()
    {
        return view('templates/header').view('main/sobre').view('templates/footer');
    }
}