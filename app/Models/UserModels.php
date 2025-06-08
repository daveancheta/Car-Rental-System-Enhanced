<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
}
