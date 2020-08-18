<?php namespace App\Controllers;

use App\Models\Dashboard_Model;
use App\Models\User_Model;
use App\Models\Admin_Model;
use App\Models\Supplier_Model;
use App\Models\Produk_Model;
use App\Models\Pemesanan_Model;
use App\Models\Product_Pemesanan_Model;
use App\Models\Barang_Masuk_Model;
use App\Models\Log_Stok_Model;

class Admin extends BaseController
{

	protected $USER_MODEL;
	protected $ADMIN_MODEL;
	protected $SUPPLIER_MODEL;
	protected $PRODUK_MODEL;
	protected $PEMESANAN_MODEL;
	protected $PRODUCT_ORDER;
	protected $BARANG_MASUK_MODEL;

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
	  $this->PEMESANAN_MODEL = new Pemesanan_Model();
	  $this->PRODUK_MODEL = new Produk_Model();

	  $barang_terjual = $this->PEMESANAN_MODEL
                  ->select('SUM(orders_products.jumlah_pesan_produk) AS BARANG_TERJUAL')
                  ->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id')
                  ->where('pemesanan.status_pemesanan', 'success')
                  ->first(); //data barang terjual

	  $pesanan = $this->PEMESANAN_MODEL
                  ->select('COUNT(pemesanan.order_id) AS PESANAN')
                  ->where('pemesanan.status_pemesanan', 'success')
                  ->first(); //data pemesanan

	  $pendapatan = $this->PEMESANAN_MODEL
      ->select(['SUM(orders_products.harga_produk_pemesanan * orders_products.jumlah_pesan_produk) AS UANG'])
      ->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id')
      ->where(['status_pemesanan' => 'success'])
      ->first(); //data pendapatan

	  $barang = $this->PRODUK_MODEL->select('COUNT(product_id) AS BARANG')->first(); //data jumlah barang

		$data = [
			'title' => 'Welcome',
      'pendapatan' => $pendapatan,
      'pesanan' => $pesanan,
      'barang_terjual' => $barang_terjual,
      'barang' => $barang
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
		session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil menghapus data pelanggan.', 'success'));
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
				'nama_supplier' => $this->request->getVar('nama')
			];
			$this->SUPPLIER_MODEL->save($data);
			session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil menambahkan data supplier.', 'success'));
			return redirect()->to(base_url('admin/supplier'));
		} else {
			return view('dashboard/admin/supplier/data_supplier', $data);
		}
	}

	public function hapus_supplier($id)
	{
		$this->SUPPLIER_MODEL = new Supplier_Model();
		$this->SUPPLIER_MODEL->where('supplier_id', $id)->delete();
		session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil menghapus data supplier.', 'success'));
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
			session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil mengupdate data supplier.', 'success'));
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
			'suppliers' => $this->SUPPLIER_MODEL->findAll()
		];

    return view('dashboard/admin/produk/data_produk', $data);
	}
	
	public function tambah_produk()
	{
		$this->PRODUK_MODEL = new Produk_Model();

		$gambar =  $this->request->getFile('gambar'); //upload foto produk

		try { //prosses upload foto produk
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

		$data = [
			'nama_produk' => $this->request->getVar('nama'),
			'harga_produk' => $this->request->getVar('harga'),
			'gambar_produk' => $file,
			'keterangan_produk' => $this->request->getVar('keterangan'),
			'stok' => 0,
			'berat' => $this->request->getVar('berat'),
			'fk_supplier' => $this->request->getVar('supplier')
		];
		if($this->PRODUK_MODEL->save($data)){ //menyimpan data ke tabel products
      $this->update_log_stok();
			session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil menambahkan data produk!', 'success'));
		} else {
			session()->setFlashdata('message', sweetAlert('Upss!','Gagal menambahkan data produk!', 'error'));
		}
		return redirect()->to(\base_url('admin/produk'));
	}

	public function update_supplier_produk()
	{
		$this->PRODUK_MODEL = new Produk_Model();
		$this->PRODUK_MODEL->set(['fk_supplier' => $this->request->getVar('supplier')])->update();
		session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil mengupdate supplier produk.', 'success'));
		return redirect()->to(base_url('admin/produk'));
	}

	public function hapus_produk($id)
	{
		$this->PRODUK_MODEL = new Produk_Model();
		$this->PRODUK_MODEL->where('product_id', $id)->delete();
    $this->update_log_stok();
		session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil menghapus data produk.', 'success'));
		return redirect()->to(base_url('admin/produk'));
	}

	public function tambah_stok()
  {
    $this->PRODUK_MODEL = new Produk_Model();
    $data = [
      'title' => 'Tambah Stok',
      'produks' => $this->PRODUK_MODEL->findAll()
    ];
    if($this->request->getPost()){
      $this->BARANG_MASUK_MODEL = new Barang_Masuk_Model();

      $jumlahStokAdd = $this->request->getPost('jumlah');
      $id_produk = $this->request->getPost('produk');

      $request = [
        'stok_barang_masuk' => $jumlahStokAdd,
        'tanggal_barang_masuk' => date('Y/m/d'),
        'fk_product' => (int) $id_produk
      ];

      $this->BARANG_MASUK_MODEL->save($request); //insert data ke tabel barang_masuk

      $dataProduk = $this->PRODUK_MODEL->where('product_id', $id_produk)->first();
      $this->PRODUK_MODEL->where('product_id', $id_produk)
        ->set(['stok' => $dataProduk['stok'] + $jumlahStokAdd])
        ->update();

      $this->update_log_stok(); //trigger update data ke tabel log_stok
      session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil menambah stok '.$dataProduk['nama_produk'], 'success'));
      return redirect()->to(base_url('admin/tambah_stok'));
    } else {
      return view('dashboard/admin/produk/tambah_stok', $data);
    }
  }

  public function barang_masuk()
  {
    $this->PRODUK_MODEL = new Produk_Model();

    $barang_masuk = $this->PRODUK_MODEL
      ->select('stok_barang_masuk AS MASUK, products.nama_produk, 
                    barang_masuk.tanggal_barang_masuk')
      ->join('barang_masuk', 'barang_masuk.fk_product=products.product_id')
      ->findAll();

    $data = [
      'title' => 'Data Barang Masuk',
      'produks' => $barang_masuk
    ];

    return view('dashboard/admin/produk/list_barang_masuk', $data);
  }

	public function edit_produk($id)
	{
    $this->SUPPLIER_MODEL = new Supplier_Model();
		$this->PRODUK_MODEL = new Produk_Model();
		$data = [
			'title' => 'Update Produk',
      'suppliers' => $this->SUPPLIER_MODEL->findAll(),
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
				'berat' => $this->request->getVar('berat'),
				'fk_supplier' => $this->request->getVar('supplier')
			];
			//Remove Stok

			$this->PRODUK_MODEL->update($id, $update);
			session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil mengupdate data produk.', 'success'));
      $this->update_log_stok();
			return redirect()->to(base_url('admin/edit_produk/'.$id));
		} else {
			return view('dashboard/admin/produk/edit_produk', $data);
		}
	}

	public function hapus_item($rowid)
	{
		$cart = new \App\Libraries\Cart();
		$cart->remove($rowid);
		session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil menghapus item dari keranjang.', 'success'));
		return redirect()->to(base_url('admin/tambah_pesanan'));
	}

	public function tambah_pesanan()
	{
		$cart = new \App\Libraries\Cart();
		$RO = new \App\Libraries\RajaOngkir();
    $berat = '';
    foreach($cart->contents() as $item) {
      $berat = (int)  $berat + (int)  $item['options']['berat'] * (int)  $item['qty'];
    }
		$data = [
			'title' => 'Tambah Pesanan',
			'cart' => $cart->contents(),
      'berat' => $berat,
			'cart_total_bayar' => $cart->total(),
      'provinsi' => json_decode($RO->province())
		];
		if($this->request->getPost()){
			$this->PEMESANAN_MODEL = new Pemesanan_Model();
			$this->PRODUK_MODEL = new Produk_Model();
			$this->SUPPLIER_MODEL = new Supplier_Model();
			$this->PRODUCT_ORDER = new Product_Pemesanan_Model();
			$this->USER_MODEL = new User_Model();
			$dataUser = [
				'user_name' => $this->request->getVar('nama'),
//				'user_email' => $this->request->getVar('email'),
        'user_email' => NULL,
				'user_kabupaten' => ucwords($this->request->getVar('kabupaten')),
				'user_provinsi' => ucwords($this->request->getVar('provinsi')),
				'user_kecamatan' => ucwords($this->request->getVar('kecamatan')),
				'user_nomer_hp' => ucwords($this->request->getVar('phone')),
				'user_alamat' => $this->request->getVar('alamat')
			];
			$this->USER_MODEL->save($dataUser);
			$fk_user = $this->USER_MODEL->getIDInsert();
			helper('text');
      $alamat = $this->request->getVar('alamat');
      $provinsi = $this->request->getVar('provinsi');
      $kabupaten = $this->request->getVar('kabupaten');
      $kecamatan= $this->request->getVar('kecamatan');
			$dataBeli = [
				'waktu_pesanan' => time(),
				'bukti_pembayaran' => NULL,
        'alamat' => $provinsi.', '.$kabupaten.', '.$kecamatan.', '.$alamat,
				'harga_total' => $cart->total(),
				'ongkir' => (int)$this->request->getVar('ongkir'),
				'metode_pembayaran' => $this->request->getVar('bayar'),
				'no_hp' => $this->request->getVar('phone'),
        'estimasi' => $this->request->getVar('estimasi'),
        'service' => $this->request->getVar('service'),
        'kurir' => strtoupper($this->request->getVar('kurir')),
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
      $this->update_log_stok();
			session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil melakukan pemesanan produk.', 'success'));
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
		session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil menghapus data pesanan.', 'success'));
		return redirect()->to(base_url('admin/pesanan'));
	}

	public function edit_pesanan($id)
	{
		$this->PEMESANAN_MODEL = new Pemesanan_Model();
		$orderID = $this->PEMESANAN_MODEL
		->join('admins','admins.admin_id=pemesanan.fk_admin', 'LEFT')
		->join('users','users.user_id=pemesanan.fk_user', 'LEFT')
		->where('pemesanan.order_unique_id', $id)->first();
		$this->PRODUCT_ORDER = new Product_Pemesanan_Model();
		$order = $this->PRODUCT_ORDER
				->where('fk_pemesanan', $orderID['order_id'])->find();
		$data = [
			'title' => 'Edit Pesanan',
			'produk' => $orderID,
			'pesanan' => $order
		];

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
        $this->update_log_stok(); //trigger update data log_stok

				$this->SUPPLIER_MODEL = new Supplier_Model();
				$this->PRODUK_MODEL = new Produk_Model();
				$getFKProduk = $this->PRODUCT_ORDER->where('fk_pemesanan', $orderID['order_id'])->find();
				foreach($getFKProduk as $key){
					$getProduk = $this->PRODUK_MODEL->find($key['fk_product']);
					$this->PRODUK_MODEL->update($key['fk_product'], ['stok' => $getProduk['stok'] + $key['jumlah_pesan_produk']]);
				}

			} else if($this->request->getVar('status') == 'success') {
        $this->update_log_stok(); //trigger update data log_stok
				$this->PRODUCT_ORDER->where('fk_pemesanan', $orderID['order_id'])->set(['tanggal_selesai' => date('d/m/Y')])->update();
			}
			$this->PEMESANAN_MODEL->where('order_unique_id', $id)->set($data)->update();
			session()->setFlashdata('message', sweetAlert('Berhasil!','Berhasil mengupdate data pesanan.', 'success'));
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
				session()->setFlashdata('message', sweetAlert('Berhasil!','Password berhasil dirubah, silahkan login kembali.', 'success'));
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
		$this->PEMESANAN_MODEL = new Pemesanan_Model(); //load model (tabel pemesanan)
		//jika pencarian berdasarkan tanggal tertentu
		if(!is_null($this->request->getGet('mulai')) AND !is_null($this->request->getGet('selesai'))){
			$mulai = strtotime($this->request->getGet('mulai'));  //convert string date ke unix timestamp
			$selesai = strtotime($this->request->getGet('selesai'));  //convert string date ke unix timestamp
			$selesai = (int) $selesai + 24 * 3600;

			session()->set('mulai', $this->request->getGet('mulai'));
			session()->set('selesai', $this->request->getGet('selesai'));

			$laporan = $this->PEMESANAN_MODEL
        ->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY, 
        SUM(orders_products.harga_produk_pemesanan * orders_products.jumlah_pesan_produk) AS UANG, 
        orders_products.tanggal_selesai'])
        ->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id') //join tabel orders_products
        ->where(['status_pemesanan' => 'success']) //kondisi pencarian
        ->where('pemesanan.waktu_pesanan BETWEEN '.$mulai.' AND '.$selesai) //kondisi pencarian
        ->groupBy('orders_products.tanggal_selesai')->find();
		} else { //tanpa tanggal tertentu
			$laporan = $this->PEMESANAN_MODEL
        ->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY, 
        SUM(orders_products.harga_produk_pemesanan * orders_products.jumlah_pesan_produk) AS UANG, 
        orders_products.tanggal_selesai'])
        ->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id') //join tabel orders_products
        ->where(['status_pemesanan' => 'success']) //kondisi pencarian
        ->groupBy('orders_products.tanggal_selesai')->find();
		}

		$data = [
			'title' => 'Laporan Pendapatan',
			'laporan' => $laporan,
		];
		return view('dashboard/admin/laporan/laporan_pendapatan', $data);
	}

	public function laporan_penjualan()
	{
		$this->PEMESANAN_MODEL = new Pemesanan_Model(); //load model (tabel pemesanan)
		if(!is_null($this->request->getGet('mulai')) AND !is_null($this->request->getGet('selesai'))){
			$mulai = strtotime($this->request->getGet('mulai')); //convert string date ke unix timestamp
			$selesai = strtotime($this->request->getGet('selesai')); //convert string date ke unix timestamp
			$selesai = (int) $selesai + 24 * 3600;

			session()->set('mulai', $this->request->getGet('mulai'));
			session()->set('selesai', $this->request->getGet('selesai'));

			$laporan = $this->PEMESANAN_MODEL
        ->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY,
        orders_products.tanggal_selesai, kabupaten_pemesanan, nama_produk_pemesanan'])
        ->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id') //join tabel orders_products
        ->where(['status_pemesanan' => 'success']) //kondisi pencarian
        ->where('pemesanan.waktu_pesanan BETWEEN '.$mulai.' AND '.$selesai) //kondisi pencarian
        ->groupBy('orders_products.tanggal_selesai, nama_produk_pemesanan, kabupaten_pemesanan') //pengelompokan data
        ->find();

		} else {
			$laporan = $this->PEMESANAN_MODEL
        ->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY,
        orders_products.tanggal_selesai, kabupaten_pemesanan, nama_produk_pemesanan'])
        ->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id') //join tabel orders_products
        ->where(['status_pemesanan' => 'success']) //kondisi pencarian
        ->groupBy('orders_products.tanggal_selesai, nama_produk_pemesanan, kabupaten_pemesanan')->find();
		}

		$data = [
			'title' => 'Laporan Penjualan',
			'laporan' => $laporan,
		];
		return view('dashboard/admin/laporan/laporan_penjualan', $data);
	}

	public function laporan_penjualan_paling_laku()
  {
    $this->PEMESANAN_MODEL = new Pemesanan_Model(); //load model pemesanan (tabel pemesanan)

    //cari data berdasarkan tanggal
    if(!is_null($this->request->getGet('mulai')) AND !is_null($this->request->getGet('selesai'))){
      $mulai = strtotime($this->request->getGet('mulai')); //convert string date ke unix timestamp
      $selesai = strtotime($this->request->getGet('selesai')); //convert string date ke unix timestamp
      $selesai = (int) $selesai + 24 * 3600;

      session()->set('mulai', $this->request->getGet('mulai'));
      session()->set('selesai', $this->request->getGet('selesai'));

      $laporan = $this->PEMESANAN_MODEL
        ->groupBy('nama_produk_pemesanan')->find(); //pengelompokan data

    } else { //pencarian tanpa tanggal
      $laporan = $this->PEMESANAN_MODEL
        ->select(['SUM(orders_products.jumlah_pesan_produk) AS QTY,
			  orders_products.tanggal_selesai, kabupaten_pemesanan, nama_produk_pemesanan'])
        ->join('orders_products', 'orders_products.fk_pemesanan=pemesanan.order_id') //join tabel orders_products
        ->where(['status_pemesanan' => 'success']) //kondisi pencarian
        ->groupBy('nama_produk_pemesanan')->find(); //pengelompokan data
    }

    $data = [
      'title' => 'Laporan Penjualan',
      'laporan' => $laporan,
    ];
    return view('dashboard/admin/laporan/laporan_penjualan_paling_laku', $data);
  }

	public function laporan_stok() //salah satu implementasi dari tabel log_stok
	{
    $this->update_log_stok(); //trigger update tabel log_stok
		$LOG = new Log_Stok_Model(); //meng load model log_stok yang isinya adalah modeling dari tabel log_stok

		if(!is_null($this->request->getGet('tanggal'))){ //cari data berdasarkan tanggal
			$mulai = ($this->request->getGet('tanggal')); //convert string date ke unix timestamp

			session()->set('tanggal', $this->request->getGet('tanggal'));

      $stok = $LOG
        ->where('tanggal_log', str_replace('-','/', $mulai)) //kondisi pencarian
        ->find();

		} else { //jika tidak mencari data berdasarkan tanggal
      $stok = $LOG->findAll();
		}

		$data = [
			'title' => 'Laporan Stok',
			'stok' => $stok
		];

		return view('dashboard/admin/laporan/laporan_stok', $data);
	}

  public function update_log_stok(){

    $PRODUK = new  \App\Models\Produk_Model(); //load model products
    $LOG_STOK = new  \App\Models\Log_Stok_Model(); //load model log_stok

    $dataProduk = $PRODUK->findAll(); //mencari semua data pada tabel products

    if($LOG_STOK->where('tanggal_log', date('Y/m/d'))->find()){ //jika data pada tanggal ini sudah ada
      $LOG_STOK->where('tanggal_log', date('Y/m/d'))->delete(); //kosongkan isi tabel berdasarkan tanggal saat ini
      foreach($dataProduk as $pro){
        $dataSave = [
          'nama_barang' => $pro['nama_produk'],
          'stok_barang' => $pro['stok'],
          'tanggal_log' => date('Y/m/d')
        ];

        $LOG_STOK->save($dataSave); //insert data lagi
      }
    } else { //jika data dengan tanggal saat ini belum ada
      foreach($dataProduk as $pro){
        $dataSave = [
          'nama_barang' => $pro['nama_produk'],
          'stok_barang' => $pro['stok'],
          'tanggal_log' => date('Y/m/d')
        ];

        $LOG_STOK->save($dataSave); //insert data
      }
    }
  }

}
