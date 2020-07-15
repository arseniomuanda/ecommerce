<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyItemModel extends Model
{
    protected $table      = 'buy_item';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['setting_id', 'buy_id', 'item_id', 'taxa', 'cost', 'amount'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get($id = null)
    {
        if ($id === null)
            return $this;
        $this->where(['id' => $id]);
        return $this;
    }
}
