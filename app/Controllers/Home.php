<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		session()->start();
	}

	public function index()
	{
		return view('templates/header') . view('main/index') . view('templates/footer');
	}

	public function services()
	{
		return view('templates/header') . view('main/service') . view('templates/footer');
	}

	public function contact()
	{
		return view('templates/header') . view('main/contact') . view('templates/footer');
	}

	public function about()
	{
		return view('templates/header') . view('main/about') . view('templates/footer');
	}

	public function cart($id = null)
	{
		$data = [];
		return view('templates/header') . view('main/cart', $data) . view('templates/footer');
	}

	public function account()
	{
		return view('templates/header').view('main/account').view('templates/footer');
	}
	//--------------------------------------------------------------------

	public function logout()
	{
		session()->set(['logado'=>false]);
		session()->destroy();
		return view('templates/header') . view('main/index') . view('templates/footer');
	}

	public function login()
	{

		$model = new UserModel();
		// get form input
		$data['email'] = $this->request->getVar("email");
		$data['password'] = $this->request->getVar("password");

		$this->validation->setRules([
			'email' => 'required',
			'password' => 'required|min_length[4]'
		]);
		// form validation

		if ($this->validation->run($data) == FALSE) {

			// validation fail
			$id['invalid_credential'] = 'Email/Password Required ';
			return view('templates/header') . view('main/account', $id) . view('templates/footer');
		} else {
			// check for user credentials

			$uresult = $model->get_user($data);

			if (count($uresult) > 0) {

				// set session
				$sess_data = array('logado' => true, 'user_name' => $uresult[0]->name, 'user_id' => $uresult[0]->id, 'setting_id' => $uresult[0]->setting_id, 'cart'=>0, 'is_admin'=> $uresult[0]->is_admin);
				$this->session->set($sess_data);
				return view('templates/header') . view('main/index') . view('templates/footer');
			} else {

				$this->session->setFlashdata('msg', '<div style="color: red; font-size: large;">Email ou Password Errado!</div>');
				return view('templates/header') . view('main/account') . view('templates/footer');
			}
		}
	}

}


