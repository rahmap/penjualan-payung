<?php namespace App\Controllers;

use App\Models\Produk_Model;
use App\Models\Log_Stok_Model;

class CronJob extends BaseController
{
  public function cron983274276039753(){
    $PRODUK = new Produk_Model();
    $LOG_STOK = new Log_Stok_Model();

    $dataProduk = $PRODUK->findAll();

    //dd($dataProduk);
    if(!$LOG_STOK->where('tanggal_log', date('Y/m/d'))->find()){
      foreach($dataProduk as $pro){
        $dataSave = [
          'nama_barang' => $pro['nama_produk'],
          'stok_barang' => $pro['stok'],
          'tanggal_log' => date('Y/m/d')
        ];

        $LOG_STOK->save($dataSave);
      }
    }
  }
}