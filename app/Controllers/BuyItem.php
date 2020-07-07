<?php

namespace App\Controllers;

use App\Models\BuyItemModel;

class BuyItem extends BaseController
{
    public function lista()
    {
        $model = new BuyItemModel();
        $data = [
            'item' => $model->get()->paginate(1000),
        ];
        return view('welcome_message', $data);
    }

    public function create()
    {
        $model = new BuyItemModel();
        if ($this->validate([
            'name' => 'required|min_length[3]|max_length[50]',
            'setting_id' => 'required|min_length[3]|max_length[50]',
            'contact_id' => 'required|min_length[3]|max_length[50]',
            'number' => 'required|min_length[3]|max_length[50]',
            'cost' => 'required|min_length[3]|max_length[50]',
            'amount' => 'required|min_length[3]|max_length[50]',
            'category' => 'required|min_length[3]|max_length[50]',
            'status' => 'required|min_length[3]|max_length[50]',
            'date' => 'required|min_length[3]|max_length[50]',
        ])) {
            return 'teu cadastrao n funcionou porke falha na falidaçao';
        } else {
            return $model->save([
                'id' => $this->request->getVar('id'),
                'name' => $this->request->getVar('name'),
                'setting_id' => $this->request->getVar('setting_id'),
                'contact_id' => $this->request->getVar('contact_id'),
                'number' => $this->request->getVar('number'),
                'cost' => $this->request->getVar('cost'),
                'amount' => $this->request->getVar('amount'),
                'category' => $this->request->getVar('category'),
                'status' => $this->request->getVar('status'),
                'date' => $this->request->getVar('date'),
            ]);
        }
    }

    public function deletar($id)
    {
        $model = new BuyItemModel();
        return $model->delete($id);
    }
}
