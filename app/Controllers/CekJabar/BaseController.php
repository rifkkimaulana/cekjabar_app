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

	// add public kategori and tag
	protected $kategoriModel = [];
	protected $tagModel = [];

	// add komentar count
	protected $komentarCount = [];

	// add pengunjungMap
	protected $pengunjungMap = [];

	// add kategoriMap
	protected $kategoriMap = [];

	// add userMap
	protected $userMap = [];

	// add BeritaModel 
	protected $beritaModel = [];

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

		$this->kategoriModel = new KategoriModel();
		$this->tagModel = new TagModel();

		// Komentar Data Count
		$komentarModel = new KomentarModel();
		$this->komentarCount = [];
		foreach ($komentarModel->findAll() as $komentar) {
			$beritaId = $komentar['berita_id'];
			if (!isset($komentarCount[$beritaId])) {
				$komentarCount[$beritaId] = 1;
			} else {
				$komentarCount[$beritaId]++;
			}
		}

		// Pengunjung Map
		$pengunjungModel = new PengunjungModel();
		$this->pengunjungMap = [];
		foreach ($pengunjungModel->findAll() as $pengunjung) {
			$pengunjungMap[$pengunjung['berita_id']] = $pengunjung;
		}

		// Kategori Map
		$kategoriModel = new KategoriModel();
		$this->kategoriMap = [];
		foreach ($kategoriModel->findAll() as $kategori) {
			$kategoriMap[$kategori['id']] = $kategori;
		}

		// User Map
		$userModel = new UserModel();
		$this->userMap = [];
		foreach ($userModel->findAll() as $user) {
			$userMap[$user['id']] = $user;
		}
	}
}
