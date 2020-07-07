<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyItemModel extends Model
{
    protected $table      = 'buy_item';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'setting_id', 'contact_id', 'number', 'cost', 'amount', 'category', 'status', 'date'];

    protected $useTimestamps = true;
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
