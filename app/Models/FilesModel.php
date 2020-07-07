<?php

namespace App\Models;

use CodeIgniter\Model;

class FilesModel extends Model
{
    protected $table      = 'files';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['setting_id', 'reference', 'alt', 'path', 'type'];

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
