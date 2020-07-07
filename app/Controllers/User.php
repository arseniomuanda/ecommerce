<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function lista()
    {
        $model = new UserModel();
        $data = [
            'users' => $model->get()->paginate(1000),
        ];
        return view('welcome_message', $data);
    }

    public function perfil(int $id)
    {
        $model = new UserModel();
        $data['user'] = $model->get($id)->paginate(1);
    }

    public function create()
    {
        $model = new UserModel();
        if ($this->validate([
            'setting_id' => 'required|min_length[3]|max_length[50]',
            'name' => 'required|min_length[3]|max_length[50]',
            'password' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[3]|max_length[50]',
            'phone' => 'required|min_length[3]|max_length[50]',
            'is_admin' => 'required|min_length[3]|max_length[50]',
            'status' => 'required|min_length[3]|max_length[50]',
            'country' => 'required|min_length[3]|max_length[50]',
            'city' => 'required|min_length[3]|max_length[50]',
            'district' => 'required|min_length[3]|max_length[50]',
            'street' => 'required|min_length[3]|max_length[50]',
            'home' => 'required|min_length[3]|max_length[50]',
        ])) {
            return 'teu cadastrao n funcionou porke falha na falidaçao';
        } else {
            return $model->save([
                'id' => $this->request->getVar('id'),
                'setting_id' => $this->request->getVar('setting_id'),
                'name' => $this->request->getVar('name'),
                'password' => $this->request->getVar('password'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'is_admin' => $this->request->getVar('is_admin'),
                'status' => $this->request->getVar('status'),
                'country' => $this->request->getVar('country'),
                'city' => $this->request->getVar('city'),
                'district' => $this->request->getVar('street'),
                'street' => $this->request->getVar('street'),
                'home' => $this->request->getVar('home'),
            ]);
        }
    }

    public function deletar($id)
    {
        $model = new UserModel();
        return $model->delete($id);
    }
}
