<?php

namespace App\Controllers;

use App\Models\UserModels;
use CodeIgniter\Controller;

class UserController extends BaseController
{
    public function rent()
    {
        try {
            // Instantiate the model
            $userModel = new UserModels();
            
            // Get all users
            $data['cars'] = $userModel->findAll();
            
            // Load the view and pass the data
            return view('rent-cars', $data);
        } catch (\Exception $e) {
            // Log or display the error for debugging
            die($e->getMessage());
        }
    }
    
}