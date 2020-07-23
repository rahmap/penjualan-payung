<?php namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
  protected $table = 'users';
  protected $returnType = 'array';
  protected $allowedFields = ['user_id','user_name', 'user_email', 'user_password','user_kabupaten','user_alamat'];
  protected $primaryKey = 'user_id';
}
