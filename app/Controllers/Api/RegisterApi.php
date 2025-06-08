<?php

namespace App\Controllers\Api;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class RegisterApi extends ResourceController
{
    public function create()
    {
        $rules = [
            'fullname' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email|is_unique[accounts.email]',
            'phone'    => 'required|min_length[3]|max_length[20]',
            'address'  => 'required|min_length[3]|max_length[100]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $model = new UserModel();
        $data = [
            'fullname' => $this->request->getJSON()->fullname ?? '',
            'email'    => $this->request->getJSON()->email ?? '',
            'phone'    => $this->request->getJSON()->phone ?? '',
            'address'  => $this->request->getJSON()->address ?? '',
            'password' => password_hash($this->request->getJSON()->password ?? '', PASSWORD_DEFAULT),
        ];

        if (!$model->save($data)) {
            return $this->failServerError('Failed to save user.');
        }

        return $this->respondCreated([
            'status' => 201,
            'message' => 'Registration successful',
            'data' => $data
        ]);
    }
}
