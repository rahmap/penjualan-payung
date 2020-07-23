<?php namespace App\Models;

use CodeIgniter\Model;

class Supplier_Model extends Model
{
  protected $table = 'suppliers';
  protected $returnType = 'array';
  protected $allowedFields = ['supplier_id','nama_supplier'];
  protected $primaryKey = 'supplier_id';
}
