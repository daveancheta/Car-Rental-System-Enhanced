<?php

namespace App\Controllers;

class User extends BaseController
{
    public function info()
    {
        $session = session();
        $email = $session->get('email');
        $fullname = $session->get('fullname');

        if (!$email || !$fullname) {
            return redirect()->to('/login'); // or display error
        }

        // Fetching account information
        $db = \Config\Database::connect();
        
        // Fetch account data from 'accounts' table
        $builder = $db->table('accounts');
        $builder->select('fullname, email, address, phone');
        $builder->where('email', $email);
        $builder->limit(1);
        $query = $builder->get();
        
        if ($query->getNumRows() > 0) {
            $user_data = $query->getRowArray();

            // Assign each field to a variable, with default empty string if it's null
            $fullname = htmlspecialchars($user_data['fullname'] ?? '', ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($user_data['email'] ?? '', ENT_QUOTES, 'UTF-8');
            $address = htmlspecialchars($user_data['address'] ?? '', ENT_QUOTES, 'UTF-8');
            $phone = htmlspecialchars($user_data['phone'] ?? '', ENT_QUOTES, 'UTF-8');

            // Fetch rented car data
            $builder = $db->table('rented-cars');
            $builder->select('car_name, rented_days, date');
            $builder->where('fullname', $fullname);
            $query = $builder->get();

            $car_name = [];

            // Fetch rented car data as associative array
            $rented_cars = [];
            if ($query->getNumRows() > 0) {
                $car_name = $query->getResultArray(); // Fetch all rented car records
            }

            // Return the view with all the necessary data
            return view('user-profile', compact('fullname', 'email', 'address', 'phone', 'car_name'));
        } else {
            return "Account not found.";
        }
    }
}
