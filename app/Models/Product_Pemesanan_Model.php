<?php namespace App\Models;

use CodeIgniter\Model;

class Product_Pemesanan_Model extends Model
{
  protected $table = 'orders_products';
  protected $returnType = 'array';
  protected $allowedFields = ['fk_pemesanan','fk_product', 'harga_produk_pemesanan', 
  'jumlah_pesan_produk', 'nama_produk_pemesanan', 'stok_sisa', 'stok_awal','nama_supplier_order'];
  protected $primaryKey = 'orders_products_id';

  protected $db;


  public function getInstance()
  {
    $this->db = \Config\Database::connect();
  }

  public function getIDInsert()
  {
    $this->db = \Config\Database::connect();
    return $this->db->insertID();
  }
}
