<?php

namespace App\Controllers;

use App\Models\FilesModel;

class Files extends BaseController
{
    public function lista()
    {
        $model = new FilesModel();
        $data = [
            'files' => $model->get()->paginate(1000),
        ];
        return view('welcome_message', $data);
    }

    public function create()
    {
        $model = new FilesModel();
        if ($this->validate([
            'setting_id' => 'required|min_length[3]|max_length[50]',
            'reference' => 'required|min_length[3]|max_length[50]',
            'alt' => 'required|min_length[3]|max_length[50]',
            'path' => 'required|min_length[3]|max_length[50]',
            'type' => 'required|min_length[3]|max_length[50]',
        ])) {
            return 'teu cadastrao n funcionou porke falha na falidaçao';
        } else {
            return $model->save([
                'id' => $this->request->getVar('id'),
                'setting_id' => $this->request->getVar('setting_id'),
                'reference' => $this->request->getVar('reference'),
                'alt' => $this->request->getVar('alt'),
                'path' => $this->request->getVar('path'),
                'type' => $this->request->getVar('type'),
            ]);
        }
    }

    public function deletar($id)
    {
        $model = new FilesModel();
        return $model->delete($id);
    }
}
