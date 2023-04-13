<?php

namespace App\Controllers;

use App\Models\WebModel;

class Auth extends BaseController
{
    protected $webModel;

    public function __construct()
    {
        $this->webModel = new WebModel();
    }
    
    public function register()
    {
        if (session('log') == true) {
            return redirect()->to('/daftar-website');
        }

        $data = [
            'title' => 'Register'
        ];

        return view('auth/register', $data);
    }
    
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('auth/login', $data);
    }
    
    public function cek_login()
    {
        if($this->validate([
            'user_email' => [
            'label'  => 'Email',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} harus diisi dan tidak boleh kosong !!',
            ],
        ],
        'user_password' => [
            'label'  => 'Password',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} harus diisi dan tidak boleh kosong !!',
            ],
        ],
        ])) {
            $user_email = $this->request->getPost('user_email');
            $user_password = $this->request->getPost('user_password');
            $cek = $this->webModel->login($user_email, $user_password);
            if($cek) {
                session()->set('log', true);
                session()->set('user_name', $cek['user_name']);
                session()->set('user_email', $cek['user_email']);
                session()->set('permission', $cek['permission']);
                return redirect()->to('/daftar-website');
            } else {
                session()->setFlashdata('pesan', 'Email atau Password tidak cocok !!');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/login')->withInput();
        }
    }
    
    public function save_register()
    {
        if($this->validate([
        'user_name' => [
            'label'  => 'Username',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} harus diisi dan tidak boleh kosong !!',
            ],
        ],
        'user_email' => [
            'label'  => 'Email',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} harus diisi dan tidak boleh kosong !!',
            ],
        ],
        'user_password' => [
            'label'  => 'Password',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} harus diisi dan tidak boleh kosong !!',
            ],
        ],
        'retype_password' => [
            'label'  => 'Ulangi Password',
            'rules'  => 'required|matches[user_password]',
            'errors' => [
                'required' => '{field} harus diisi dan tidak boleh kosong !!',
                'matches' => 'Password tidak sama !!'
            ],
        ],
        ])) {
            $data = [
                'user_name' => $this->request->getPost('user_name'),
                'user_email' => $this->request->getPost('user_email'),
                'user_password' => $this->request->getPost('user_password'),
                'permission' => 1,
            ];
            $this->webModel->save_register($data);
            session()->setFlashdata('pesan', 'Register berhasil !!');
            return redirect()->to('/register');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/register')->withInput();
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('user_name');
        session()->remove('user_email');
        session()->remove('permission');
        return redirect()->to('/login');
    }

}
