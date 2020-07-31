<?php namespace App\Controllers;

use App\Models\Dashboard_Model;
use App\Models\User_Model;
use App\Models\Admin_Model;
use App\Models\Supplier_Model;
use App\Models\Produk_Model;
use App\Models\Pemesanan_Model;
use App\Models\Product_Pemesanan_Model;

class Admin extends BaseController
{

	protected $USER_MODEL;
	protected $ADMIN_MODEL;
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
      if(session()->role != 'ADMIN'):
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

		return view('dashboard/admin/welcome', $data);
	}

	public function pelanggan()
	{
		$this->USER_MODEL = new User_Model();
		$data = [
			'title' => 'Data Pelanggan',
			'users' => $this->USER_MODEL->findAll()
		];

		return view('dashboard/admin/pelanggan/data_pelanggan', $data);
	}

	public function hapus_pelanggan($id)
	{
		$this->USER_MODEL = new User_Model();
		$this->USER_MODEL->where('user_id', $id)->delete();
		session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil menghapus data pelanggan.', 'success'));
		return redirect()->to(base_url('admin/pelanggan'));
	}
	
	public function supplier()
	{
		$this->SUPPLIER_MODEL = new Supplier_Model();
		$data = [
			'title' => 'Data Supplier',
			'suppliers' => $this->SUPPLIER_MODEL->findAll()
		];
		if($this->request->getPost()){
			$data = [
				'nama_supplier' => $this->request->getVar('nama'),
				'stok' => $this->request->getVar('stok')
			];
			$this->SUPPLIER_MODEL->save($data);
			session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil menambahkan data supplier.', 'success'));
			return redirect()->to(base_url('admin/supplier'));
		} else {
			return view('dashboard/admin/supplier/data_supplier', $data);
		}
	}

	public function hapus_supplier($id)
	{
		$this->SUPPLIER_MODEL = new Supplier_Model();
		$this->SUPPLIER_MODEL->where('supplier_id', $id)->delete();
		session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil menghapus data supplier.', 'success'));
		return redirect()->to(base_url('admin/supplier'));
	}

	public function edit_supplier($id)
	{
		$this->SUPPLIER_MODEL = new Supplier_Model();
	
		$data = [
			'title' => 'Data Supplier',
			'supplier' => $this->SUPPLIER_MODEL->find($id)
		];
		if($this->request->getPost()){
			$data = [
				'nama_supplier' => $this->request->getVar('nama')
			];
			$this->SUPPLIER_MODEL->update($id, $data);
			session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil mengupdate data supplier.', 'success'));
			return redirect()->to(base_url('admin/supplier'));
		} else {
			return view('dashboard/admin/supplier/edit_supplier', $data);
		}
	}

	public function produk()
	{
		$this->PRODUK_MODEL = new Produk_Model();
		$this->SUPPLIER_MODEL = new Supplier_Model();
		$data = [
			'title' => 'Data Produk',
			'products' => $this->PRODUK_MODEL->join('suppliers','suppliers.supplier_id=products.fk_supplier','LEFT')->findAll(),
			'suppliers' => $this->SUPPLIER_MODEL->findAll(),
			'selected' => $this->PRODUK_MODEL->whereNotIn('fk_supplier', [0])->findAll()
		];

    return view('dashboard/admin/produk/data_produk', $data);
	}
	
	public function tambah_produk()
	{
		$this->PRODUK_MODEL = new Produk_Model();
		// $sup = $this->PRODUK_MODEL->where('fk_supplier', '!= NULL')->find();
		$gambar =  $this->request->getFile('gambar');
		try {
			helper('text');
			$file = $gambar->getRandomName();
			$image = \Config\Services::image()
							->withFile($gambar)
							->resize(1142, 856)
							->save('produk/'.$file);
		}
		catch (\Exception $e)
		{
			session()->setFlashdata('message', sweetAlert('Upss! Gambar gagal diupload!',$e->getMessage(), 'error'));
			return redirect()->to(\base_url('admin/produk'));
		}
		$fk_sup = '';
		if($produkFK = $this->PRODUK_MODEL->findAll(1,1)){
      $fk_sup = $produkFK[0]['fk_supplier'];
    } else {
      $fk_sup = NULL;
    }
		$data = [
			'nama_produk' => $this->request->getVar('nama'),
			'harga_produk' => $this->request->getVar('harga'),
			'gambar_produk' => $file,
			'keterangan_produk' => $this->request->getVar('keterangan'),
			'stok' => $this->request->getVar('stok'),
			'berat' => $this->request->getVar('berat'),
			'fk_supplier' => $fk_sup
		];
		if($this->PRODUK_MODEL->save($data)){
			session()->setFlashdata('message', sweetAlert('Horay!','Berhasil menambahkan data produk!', 'success'));
		} else {
			session()->setFlashdata('message', sweetAlert('Upss!','Gagal menambahkan data produk!', 'error'));
		}
		return redirect()->to(\base_url('admin/produk'));

	}

	public function update_supplier_produk()
	{
		$this->PRODUK_MODEL = new Produk_Model();
		$this->PRODUK_MODEL->set(['fk_supplier' => $this->request->getVar('supplier')])->update();
		session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil mengupdate supplier produk.', 'success'));
		return redirect()->to(base_url('admin/produk'));
	}

	public function hapus_produk($id)
	{
		$this->PRODUK_MODEL = new Produk_Model();
		$this->PRODUK_MODEL->where('product_id', $id)->delete();
		session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil menghapus data produk.', 'success'));
		return redirect()->to(base_url('admin/produk'));
	}

	public function edit_produk($id)
	{
		$this->PRODUK_MODEL = new Produk_Model();
		$data = [
			'title' => 'Update Produk',
			'produk' => $this->PRODUK_MODEL->find($id)
		];
		if($this->request->getPost()){
			$file = '';
			$old = $this->PRODUK_MODEL->find($id);
			if($this->request->getFile('gambar') == null OR $this->request->getFile('gambar') == ''){
				$file = $old['gambar_produk'];
			} else {
				$gambar =  $this->request->getFile('gambar');
				try {
					helper('text');
					$file = $gambar->getRandomName();
					$image = \Config\Services::image()
					->withFile($gambar)
					->resize(1142, 856)
					->save('produk/'.$file);

					unlink('produk/'.$old['gambar_produk']);
				}
				catch (\Exception $e)
				{
					session()->setFlashdata('message', sweetAlert('Upss! Gambar gagal diupload!',$e->getMessage(), 'error'));
					return redirect()->to(\base_url('admin/edit_produk/'.$id));
				}
			}
			$update = [
				'nama_produk' => $this->request->getVar('nama'),
				'harga_produk' => $this->request->getVar('harga'),
				'gambar_produk' => $file,
				'keterangan_produk' => $this->request->getVar('keterangan'),
				'stok' => $this->request->getVar('stok'),
				'berat' => $this->request->getVar('berat')
			];
			$this->PRODUK_MODEL->update($id, $update);
			session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil mengupdate data produk.', 'success'));
			return redirect()->to(base_url('admin/edit_produk/'.$id));
		} else {
			return view('dashboard/admin/produk/edit_produk', $data);
		}
	}

	public function hapus_item($rowid)
	{
		$cart = new \App\Libraries\Cart();
		$cart->remove($rowid);
		session()->setFlashdata('message', sweetAlert('Horay!','Berhasil menghapus item dari keranjang.', 'success'));
		return redirect()->to(base_url('admin/tambah_pesanan'));
	}

	public function tambah_pesanan()
	{
		$cart = new \App\Libraries\Cart();
		$data = [
			'title' => 'Tambah Pesanan',
			'cart' => $cart->contents(),
			'cart_total_bayar' => $cart->total()
		];
		if($this->request->getPost()){
			$this->PEMESANAN_MODEL = new Pemesanan_Model();
			$this->PRODUK_MODEL = new Produk_Model();
			$this->SUPPLIER_MODEL = new Supplier_Model();
			$this->PRODUCT_ORDER = new Product_Pemesanan_Model();
			$this->USER_MODEL = new User_Model();
			$dataUser = [
				'user_name' => $this->request->getVar('nama'),
				'user_email' => $this->request->getVar('email'),
				'user_kabupaten' => ucwords($this->request->getVar('kabupaten')),
				'user_alamat' => $this->request->getVar('alamat')
			];
			$this->USER_MODEL->save($dataUser);
			$fk_user = $this->USER_MODEL->getIDInsert();
			helper('text');
			$dataBeli = [
				'waktu_pesanan' => time(),
				'bukti_pembayaran' => NULL,
				'alamat' => ucwords('Kab. '.$this->request->getVar('kabupaten').' - '.$this->request->getVar('alamat')),
				'harga_total' => $cart->total(),
				'ongkir' => $this->request->getVar('ongkir'),
				'metode_pembayaran' => $this->request->getVar('bayar'),
				'no_hp' => $this->request->getVar('phone'),
				'informasi_pesanan' => 'Sedang Dikirim',
				'status_pemesanan' => 'success',
				'order_unique_id' => 'TRX-'.random_string('alnum'),
				'fk_user' => $fk_user,
				'fk_admin' => session()->user_id
			];
			$this->PEMESANAN_MODEL->save($dataBeli);
			$insertID = $this->PEMESANAN_MODEL->getIDInsert();

			$fk_produk = '';
			foreach($cart->contents() as $item) {
				$fk_produk = $item['id'];
				$data = [
					'fk_product' => $item['id'],
					'fk_pemesanan' => $insertID,
					'jumlah_pesan_produk' => $item['qty'],
					'harga_produk_pemesanan' => $item['price'],
					'nama_produk_pemesanan' => $item['name'],
					'stok_sisa' => $item['options']['stok_sisa'],
					'stok_awal' => $item['options']['stok_awal'],
					'nama_supplier_order' => $item['options']['nama_supplier_order'],
					'tanggal_selesai' => date('d/m/Y'),
					'kabupaten_pemesanan' => $this->request->getVar('kabupaten')
				];
				$this->PRODUCT_ORDER->save($data);
				$stok = $this->PRODUK_MODEL->where('product_id', $item['id'])->first();
				$this->PRODUK_MODEL->update($item['id'], ['stok' => $stok['stok'] - $item['qty']]);
			}

			session()->setFlashdata('message', sweetAlert('Horay!','Berhasil melakukan pemesanan produk.', 'success'));
			$cart->destroy();
			return redirect()->to(base_url('admin/tambah_pesanan'));
		} else {
			return view('dashboard/admin/pesanan/tambah_pesanan', $data);
		}
	}

	public function pesanan()
	{
		
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		$order = $this->PEMESANAN_MODEL->join('users','users.user_id=pemesanan.fk_user', 'LEFT')->findAll();
		// $order = $this->PEMESANAN_MODEL
		// 				->join('orders_products','orders_products.fk_pemesanan=pemesanan.order_id')->findAll();
		$data = [
			'title' => 'Data Pesanan',
			'pesanan' => $order
		];
		return view('dashboard/admin/pesanan/data_pesanan', $data);
	}

	public function hapus_pesanan($id)
	{
		
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		$order = $this->PEMESANAN_MODEL->where('order_unique_id', $id)->delete();
		// $order = $this->PEMESANAN_MODEL
		// 				->join('orders_products','orders_products.fk_pemesanan=pemesanan.order_id')->findAll();
		session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil menghapus data pesanan.', 'success'));
		return redirect()->to(base_url('admin/pesanan'));
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
			if($this->request->getVar('status') == NULL OR $this->request->getVar('status') == ''){
				$status = $orderID['status_pemesanan'];
			} else {
				$status = $this->request->getVar('status');
			}
			$data = [
				'status_pemesanan' => $status,
				'informasi_pesanan' => $this->request->getVar('informasi'),
				'fk_admin' => session()->user_id
			];
			if($this->request->getVar('status') == 'cancel'){
				$this->SUPPLIER_MODEL = new Supplier_Model();
				$this->PRODUK_MODEL = new Produk_Model();
				$getFKProduk = $this->PRODUCT_ORDER->where('fk_pemesanan', $orderID['order_id'])->find();
				foreach($getFKProduk as $key){
					$getProduk = $this->PRODUK_MODEL->find($key['fk_product']);
					$this->PRODUK_MODEL->update($key['fk_product'], ['stok' => $getProduk['stok'] + $key['jumlah_pesan_produk']]);
				}

			} else if($this->request->getVar('status') == 'success') {
				// dd($orderID['order_id']);
				$this->PRODUCT_ORDER->where('fk_pemesanan', $orderID['order_id'])->set(['tanggal_selesai' => date('d/m/Y')])->update();
			}
			$this->PEMESANAN_MODEL->where('order_unique_id', $id)->set($data)->update();
			session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil mengupdate data pesanan.', 'success'));
			return redirect()->to(base_url('admin/edit_pesanan/'.$id));
		} else {
			return view('dashboard/admin/pesanan/edit_pesanan', $data);
		}
	}

	public function update_profile()
	{
		$data = [
			'title' => 'Update Profil'
		];
		$this->ADMIN_MODEL = new Admin_Model();
		if($this->request->getPost()){
			$pass = $this->request->getVar('password');
			$pass1 = $this->request->getVar('password1');
			if($pass == $pass1){
				$this->ADMIN_MODEL->update(session()->user_id, ['password_admin' => password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10])]);
				session()->remove(['user_id','user_email', 'user_name', 'role', 'cart']); //session destroy
				session()->setFlashdata('message', sweetAlert('Horayy!','Password berhasil dirubah, silahkan login kembali.', 'success'));
				return redirect()->route('admin_login');
			} else {
				session()->setFlashdata('message', sweetAlert('Upss!','Password konfirmasi tidak sama', 'error'));
				return redirect()->to(\base_url('admin/update_profile'));
			}
		} else {
			return view('dashboard/admin/profile/edit_profile', $data);
		}
	}

	public function laporan_pendapatan()
	{
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		if(!is_null($this->request->getGet('mulai')) AND !is_null($this->request->getGet('selesai'))){
			$mulai = strtotime($this->request->getGet('mulai'));
			$selesai = strtotime($this->request->getGet('selesai'));
			$selesai = (int) $selesai + 24 * 3600;

			session()->set('mulai', $this->request->getGet('mulai'));
			session()->set('selesai', $this->request->getGet('selesai'));

			$laporan = $this->PEMESANAN_MODEL
			->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY, SUM(orders_products.harga_produk_pemesanan * orders_products.jumlah_pesan_produk) AS UANG, orders_products.tanggal_selesai'])
			->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id')
			->where(['status_pemesanan' => 'success'])
			->where('pemesanan.waktu_pesanan BETWEEN '.$mulai.' AND '.$selesai)
			->groupBy('orders_products.tanggal_selesai')->find();
			// dd([$mulai, $selesai, $laporan]);
		} else {
			$laporan = $this->PEMESANAN_MODEL
			->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY, SUM(orders_products.harga_produk_pemesanan * orders_products.jumlah_pesan_produk) AS UANG, orders_products.tanggal_selesai'])
			->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id')
			->where(['status_pemesanan' => 'success'])
			->groupBy('orders_products.tanggal_selesai')->find();
		}


		// dd($laporan);
		$data = [
			'title' => 'Laporan Pendapatan',
			'laporan' => $laporan,
		];
		return view('dashboard/admin/laporan/laporan_pendapatan', $data);
	}

	public function laporan_penjualan()
	{
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		if(!is_null($this->request->getGet('mulai')) AND !is_null($this->request->getGet('selesai'))){
			$mulai = strtotime($this->request->getGet('mulai'));
			$selesai = strtotime($this->request->getGet('selesai'));
			$selesai = (int) $selesai + 24 * 3600;

			session()->set('mulai', $this->request->getGet('mulai'));
			session()->set('selesai', $this->request->getGet('selesai'));

			$laporan = $this->PEMESANAN_MODEL
			->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY,
			orders_products.tanggal_selesai, kabupaten_pemesanan, nama_produk_pemesanan'])
			->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id')
			->where(['status_pemesanan' => 'success'])
			->where('pemesanan.waktu_pesanan BETWEEN '.$mulai.' AND '.$selesai)
			->groupBy('orders_products.tanggal_selesai, nama_produk_pemesanan, kabupaten_pemesanan')->find();

		} else {
			$laporan = $this->PEMESANAN_MODEL
			->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY,
			orders_products.tanggal_selesai, kabupaten_pemesanan, nama_produk_pemesanan'])
			->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id')
			->where(['status_pemesanan' => 'success'])
			->groupBy('orders_products.tanggal_selesai, nama_produk_pemesanan, kabupaten_pemesanan')->find();
		}


		// dd($laporan);
		$data = [
			'title' => 'Laporan Penjualan',
			'laporan' => $laporan,
		];
		return view('dashboard/admin/laporan/laporan_penjualan', $data);
	}

	public function laporan_stok()
	{
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		$this->PRODUCT_ORDER = new Product_Pemesanan_Model();
		$this->PRODUK_MODEL = new Produk_Model();

		if(!is_null($this->request->getGet('mulai')) AND !is_null($this->request->getGet('selesai'))){
			$mulai = strtotime($this->request->getGet('mulai'));
			$selesai = strtotime($this->request->getGet('selesai'));
			$selesai = (int) $selesai + 24 * 3600;

			session()->set('mulai', $this->request->getGet('mulai'));
			session()->set('selesai', $this->request->getGet('selesai'));

			$stok = $this->PRODUK_MODEL
			->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY,
			tanggal_selesai, GROUP_CONCAT(orders_products.stok_sisa) as SISA, GROUP_CONCAT(orders_products.stok_awal) as AWAL, 
			 orders_products.nama_supplier_order, orders_products.nama_produk_pemesanan'])
			->join('orders_products', 'orders_products.fk_product=products.product_id')
			->join('pemesanan', 'pemesanan.order_id=orders_products.fk_pemesanan')
			->join('suppliers', 'suppliers.supplier_id=products.fk_supplier')
			->where('pemesanan.waktu_pesanan BETWEEN '.$mulai.' AND '.$selesai)
			->where(['status_pemesanan' => 'success'])
			->groupBy('nama_produk_pemesanan, tanggal_selesai')->find();

		} else {
			$stok = $this->PRODUK_MODEL
			->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY,
			tanggal_selesai, GROUP_CONCAT(orders_products.stok_sisa) as SISA, GROUP_CONCAT(orders_products.stok_awal) as AWAL, 
			 orders_products.nama_supplier_order, orders_products.nama_produk_pemesanan'])
			->join('orders_products', 'orders_products.fk_product=products.product_id')
			->join('pemesanan', 'pemesanan.order_id=orders_products.fk_pemesanan')
			->join('suppliers', 'suppliers.supplier_id=products.fk_supplier')
			->where(['status_pemesanan' => 'success'])
			->groupBy('nama_produk_pemesanan, tanggal_selesai')->find();
		}
		// dd($stok);
		$data = [
			'title' => 'Laporan Stok',
			'stok' => $stok
		];
		return view('dashboard/admin/laporan/laporan_stok', $data);
	}

}
