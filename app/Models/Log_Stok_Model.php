<?php namespace App\Models;

use CodeIgniter\Model;

class Log_Stok_Model extends Model
{
  protected $table = 'log_stok';
  protected $returnType = 'array';
  protected $allowedFields = ['nama_barang','stok_barang', 'tanggal_log', 'log_stok_id'];
  protected $primaryKey = 'log_stok_id';

}
