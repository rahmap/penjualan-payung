<?php namespace App\Controllers;

class Home extends BaseController
{

	public function __construct()
	{

	}

	public function index()
	{
	  $data = [
	    'title' => 'Home'
    ];
		return view('home/v_home', $data);
	}

	public function detail($slug_payung)
	{
	  $data = [
	    'title' => 'Detail Produk'
    ];
		return view('home/v_product_page', $data);
	}

	public function pembayaran()
	{
	  $data = [
	    'title' => 'Pembayaran'
    ];
		return view('home/v_pembayaran', $data);
	}




}
