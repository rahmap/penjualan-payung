<?php namespace App\Controllers;

use App\Models\Produk_Model;
use App\Models\Pemesanan_Model;
use App\Models\Product_Pemesanan_Model;

class Home extends BaseController
{

	protected $PRODUK_MODEL;
	protected $PEMESANAN_MODEL;
	protected $PRODUCT_ORDER;

	public function __construct()
	{
		$this->PRODUK_MODEL = new Produk_Model();
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		$this->PRODUCT_ORDER = new Product_Pemesanan_Model();
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
		// session()->destroy();
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
		$cart = new \App\Libraries\Cart();
		$produk = $this->PRODUK_MODEL
							->join('suppliers','suppliers.supplier_id=products.fk_supplier')
							->where('nama_produk', $this->request->getVar('slug_payung'))
							->first();
		if($this->request->getPost()){
			$qty = $this->request->getVar('jumlah');
			if($qty > $produk['stok']){
				session()->setFlashdata('message', sweetAlert('Upss!','Jumlah pembelian tidak bisa melebihi stok barang.', 'info'));
				return redirect()->to(base_url('detail/'.strtolower(str_replace(' ','-',$this->request->getVar('slug_payung')))));
			} else {
				$dataCart = [
					'id'        => $this->request->getVar('id_payung'),
					'name'      => $this->request->getVar('nama_payung'),
					'price'     => $this->request->getVar('harga_payung'),
					'qty'  			=> $qty
				];
				$cart->insert($dataCart);
				session()->setFlashdata('message', sweetAlert('Horay!','Berhasil menambahkan produk ke keranjang.', 'success'));
				return redirect()->to(base_url('detail/'.strtolower(str_replace(' ','-',$this->request->getVar('slug_payung')))));
			}
		} else {
			return redirect()->to(base_url('detail/'.strtolower(str_replace(' ','-',$this->request->getVar('slug_payung')))));
		}
	}

	public function pembayaran()
	{
		if(!session()->has('user_id')){
			session()->setFlashdata('message', sweetAlert('Info!','Silahkan Login Dahulu.', 'info'));
			return redirect()->route('login');
		}
		$cart = new \App\Libraries\Cart();
		if($cart->contents() == null){
			session()->setFlashdata('message', sweetAlert('Upss!','Keranjang Kosong, silahkan tambahkan produk dulu.', 'info'));
			return redirect()->route('home');
		}
	  $data = [
			'title' => 'Pembayaran',
			'cart' => $cart->contents(),
			'total' => $cart->total()
		];
		if($this->request->getPost()){
			helper('text');
			$dataBeli = [
				'waktu_pesanan' => time(),
				'bukti_pembayaran' => NULL,
				'alamat' => $this->request->getVar('alamat'),
				'harga_total' => $cart->total(),
				'ongkir' => $this->request->getVar('pengiriman'),
				'metode_pembayaran' => $this->request->getVar('bayar'),
				'no_hp' => $this->request->getVar('phone'),
				'informasi_pesanan' => 'Menunggu Pembayaran',
				'status_pemesanan' => 'pending',
				'order_unique_id' => 'TRX-'.random_string('alnum'),
				'fk_user' => session()->user_id,
				'fk_admin' => NULL
			];
			$this->PEMESANAN_MODEL->save($dataBeli);
			$insertID = $this->PEMESANAN_MODEL->getIDInsert();
			foreach($cart->contents() as $item) {
				$data = [
					'fk_product' => $item['id'],
					'fk_pemesanan' => $insertID,
					'jumlah_pesan_produk' => $item['qty'],
					'harga_produk_pemesanan' => $item['price'],
					'nama_produk_pemesanan' => $item['name']
				];
				$this->PRODUCT_ORDER->save($data);
			}
			session()->setFlashdata('message', sweetAlert('Horay!','Berhasil melakukan pemesanan produk.', 'success'));
			$cart->destroy();
			return redirect()->route('home');
		} else {
			return view('home/v_pembayaran', $data);
		}
	}

	public function hapus_item($rowid)
	{
		$cart = new \App\Libraries\Cart();
		$cart->remove($rowid);
		session()->setFlashdata('message', sweetAlert('Horay!','Berhasil menghapus item dari keranjang.', 'success'));
		return redirect()->route('payment');
	}
}
