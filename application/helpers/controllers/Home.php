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
			$terbit = $this->m_home->terbit_sertifikat();

			$data = array(
				'masterpage' => 'layout/layout',
				'navbar' => 'layout/navbar',
				'sidebar' => 'layout/sidebar',
				'content' => 'home',
				'h' => $h,
				'c' => $kat_c,
				'mandali' => $mandali,
				'total' => $total,
				'terbit' => $terbit,
				'footer' => 'layout/footer',
				'title' => ' Selamat Datang Di aplikasi disposisi Surat & Undangan BPKAD'
			);
			$this->load->view($data['masterpage'], $data);
		}
	}
}
