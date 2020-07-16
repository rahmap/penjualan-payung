<?php namespace App\Controllers;

use App\Models\Dashboard_Model;
use App\Models\User_Model;
use App\Models\Supplier_Model;
use App\Models\Produk_Model;
use App\Models\Pemesanan_Model;
use App\Models\Product_Pemesanan_Model;

class Dashboard extends BaseController
{

	protected $USER_MODEL;
	protected $SUPPLIER_MODEL;
	protected $PRODUK_MODEL;
	protected $PEMESANAN_MODEL;
	protected $PRODUCT_ORDER;

	public function __construct()
	{
		if (!session()->has('user_id')) {
			header('location:/home');
			exit();
    } else {
      if(session()->role != 'MEMBER'):
				header('location:/home');
				exit();
      endif;
    }
	}
	
	public function index()
	{
		$data = [
			'title' => 'Welcome'
		];

		return view('dashboard/member/welcome', $data);
	}

	public function pesanan()
	{
		
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		$order = $this->PEMESANAN_MODEL->where('fk_user', session()->user_id)->find();
		// $order = $this->PEMESANAN_MODEL
		// 				->join('orders_products','orders_products.fk_pemesanan=pemesanan.order_id')->findAll();
		$data = [
			'title' => 'Data Pesanan',
			'pesanan' => $order
		];
		return view('dashboard/member/pesanan/data_pesanan', $data);
	}

	public function hapus_pesanan($id)
	{
		
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		$order = $this->PEMESANAN_MODEL->where('order_unique_id', $id)->delete();
		// $order = $this->PEMESANAN_MODEL
		// 				->join('orders_products','orders_products.fk_pemesanan=pemesanan.order_id')->findAll();
		session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil menghapus data pesanan.', 'success'));
		return redirect()->to(base_url('dashboard/pesanan'));
	}

	public function edit_pesanan($id)
	{
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		$orderID = $this->PEMESANAN_MODEL
		->join('admins','admins.admin_id=pemesanan.fk_admin', 'LEFT')
		->join('users','users.user_id=pemesanan.fk_user', 'LEFT')
		->where('pemesanan.order_unique_id', $id)->first();
		// dd($orderID);
		$this->PRODUCT_ORDER = new Product_Pemesanan_Model();
		$order = $this->PRODUCT_ORDER
				->where('fk_pemesanan', $orderID['order_id'])->find();
		$data = [
			'title' => 'Edit Pesanan',
			'produk' => $orderID,
			'pesanan' => $order
		];
		// dd($data);
		if($this->request->getPost()){
			$gambar =  $this->request->getFile('gambar');
			$data = [];
			try {
				unlink('bukti_pembayaran/'.$orderID['bukti_pembayaran']);
				helper('text');
				$file = $gambar->getRandomName();
				$image = \Config\Services::image()
								->withFile($gambar)
								->resize(1142, 856)
								->save('bukti_pembayaran/'.$file);
				$data = [
					'bukti_pembayaran' => $file
				];
			}
			catch (\Exception $e)
			{
				session()->setFlashdata('message', sweetAlert('Upss! Bukti Pembayaran gagal diupload!',$e->getMessage(), 'error'));
				return redirect()->to(\base_url('dashboard/edit_pesanan/'.$id));
			}
			$this->PEMESANAN_MODEL->where('order_unique_id', $id)->set($data)->update();
			session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil mengupdate data pesanan.', 'success'));
			return redirect()->to(base_url('dashboard/edit_pesanan/'.$id));
		} else {
			return view('dashboard/member/pesanan/edit_pesanan', $data);
		}
	}

}
