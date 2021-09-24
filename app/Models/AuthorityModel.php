<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorityModel extends Model
{
    protected $table = 'authority';
    protected $primaryKey = 'id';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = ['title'];


    public function getAuthority($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }
}