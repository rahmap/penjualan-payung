<?php

/**
 * RajaOngkir Library for CodeIgniter
 * Digunakan untuk mengkonsumsi API RajaOngkir dengan mudah
 *
 * @author Andi Siswanto <andisis92@gmail.com>
 */
namespace App\Libraries;

use Endpoints;

require_once 'RajaOngkir/endpoints.php';

class RajaOngkir extends Endpoints {

  private $api_key;
  private $_ci4;
  private $account_type;

  public function __construct() {
    // Pastikan bahwa PHP mendukung cURL
    if (!function_exists('curl_init')) {
      log_message('error', 'cURL Class - PHP was not built with cURL enabled. Rebuild PHP with --with-curl to use cURL.');
    }
    $this->_ci4 = new \Config\RajaOngkir();
    if ($this->_ci4->API_KEY  == '') {
      log_message("error", "Harap masukkan API KEY Anda di config.");
    } else {
      $this->api_key = $this->_ci4->API_KEY;
      $this->account_type = $this->_ci4->TYPE_ACCOUNT;
    }
    parent::__construct($this->api_key, $this->account_type);
  }
}