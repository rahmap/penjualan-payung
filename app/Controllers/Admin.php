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
		$data = [
			'title' => 'Data Produk',
			'products' => $this->PRODUK_MODEL->findAll()
		];
		if($this->request->getPost()){
			$data = [
				'nama_supplier' => $this->request->getVar('nama'),
				'stok' => $this->request->getVar('stok')
			];
			$this->PRODUK_MODEL->save($data);
			session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil menambahkan data peoduk.', 'success'));
			return redirect()->to(base_url('admin/produk'));
		} else {
			return view('dashboard/admin/produk/data_produk', $data);
		}
	}
}
