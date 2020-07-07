<?php

namespace App\Controllers;

use App\Models\BuyModel;

class Buy extends BaseController
{
    public function lista()
    {
        $model = new BuyModel();
        $data = [
            'compras' => $model->get()->paginate(12),
            'pager' => $model->pager
        ];
        return view('welcome_message', $data);
    }

    public function create()
    {
        $model = new BuyModel();
        if ($this->validate([
            'setting_id' => 'required|min_length[3]|max_length[50]',
            'contact_id' => 'required|min_length[3]|max_length[50]',
            'number' => 'required|min_length[3]|max_length[50]',
            'cost' => 'required|min_length[3]|max_length[50]',
            'category' => 'required|min_length[3]|max_length[50]',
            'status' => 'required|min_length[1]|max_length[50]',
        ])) {
            return 'teu cadastrao n funcionou porke falha na falidaçao';
        } else {
            return $model->save([
                'id' => $this->request->getVar('id'),
                'setting_id' => $this->request->getVar('setting_id'),
                'contact_id' => $this->request->getVar('contact_id'),
                'number' => $this->request->getVar('number'),
                'cost' => $this->request->getVar('cost'),
                'category' => $this->request->getVar('category'),
                'status' => $this->request->getVar('status'),
                'date' => $this->request->getVar('date'),
            ]);
        }
    }

    public function deletar($id)
    {
        $model = new BuyModel();
        return $model->delete($id);
    }
}
