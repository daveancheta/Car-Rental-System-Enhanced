<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class LoginAPI extends ResourceController
{
   public function login()
{
    $json = $this->request->getJSON(true); // true = return as associative array

    $email = $json['email'] ?? null;
    $password = $json['password'] ?? null;

    if (!$email || !$password) {
        return $this->failValidationErrors('Email and password are required.');
    }

    $model = new UserModel();
    $user = $model->where('email', $email)->first();

    if (!$user) {
        return $this->failNotFound('Email not found.');
    }

    if (!password_verify($password, $user['password'])) {
        return $this->failUnauthorized('Invalid password.');
    }

    // Successful login
    $data = [
        'id'       => $user['id'],
        'fullname' => $user['fullname'],
        'email'    => $user['email'],
        'message'  => 'Login successful'
    ];

    return $this->respond($data, 200);
}
}