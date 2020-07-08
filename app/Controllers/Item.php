<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Item extends BaseController
{
    public function index()
    {
        $model = new ItemModel();
        $data = [
            'frutas' => $model->get()->where(['category' => 'fruta'])->paginate(4),
            'legumes' => $model->get()->where(['category' => 'legume'])->paginate(4),
            'sucos' => $model->get()->where(['category' => 'suco'])->paginate(4),
        ];
        return view('templates/header') . view('main/product-grid', $data) . view('templates/footer');
    }

    public function search()
    {
        $db = \Config\Database::connect();
        $data = [
            'item' => $db->query("SELECT * FROM `item` WHERE item.price <= 10000000 AND item.category LIKE '' AND name LIKE '%'"),
        ];
        return view('main/product-search', $data);
    }
    
    public function pesquisar()
    {
        $db = \Config\Database::connect();
        
        $price = $this->request->getVar('price')? 'ds': 123;
        $category = $this->request->getVar('caregory') ? 'fruta' : 'fruta';
        $name = $this->request->getVar('name')? 'a': 'a';
        
        $data = [
            'item' => $db->query("SELECT * FROM `item` WHERE item.price <= $price AND item.category LIKE '$category' AND name LIKE '$name%'"),
        ];
        return view('templates/header') . view('main/product-search', $data) . view('templates/footer');
    }



    public function single($id = null)
    {
        $model = new ItemModel();
        $data = [
            'item' => $model->get($id)->paginate(1000),
        ];
        return view('templates/header') . view('main/product-single',$data) . view('templates/footer');
    }

    public function create()
    {
        $model = new ItemModel();
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
        $model = new ItemModel();
        return $model->delete($id);
    }
}
