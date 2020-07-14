<?php namespace App\Controllers;

use App\Models\Auth_Model;

class Auth extends BaseController
{
  protected $AM;

  public function index()
  {
    $data = [
      'title' => 'Daftar'
    ];
    return view('home/v_register', $data);
  }

  public function register()
	{
		if(session()->has('user_id')){
			return redirect()->to('home');
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
				dd('as');
				if($this->AM->save($request)){
          session()->setFlashdata('message', sweetAlert('Horayy!','Berhasil mendaftar, silahkan login.', 'success'));
        } else {
          session()->setFlashdata('message', sweetAlert('Upss!','Gagal mendaftar, silahkan ulangi.', 'error'));
        }
				return redirect()->to(base_url('auth/register'));
			}
		} else {
			return view('home/v_register', $data);
		}
  }

}
