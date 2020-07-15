<?php namespace App\Controllers;

use App\Models\Produk_Model;

class Home extends BaseController
{

	protected $PRODUK_MODEL;

	public function __construct()
	{
		$this->PRODUK_MODEL = new Produk_Model();
	}

	public function index()
	{
	  $data = [
			'title' => 'Home',
			'products' => $this->PRODUK_MODEL->findAll(),
			'pager' => $this->PRODUK_MODEL
		];
		// dd($data['pager']);
		return view('home/v_home', $data);
	}

	public function detail($slug_payung)
	{
		$produk = $this->PRODUK_MODEL
										->join('suppliers','suppliers.supplier_id=products.fk_supplier')
										->where('nama_produk', ucwords(\str_replace('-',' ', $slug_payung)))
										->first();
	  $data = [
			'title' => 'Detail Produk',
			'produk' => $produk
		];
		return view('home/v_product_page', $data);
	}

	public function tambah_keranjang()
	{
		$produk = $this->PRODUK_MODEL
							->join('suppliers','suppliers.supplier_id=products.fk_supplier')
							->where('nama_produk', $this->request->getVar('slug_payung'))
							->first();
		if($this->request->getPost()){
			$qty = $this->request->getVar('jumlah');
			if($qty > $produk['stok']){
				session()->setFlashdata('message', sweetAlert('Upss!','Jumlah pembelian tidak bisa melebihi stok barang.', 'info'));
				return redirect()->to(base_url('detail/'.$slug_payung));
			} else {
				
			}
		} else {
			return redirect()->to(base_url('detail/'.$this->request->getVar('slug_payung')));
		}
	}

	public function pembayaran()
	{
	  $data = [
	    'title' => 'Pembayaran'
    ];
		return view('home/v_pembayaran', $data);
	}




}
