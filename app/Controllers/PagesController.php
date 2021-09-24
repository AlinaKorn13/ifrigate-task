<?php

namespace App\Controllers;

use App\Models\SmpModel;
use App\Models\AuthorityModel;
use CodeIgniter\Controller;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($id = false)
    {
        $searchParams = [];
        $model = new SmpModel();

        if (!empty($this->request->getGet('title'))) {
            $data['searchParams'] = $searchParams = $this->request->getGet();
        }

        $data['list'] = $model->getSmp($id, $searchParams);
        $data['auth_list'] = (new AuthorityModel())->getAuthority();

        if (isset($id) && $id === true && empty($data['list'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the list item: '. $id);
        }

        if ($id === false) {
            foreach ($data['list'] as $key => $item) {
                $authority = (new AuthorityModel())->getAuthority($item['authority_id']);
                $item['authority_name'] = $authority['title'];
                $data['list'][$key] = $item;
            }

            echo view('templates/header', $data);
            echo view('pages/home', $data);
            echo view('pages/modal_create', $data);
            echo view('templates/footer', $data);
            
        } else {
            $authority = (new AuthorityModel())->getAuthority($data['list']['authority_id']);
            $data['list']['authority_name'] = $authority['title'];
            echo view('pages/modal_update', $data);
        }

    }

    public function create()
    {
        
        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'authority'  => 'required|integer',
            'date_from'  => 'required|valid_date',
            'date_to'  => 'required|valid_date',
        ])) {
            $model = new SmpModel();

            if (!$model->createSmp($this->request->getPost())) {
                throw new \CodeIgniter\Exceptions\DatabaseException('Cannot save smp');
            }

            return redirect()->to(site_url());
        } else {
            echo \Config\Services::validation()->listErrors();
        }
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'authority_id'  => 'required|integer',
            'date_from'  => 'required|valid_date',
            'date_to'  => 'required|valid_date',
        ])) {
            $model = new SmpModel();

            if (!$model->updateSmp($id, $this->request->getPost())) {
                throw new \CodeIgniter\Exceptions\DatabaseException('Cannot update smp');
            }

            return redirect()->to(site_url());
        } else {
            echo \Config\Services::validation()->listErrors();
        }
    }

    public function delete($id)
    {        
        (new SmpModel())->deleteSmp($id);

        return redirect()->to(site_url());
    }
}