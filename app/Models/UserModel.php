<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullname', 'email', 'phone', 'address', 'password'];
    protected $useTimestamps = true;
}
