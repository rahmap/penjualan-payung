<?php namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{
  protected $table = 'admins';
  protected $returnType = 'array';
  protected $allowedFields = ['admin_id','nama_admin', 'email_admin', 'password_admin'];
  protected $primaryKey = 'admin_id';
}
