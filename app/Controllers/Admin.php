<?php namespace App\Controllers;

use App\Models\Dashboard_Model;
use App\Models\User_Model;
use App\Models\Supplier_Model;
use App\Models\Produk_Model;

class Admin extends BaseController
{

	protected $USER_MODEL;
	protected $SUPPLIER_MODEL;
	protected $PRODUK_MODEL;

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
				'nama_supplier' => $this->request->getVar('nama'),
				'stok' => $this->request->getVar('stok')
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
			'products' => $this->PRODUK_MODEL->join('suppliers','suppliers.supplier_id=products.fk_supplier')->findAll(),
			'suppliers' => $this->SUPPLIER_MODEL->findAll(),
			'selected' => $this->PRODUK_MODEL->whereNotIn('fk_supplier', [0])->findAll()
		];
		
		if($this->request->getPost()){
			$data = [
				'nama_supplier' => $this->request->getVar('nama'),
				'stok' => $this->request->getVar('stok')
			];
			$this->PRODUK_MODEL->save($data);
			session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil menambahkan data produk.', 'success'));
			return redirect()->to(base_url('admin/produk'));
		} else {
			return view('dashboard/admin/produk/data_produk', $data);
		}
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
		$data = [
			'nama_produk' => $this->request->getVar('nama'),
			'harga_produk' => $this->request->getVar('harga'),
			'gambar_produk' => $file,
			'keterangan_produk' => $this->request->getVar('keterangan')
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
				'keterangan_produk' => $this->request->getVar('keterangan')
			];
			$this->PRODUK_MODEL->update($id, $update);
			session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil mengupdate data produk.', 'success'));
			return redirect()->to(base_url('admin/edit_produk/'.$id));
		} else {
			return view('dashboard/admin/produk/edit_produk', $data);
		}
	}

	public function tambah_pesanan()
	{
		$data = [
			'title' => 'Tambah Pesanan',
			// 'produk' => $this->PRODUK_MODEL->find($id)
		];
		if($this->request->getPost()){

		} else {
			return view('dashboard/admin/pesanan/tambah_pesanan', $data);
		}
	}

}
