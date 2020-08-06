<?php namespace App\Models;

use CodeIgniter\Model;

class Products_Barang_Masuk_Model extends Model
{
  protected $table = 'products_barang_masuk';
  protected $returnType = 'array';
  protected $allowedFields = ['product_id','fk_products', 'fk_barang_masuk'];
  protected $primaryKey = 'products_barang_masuk_id';

}
