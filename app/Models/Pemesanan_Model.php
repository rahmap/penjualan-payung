<?php namespace App\Models;

use CodeIgniter\Model;

class Pemesanan_Model extends Model
{
  protected $table = 'pemesanan';
  protected $returnType = 'array';
  protected $allowedFields = ['waktu_pesanan','bukti_pembayaran', 'alamat', 'harga_total', 'ongkir', 'metode_pembayaran', 'no_hp', 'informasi_pesanan', 'status_pemesanan', 'order_unique_id', 'fk_user', 'fk_admin'];
  protected $primaryKey = 'order_id';

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
