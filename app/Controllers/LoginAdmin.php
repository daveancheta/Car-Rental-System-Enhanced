<?php

namespace App\Controllers;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class LoginAdmin extends Controller
{
    public function admin()
    {
        return view('login_form_admin');
    }

    public function auth()
    {
        helper(['form']);
    
        $session = session();
        $model = new AdminModel();
    
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        // Validate input
        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Username and password are required.');
        }
    
        // Check if username exists
        $user = $model->where('username', $username)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'Username not found.');
        }
    
        // Check password
       // Check password directly (NO hashing)
if ($password !== $user['password']) {
    return redirect()->back()->with('error', 'Wrong password.');
}

    
        // Set session
        $sessionData = [
            'id'        => $user['id'],
            'username'  => $user['username'],
            'logged_in' => true
        ];
        $session->set($sessionData);
    
        return redirect()->to('/car');
    }
}