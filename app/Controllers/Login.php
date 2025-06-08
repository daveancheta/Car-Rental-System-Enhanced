<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login_form');
    }

    public function auth()
    {
        helper(['form']);
    
        $session = session();
        $model = new UserModel();
    
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Validate input
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Email and password are required.');
        }
    
        // Check if email exists
        $user = $model->where('email', $email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'Email not found.');
        }
    
        // Check password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Wrong password.');
        }
    
        // Set session
        $sessionData = [
            'id'       => $user['id'],
            'fullname' => $user['fullname'],
            'email'    => $user['email'],
            'logged_in' => true
        ];
        $session->set($sessionData);
    
        return redirect()->to('/home');
    }    
}
