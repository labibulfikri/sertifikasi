<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}

	function gethari($hari)
	{
		$harinya = $hari;

		switch ($harinya) {
			case 'Sun':
				$getHari = "Minggu";
				break;
			case 'Mon':
				$getHari = "Senin";
				break;
			case 'Tue':
				$getHari = "Selasa";
				break;
			case 'Wed':
				$getHari = "Rabu";
				break;
			case 'Thu':
				$getHari = "Kamis";
				break;
			case 'Fri':
				$getHari = "Jumat";
				break;
			case 'Sat':
				$getHari = "Sabtu";
				break;
			default:
				$getHari = "Salah";
				break;
		}
		return $getHari;
	}
	public function index()
	{

		if ($this->session->userdata('status') != 'login') {

			redirect('auth/logout');
		} else {
			$hari = date('D');

			$h = $this->gethari($hari);

			$kat_c = $this->m_home->kategory_c();
			
			$total = $this->m_home->total();
			$mandali = $this->m_home->mandali();
			
			//PETA BIDANG
			$peta_all = $this->m_home->peta_all();
			$belum_ukur = $this->m_home->belum_ukur(); 
			$sudah_ukur = $this->m_home->sudah_ukur(); 
			$terbit_peta_bidang = $this->m_home->terbit_peta_bidang(); 
			//PEMOHONAN
			$permohonan_all = $this->m_home->permohonan_all();
			$belum_penelitian = $this->m_home->belum_penelitian();
			$sudah_penelitian = $this->m_home->sudah_penelitian();
			$terbit_sk_permohonan = $this->m_home->terbit_sk_permohonan();
			//PENDAFTARAN 
			$pendaftaran_all = $this->m_home->pendaftaran_all();
			$proses_terbit = $this->m_home->proses_sertifikat();
			$terbit_sertifikat = $this->m_home->terbit_sertifikat();

			$data = array(
				'masterpage' => 'layout/layout',
				'navbar' => 'layout/navbar',
				'sidebar' => 'layout/sidebar',
				'content' => 'home',
				
				'h' => $h,
				'c' => $kat_c,
				'mandali' => $mandali,

				'total' => $total,
				
				'permohonan_all' => $permohonan_all,
				'sudah_penelitian' => $sudah_penelitian,
				'belum_penelitian' => $belum_penelitian,
				'terbit_sk_permohonan' => $terbit_sk_permohonan,


				'peta_all' => $peta_all,
				'belum_ukur' => $belum_ukur,
				'sudah_ukur' => $sudah_ukur,
				'terbit_peta_bidang' => $terbit_peta_bidang, 
				
				'pendaftaran_all' => $pendaftaran_all,
				'proses_terbit' => $proses_terbit,
				'terbit_sertifikat' => $terbit_sertifikat,
				
				'footer' => 'layout/footer',
				'title' => ' Selamat Datang Di aplikasi disposisi Surat & Undangan BPKAD'
			);
			$this->load->view($data['masterpage'], $data);
		}
	}
}
