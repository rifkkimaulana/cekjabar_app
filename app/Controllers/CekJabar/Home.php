<?php

namespace App\Controllers\CekJabar;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\PengunjungModel;
use App\Models\UserModel;

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

		$beritaModel = new BeritaModel();

		$beritaData = $beritaModel->where('status', '1')->orderBy('created_at', 'desc')->findAll();

		$userModel = new UserModel();

		$userMap = [];
		foreach ($userModel->findAll() as $user) {
			$userMap[$user['id']] = $user;
		}

		$kategoriModel = new KategoriModel();
		$kategoriMap = [];
		foreach ($kategoriModel->findAll() as $kategori) {
			$kategoriMap[$kategori['id']] = $kategori;
		}

		$pengunjungModel = new PengunjungModel();
		$pengunjungMap = [];
		foreach ($pengunjungModel->findAll() as $pengunjung) {
			$pengunjungMap[$pengunjung['berita_id']] = $pengunjung;
		}

		$data = [
			'title' => 'Dashboard Cek Jabar Berita Terupdate',
			'beritaData' => $beritaData,
			'userMap' => $userMap,
			'kategoriMap' => $kategoriMap,
		];
		return view('CekJabar/Pages/Home', $data);
	}
}
