<?php

namespace App\Controllers;

class User extends BaseController
{
    public function info()
    {
        $session = session();
        $fullname = $session->get('fullname');

        if (!$fullname) {
            return redirect()->to('/login'); // or display error
        }

        $db = \Config\Database::connect();
        $builder = $db->table('rented_cars');
        $builder->select('car_name, rented_days, fullname');
        $builder->where('fullname', $fullname);
        $builder->limit(1);
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            $user_data = $query->getRowArray();

            // Assign each field to a variable, with default empty string if it's null
            $car_name = htmlspecialchars($user_data['car_name'] ?? '', ENT_QUOTES, 'UTF-8');
            $rented_days = htmlspecialchars($user_data['rented_days'] ?? '', ENT_QUOTES, 'UTF-8');

            return view('user-profile', compact('car_name', 'rented_days'));
        } else {
            return "Car not found.";
        }
    }
}
