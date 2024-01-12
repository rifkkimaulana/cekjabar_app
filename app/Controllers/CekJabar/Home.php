<?php

namespace App\Controllers\CekJabar;

class Home extends BaseController
{
	public function index()
	{


		$data = [
			'title' => 'Dashboard Cek Jabar Berita Terupdate'
		];
		return view('CekJabar/Pages/Home', $data);
	}

	//--------------------------------------------------------------------

}
