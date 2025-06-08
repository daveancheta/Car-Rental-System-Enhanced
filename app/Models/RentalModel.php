<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model
{
    protected $table = 'rented-cars'; // Your database table name
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'fullname',
        'car_name',
        'rented_days',
        'status',
    ];

    protected $useTimestamps = false; // Set true if your table has created_at, updated_at
}
