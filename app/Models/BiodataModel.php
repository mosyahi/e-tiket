<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table            = 't_biodata';
    protected $primaryKey       = 'id_biodata';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'user_id',
        'no_telepon',
        'nama_lengkap',
        'tanggal_lahir',
        'alamat',
        'nomor_ktp',
        'foto_ktp',
    ];

    protected bool $allowEmptyInserts = false;

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

    public function getBiodataWithUser($user_id)
    {
        return $this->select('tb_biodata.*, tbl_user.username,  tbl_user.status, tbl_user.email, tbl_user.role')
            ->join('tbl_user', 'tbl_user.id_user = tb_biodata.user_id')
            ->where('tb_biodata.user_id', $user_id)
            ->first();
    }

    public function getDataByRole()
    {
        return $this->db->table($this->table)
            ->join('tbl_user', 'tbl_user.id_user = tb_biodata.user_id')
            ->where('tbl_user.role', 'Penyedia')
            ->get()
            ->getResultArray();
    }

    public function getBiodataByUserId($id_user)
    {
        return $this->where('user_id', $id_user)->first();
    }
}
