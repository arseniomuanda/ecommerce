<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('templates/header') . view('main/index') . view('templates/footer');
	}

	public function contact()
	{
		return view('templates/header') . view('main/contact') . view('templates/footer');
	}

	public function about()
	{
		return view('templates/header') . view('main/about') . view('templates/footer');
	}


	//--------------------------------------------------------------------

}
