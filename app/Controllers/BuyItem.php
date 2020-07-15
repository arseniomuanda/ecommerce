<?php

namespace App\Controllers;

use App\Models\BuyItemModel;
use App\Models\BuyModel;

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
        $id = null;
        $model = new BuyItemModel();
        $db = \Config\Database::connect();
        if (session()->get('buy_id') === null) {
            $model2 = new BuyModel();
            $model2->save([
                'contact_id' => session()->get('user_id'),
                'setting_id' => 1,
            ]);
            $cliente = session()->get('user_id');
            $row = $db->query("SELECT MAX(id) AS id FROM `buy` WHERE contact_id = $cliente")->getRow();
            if (isset($row)) {
                $id = $row->id;
            }
            session()->set(['buy_id' => $id]);
        }
        if($model->save([
            'id' => $this->request->getVar('id'),
            'setting_id' => 1,
            'buy_id' => session()->get('buy_id'),
            'item_id' => $this->request->getVar('item_id'),
            'taxe' => $this->request->getVar('taxe'),
            'cost' => $this->request->getVar('cost'),
            'amount' => $this->request->getVar('amount'),
        ])){
            session()->set(['cart'=> session()->get('cart')+1]);
        }

    }

    public function deletar($id)
    {
        $model = new BuyItemModel();
        return $model->delete($id);
    }
}
