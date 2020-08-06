<?php namespace App\Models;

use CodeIgniter\Model;

class Barang_Masuk_Model extends Model
{
  protected $table = 'barang_masuk';
  protected $returnType = 'array';
  protected $allowedFields = ['tanggal_barang_masuk', 'stok_barang_masuk', 'id_barang_masuk', 'fk_product'];
  protected $primaryKey = 'id_barang_masuk';

  protected $db;

  public function getInstance()
  {
    $this->db = \Config\Database::connect();
  }

  public function getIDInsert()
  {
    $this->getInstance();
    return $this->db->insertID();
  }

}
