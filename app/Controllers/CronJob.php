<?php namespace App\Controllers;

class CronJob extends BaseController
{
  public function cron983274276039753(){

    $PRODUK = new  \App\Models\Produk_Model();
    $LOG_STOK = new  \App\Models\Log_Stok_Model();

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