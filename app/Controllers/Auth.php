<?php namespace App\Controllers;

use App\Models\Auth_Model;
use App\Models\Admin_Model;

class Auth extends BaseController
{
  protected $AM;
  protected $ADMIN_AUTH;

	public function __construct()
	{
		$this->AM = new Auth_Model();
		$this->ADMIN_AUTH = new Admin_Model();
	}

  public function register()
	{
		if(session()->has('user_id')){
			return redirect()->route('root');
		}

		$data = [
			'title' => 'Register'
		];

		if ($this->request->getPost()) {
			if (!$this->validate('register')) {
				return view('home/v_register', $data);
			} else {
				$request = [
					'user_name' => ucwords($this->request->getVar('nama')),
					'user_email' => $this->request->getVar('email'),
					'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT, ['cost' => 10])
				];

				if($this->AM->save($request)){
          session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil mendaftar, silahkan login.', 'success'));
        } else {
          session()->setFlashdata('message', sweetAlert('Upss!','Gagal mendaftar, silahkan ulangi.', 'error'));
        }
				return redirect()->to('register');
			}
		} else {
			return view('home/v_register', $data);
		}
	}
	
	public function login()
	{
		if(session()->has('user_id')){
			return redirect()->route('root');
		}

		$data = [
			'title' => 'Login'
		];

		if ($this->request->getPost()) {
			if (!$this->validate('login')) {
				return view('home/v_login', $data);
			} else {
				$email = $this->request->getPost('email');
				$password = $this->request->getPost('password');

				if($user = $this->AM->where('user_email', $email)->first()){
					if (password_verify($password, $user['user_password'])) {
						$dataSession = [
							'user_id' => $user['user_id'],
							'user_email' => $user['user_email'],
							'user_name' => $user['user_name'],
							'role' => 'MEMBER'
						];
						session()->set($dataSession);
						session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil login, silahkan gunakan aplikasi ini dengan bijak.', 'success'));
						return redirect()->route('home');
					} else {
						session()->setFlashdata('message', sweetAlert('Upss!', 'Password salah!', 'error'));
						return redirect()->route('login');
					}
				} else {
					session()->setFlashdata('message', sweetAlert('Upss!','Gagal login, member tidak terdaftar.', 'error'));
					return redirect()->route('login');
				}
			}
		} else {
			return view('home/v_login', $data);
		}
	}

	public function admin_login()
	{
		if(session()->has('user_id')){
			return redirect()->route('root');
		}

		$data = [
			'title' => 'Login Admin'
		];

		if ($this->request->getPost()) {
			if (!$this->validate('login')) {
				return view('home/v_login_admin', $data);
			} else {
				$email = $this->request->getPost('email');
				$password = $this->request->getPost('password');
				
				if($user = $this->ADMIN_AUTH->where('email_admin', $email)->first()){
					if (password_verify($password, $user['password_admin'])) {
						$dataSession = [
							'user_id' => $user['admin_id'],
							'user_email' => $user['email_admin'],
							'user_name' => $user['nama_admin'],
							'role' => 'ADMIN'
						];
						session()->set($dataSession);
						session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil login, silahkan gunakan aplikasi ini dengan bijak.', 'success'));
						return redirect()->route('home');
					} else {
						session()->setFlashdata('message', sweetAlert('Upss!', 'Password salah!', 'error'));
						return redirect()->route('admin_login');
					}
				} else {
					session()->setFlashdata('message', sweetAlert('Upss!','Gagal login, admin tidak terdaftar.', 'error'));
					return redirect()->route('admin_login');
				}
			}
		} else {
			return view('home/v_login_admin', $data);
		}
	}

	public function logout()
	{
		$cart = new \App\Libraries\Cart();
		if(!session()->has('user_id')){
      return redirect()->route('login');
    } else {
			$cart->destroy();
      session()->remove(['user_id','user_email', 'user_name', 'role', 'cart', 'sisa_stok']); //session destroy
      session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil keluar, Terimakasih.', 'info'));
      return redirect()->route('login');
    }
	}

}
