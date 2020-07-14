<?php namespace App\Controllers;

use App\Models\Dashboard_Model;

class Dashboard extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Welcome'
		];

		return view('dashboard/member/welcome', $data);
	}

}
