<?php

namespace App\Models;

use CodeIgniter\Model;

class SmpModel extends Model
{
    protected $table = 'smp_list';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'authority_id', 'date_from', 'date_to', 'duration'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function getSmp($id = false, $params = [])
    {
        if ($id === false) {
            if (!empty($params)) {

                $this->like('title', $params['title']);
                $this->where('authority_id', $params['authority']);
                if (!empty($params['date_from']) && !empty($params['date_to'])) {
                    $this->where('date_from', $params['date_from']);
                    $this->where('date_to', $params['date_to']);
                }
            }

            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    public function createSmp($data) 
    {
        $query = $this->save([
            'title' => $data['title'],
            'authority_id'  => $data['authority'],
            'date_from'  => date('Y-m-d', strtotime(str_replace('/', '-', $data['date_from']))),
            'date_to'  => date('Y-m-d', strtotime(str_replace('/', '-', $data['date_to']))),
            'duration'  => $data['duration'],
        ]);

        return $query;
    }

    public function updateSmp($id, $data) 
    {
        if ($id === false) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $id);
        }

        $query = $this->db->table($this->table)->update([
            'title' => $data['title'],
            'authority_id'  => $data['authority_id'],
            'date_from'  => date('Y-m-d', strtotime(str_replace('/', '-', $data['date_from']))),
            'date_to'  => date('Y-m-d', strtotime(str_replace('/', '-', $data['date_to']))),
            'duration'  => $data['duration'],
        ], array('id' => $id));
        return $query;
    }

    public function deleteSmp($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 
}