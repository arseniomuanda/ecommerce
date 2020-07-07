<?php

namespace App\Controllers;

use App\Models\SettingsModel;

class Settings extends BaseController
{
    public function create()
    {
        $model = new SettingsModel();
        if ($this->validate([
            'setting_id' => 'required|min_length[3]|max_length[50]',
            'name' => 'required|min_length[3]|max_length[50]',
            'cost' => 'required|min_length[3]|max_length[50]',
            'price' => 'required|min_length[3]|max_length[50]',
            'amount' => 'required|min_length[3]|max_length[50]',
            'manufactured' => 'required|min_length[3]|max_length[50]',
            'due_date' => 'required|min_length[3]|max_length[50]',
        ])) {
            return 'teu cadastrao n funcionou porke falha na falidaçao';
        } else {
            return $model->save([
                'id' => $this->request->getVar('id'),
                'setting_id' => $this->request->getVar('setting_id'),
                'name' => $this->request->getVar('name'),
                'cost' => $this->request->getVar('cost'),
                'price' => $this->request->getVar('price'),
                'amount' => $this->request->getVar('amount'),
                'manufactured' => $this->request->getVar('manufactured'),
                'deu_date' => $this->request->getVar('deu_date'),
            ]);
        }
    }

    public function deletar($id)
    {
        $model = new SettingsModel();
        return $model->delete($id);
    }
}
