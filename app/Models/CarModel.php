<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $allowedFields = ['car_name', 'description', 'image_path', 'car_price', 'status'];
    protected $useTimestamps = true;
}
