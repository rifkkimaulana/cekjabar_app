<?php

namespace App\Controllers\CekJabar;

class Home extends BaseController
{
	public function index()
	{
		$formatTanggalIndonesia = function ($tanggal) {
			$namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
			$namaBulan = [
				'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
				'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
			];

			$dateTime = new \DateTime($tanggal);
			$hari = $namaHari[$dateTime->format('w')];
			$bulan = $namaBulan[$dateTime->format('n') - 1];
			$tahun = $dateTime->format('Y');
			$tanggalIndonesia = $hari . ', ' . $dateTime->format('d') . ' ' . $bulan . ' ' . $tahun;

			return $tanggalIndonesia;
		};

		//where('status', '1')->orderBy('created_at', 'desc')->findAll()
		$data = [
			'title' => 'Home',
			'beritaData' => $this->beritaModel,
			'userMap' => $this->userMap,
			'kategoriMap' => $this->kategoriMap,
			'pengunjungMap' => $this->pengunjungMap,
			'beritaTrending' => $this->beritaTrending,
			'komentarCount' => $this->komentarCount,
			'kategoriData' => $this->kategoriModel,
			'tagData' => $this->tagModel
		];
		return view('CekJabar/Pages/Home', $data);
	}

	public function detail()
	{
		$data = [
			'title' => 'Contact'
		];
		return view('CekJabar/Pages/Post', $data);
	}

	public function search()
	{
		$data = [
			'title' => 'Contact'
		];
		return view('CekJabar/Pages/Search', $data);
	}

	public function filter()
	{
		$data = [
			'title' => 'Contact'
		];
		return view('CekJabar/Pages/Filter', $data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Contact',
			'beritaTrending' => $this->beritaTrending,
		];
		return view('CekJabar/Pages/Contact', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About',
			'beritaTrending' => $this->beritaTrending,
		];
		return view('CekJabar/Pages/About', $data);
	}

	public function blank_pages()
	{
		$data = [
			'title' => 'Halaman Tidak Ditemukan',
			'beritaTrending' => $this->beritaTrending,
		];
		return view('CekJabar/Pages/404', $data);
	}
}
