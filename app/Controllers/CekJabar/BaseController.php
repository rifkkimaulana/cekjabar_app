<?php

namespace App\Controllers\CekJabar;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\KomentarModel;
use App\Models\PengunjungModel;
use App\Models\TagModel;
use App\Models\UserModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	protected $beritaTrending = [];

	// insert beritaModel
	protected $beritaModel = [];

	// Insert kategoriModel and kategoriMap
	protected $kategoriModel;
	protected $kategoriMap;

	// insert pengunjungModel and PengunjungMap
	protected $pengunjungModel;
	protected $pengunjungMap;

	// Insert komentarCount
	protected $komentarCount;

	// Insert userMap
	protected $userMap;

	// Insert tagModel
	protected $tagModel = [];
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();

		$this->beritaModel = new BeritaModel();
		$this->beritaTrending = $this->beritaModel
			->select('tb_berita.*, COALESCE(SUM(tb_pengunjung.jumlah_kunjungan), 0) as total_kunjungan')
			->join('tb_pengunjung', 'tb_pengunjung.berita_id = tb_berita.id', 'left')
			->where('tb_berita.status', '1')
			->groupBy('tb_berita.id')
			->orderBy('total_kunjungan', 'desc');

		// kategotiModel
		$this->kategoriModel = new KategoriModel();
		$this->kategoriMap = [];
		foreach ($this->kategoriModel->findAll() as $kategori) {
			$this->kategoriMap[$kategori['id']] = $kategori;
		}

		// Pengunjung Map
		$this->pengunjungModel = new PengunjungModel();
		$this->pengunjungMap = [];
		foreach ($this->pengunjungModel->findAll() as $pengunjung) {
			$this->pengunjungMap[$pengunjung['berita_id']] = $pengunjung;
		}

		// Komentar Data Count
		$komentarModel = new KomentarModel();
		$this->komentarCount = [];
		foreach ($komentarModel->findAll() as $komentar) {
			$beritaId = $komentar['berita_id'];
			if (!isset($this->komentarCount[$beritaId])) {
				$this->komentarCount[$beritaId] = 1;
			} else {
				$this->komentarCount[$beritaId]++;
			}
		}

		// User Map
		$userModel = new UserModel();
		$this->userMap = [];
		foreach ($userModel->findAll() as $user) {
			$this->userMap[$user['id']] = $user;
		}

		$this->tagModel = new TagModel();
	}
}
