<?php

namespace App\Models;

use CodeIgniter\Model;

class WebModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'website';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_website', 'url_website', 'status_website'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getWebsite($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return $this->where(['id' => $id])->first();
    }

    public function save_register($data)
    {
        $this->db->table('users')->insert($data);
    }
    
    public function login($user_email, $user_password)
    {
        return $this->db->table('users')->where([
            'user_email' => $user_email,
            'user_password' => $user_password,
        ])->get()->getRowArray();
    }

    public function search($keyword)
    {
        return $this->table('website')->like('nama_website', $keyword);
    }
}
