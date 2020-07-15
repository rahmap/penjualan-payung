<?php namespace App\Models;

use CodeIgniter\Model;

class Produk_Model extends Model
{
  protected $table = 'products';
  protected $returnType = 'array';
  protected $allowedFields = ['product_id','fk_supplier', 'harga_produk', 'nama_produk', 'gambar_produk', 'keterangan_produk'];
  protected $primaryKey = 'product_id';
}
