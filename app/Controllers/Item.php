<?php

namespace App\Controllers;

use App\Models\BuyItemModel;
use App\Models\ItemModel;
use Config\Database;

class Item extends BaseController
{
    public function index()
    {
        $model = new ItemModel();
        $data = [
            'diversos' => $model->get()->paginate(3),
            'frutas' => $model->get()->where(['category' => 'fruta'])->paginate(3),
        ];
        return view('templates/header') . view('main/product-grid', $data) . view('templates/footer');
    }

    public function add()
    {
        if ((session()->get('is_admin') != 1))
            return view('templates/header') . view('main/index') . view('templates/footer');
        return view('templates/header') . view('main/product-add') . view('templates/footer');
    }

    public function search()
    {
        $db = \Config\Database::connect();
        $price = ($this->request->getVar('price') == '') ? 1000000 : $this->request->getVar('price');
        $category = ($this->request->getVar('caregory') == '') ? 'fruta' : $this->request->getVar('caregory');
        $name = ($this->request->getVar('name') == '') ? 'eu' : $this->request->getVar('name');
        $data = [
            'items' => $db->query("SELECT * FROM `item` WHERE item.price <= $price AND item.category LIKE '$category' AND name LIKE '$name%' LIMIT 6")->getResultArray(),
        ];
        return view('lista/product', $data);
    }

    public function pesquisar()
    {
        return view('templates/header') . view('main/product-search') . view('templates/footer');
    }

    public function single($id = null)
    {
        $model = new ItemModel();
        $data = [
            'items' => $model->get($id)->paginate(1),
        ];
        return view('templates/header') . view('main/product-single', $data) . view('templates/footer');
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

    public function cart()
    {
        return view('lista/cart');
    }

    public function updateCart()
    {
        $db = Database::connect();
        $amount = $this->request->getVar('amount');
        $price = $this->request->getVar('price');
        $id = $this->request->getVar('id');

        $price = ($price*$amount);
        return $db->query("UPDATE buy_item SET cost = $price, amount = $amount Where id =$id");
    }
}
