<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['setting_id', 'name', 'password', 'email', 'phone', 'is_admin', 'status', 'country', 'city', 'district', 'street', 'home'];

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

    public function get_user($data)
    {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query->getResult();
    }
}
