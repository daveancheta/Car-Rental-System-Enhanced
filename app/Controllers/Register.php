<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register_form');
    }

    public function store()
    {
        helper(['form']);

        $rules = [
            'fullname' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email|is_unique[accounts.email]',
            'phone'    => 'required|min_length[3]|max_length[20]',
            'address'  => 'required|min_length[3]|max_length[100]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return view('register_form', [
                'validation' => $this->validator
            ]);
        }

        $model = new UserModel();
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'address'  => $this->request->getPost('address'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $model->save($data);

        return redirect()->to('/register')->with('success', 'Registration successful!');
    }
}
