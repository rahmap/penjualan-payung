<?php namespace App\Models;

use CodeIgniter\Model;

class Auth_Model extends Model
{
  protected $table = 'users';
  protected $returnType = 'array';
  protected $allowedFields = ['user_id','user_name', 'user_email', 'user_password'];
  protected $primaryKey = 'user_id';
}
