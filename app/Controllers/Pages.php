<?php

namespace App\Controllers;

use App\Models\WebModel;

class Pages extends BaseController
{
    protected $webModel;

    public function __construct()
    {
        $this->webModel = new WebModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('pages/home', $data);
    }

    public function websites()
    {
        if (session('log') == false) {
            return redirect()->to('/login');
        }

        $currentPage = $this->request->getVar('page_website') ? $this->request->getVar('page_website') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $web = $this->webModel->search($keyword);
        } else {
            $web = $this->webModel;
        }

        $data = [
            'title' => 'Websites',
            'website' => $web->paginate(6, 'website'),
            'pager' => $web->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
        ];

        return view('pages/websites', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Websites',
        ];

        return view('pages/create', $data);
    }

    public function save()
    {
        $url = $this->request->getVar('url_website');
        $parse = parse_url($url);

        $this->webModel->save([
            'nama_website' => $parse['host'],
            'url_website' => $this->request->getVar('url_website'),
            'status_website' => $this->request->getVar('status_website'),
        ]);

        return redirect()->to('/daftar-website');
    }
    
    public function delete($id)
    {
        $this->webModel->delete($id);
        return redirect()->to('/daftar-website');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Websites',
            'website' => $this->webModel->getWebsite($id)
        ]; 
    
        return view('pages/edit', $data);
    }

    public function update($id)
    {
        $this->webModel->save([
            'id' => $id,
            'nama_website' => $this->request->getVar('nama_website'),
            'url_website' => $this->request->getVar('url_website'),
            'status_website' => $this->request->getVar('status_website'),
        ]);
    
        return redirect()->to('/daftar-website');
    }
}
