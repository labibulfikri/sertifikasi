<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Aset extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_aset');
        $this->load->model('m_home');
    }
    public function index()
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            // $kat_c = $this->m_home->kategory_c();
            // $total = $this->m_home->total();
            // $mandali = $this->m_home->mandali();
            // $terbit = $this->m_home->total_terbit_sertifikat();
            $get_kota = $this->get_kota();
            // $kecamatan = $this->get_kecamatan();


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'aset/data_aset',
                'footer' => 'layout/footer',
                // 'c' => $kat_c,
                // 'mandali' => $mandali,
                // 'get_kota' => $get_kota,
                // 'total' => $total,
                // 'terbit' => $terbit,
                'title' => ' Selamat Datang Di aplikasi Sertifikasi BPKAD'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function fetch_aset()
    {

        $fetch_data = $this->m_aset->make_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();

            $sub_array['masalah'] = $row->masalah;
            $sub_array[] = $no;
            $sub_array[] = $row->register_baru;
            $sub_array[] = $row->alamat;
            $sub_array[] = $row->luas . " m<sup>2</sup>";
            $sub_array[] = $row->penggunaan;
            $sub_array[] = $row->lokasi_bpn;


            // if ($row->status_map == 3) {
            //     $sub_array[] = "Pendaftaran Hak";
            // } else if ($row->status_map == 2) {
            //     $sub_array[] = "Permohonan Hak";
            // } else {
            //     $sub_array[] = "Peta Bidang";
            // }

            $sub_array[] = '<a href="' . base_url('aset/detail/' . $row->idnya . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Detail</i> </a> | ';
            $sub_array[] = '<a href="' . base_url('aset/detail2/' . $row->idnya . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Edit Data</i> </a> | <button role="button" class="tombol_delete btn btn-danger " id="' . $row->idnya . '"> Hapus </button>';

            // <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' .  $row->idnya . '" data-lokasi="' .  $row->lokasi_pencatatan . '" data-toggle="modal" data-registerbaru="' .  $row->register_baru . '" data-registerlama="' .  $row->register_lama . '" data-alamat="' .  $row->alamat . '" data-masalah="' .  $row->masalah . '" data-luas="' .  $row->luas . '"  data-luas="' .  $row->luas . '" data-tahun="' .  $row->tahun_pengadaan . '"  data-penggunaan="' .  $row->penggunaan . '" data-masalah="' .  $row->masalah . '" >Lihat Data</a> 
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_aset->get_all_data(),
            "recordsFiltered"           =>     $this->m_aset->get_filtered_data(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }

    public function detail($id_aset)
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $id_aset = $id_aset;

            $detail = $this->m_aset->get_detail($id_aset);
            $noreg = $detail['register_baru'];

            // $peta = $this->m_aset->peta_bidang($id_aset);
            $peta = $this->m_aset->peta_bidang2($id_aset);
            $file = $this->m_aset->file_sertifikasi($id_aset);


            // if ($peta) {
            //     $id_set_peta = $peta[0]->id_det_aset;
            // } else {
            //     $id_set_peta = null;
            // }

            $permohonan_hak = $this->m_aset->permohonan_hak($id_aset);
            // if ($permohonan_hak) {
            //     $id_set_permohonan = $permohonan_hak[0]->id_det_aset;
            // } else {
            //     $id_set_permohonan = null;
            // }

            $pendaftaran_hak = $this->m_aset->pendaftaran_hak($id_aset);

            // if ($pendaftaran_hak) {
            //     $id_set_pendaftaran  = $pendaftaran_hak[0]->id_det_aset;
            // } else {
            //     $id_set_pendaftaran = null;
            // }

            $get_kota = $this->get_kota();
            $kecamatan = $this->get_kecamatan();

            if ($detail['id_districts'] == null) {

                $id_districts = null;
            } else {
                $id_districts = $detail['id_districts'];
            }

            $lurah = $this->get_kelurahan($id_districts);

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'det' => $detail,
                'noreg' => $noreg,
                'peta' => $peta,
                'id_aset' => $id_aset,
                // 'id_set_peta' => $id_set_peta,
                // 'id_set_permohonan' => $id_set_permohonan,
                // 'id_set_pendaftaran' => $id_set_pendaftaran,
                'pendaftaran_hak' => $pendaftaran_hak,
                'permohonan_hak' => $permohonan_hak,
                'get_kota' => $get_kota,
                'lurah' => $lurah,
                'file' => $file,
                'kecamatan' => $kecamatan,
                'content' => 'aset/detail',
                'footer' => 'layout/footer',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function upload_sertifikat()
    {


        $keterangan_sertifikasi = $this->input->post('keterangan_sertifikasi');
        $id_aset_sertifikasi = $this->input->post('id_aset_sertifikasi');
        $nama_sertifikasi = $this->input->post('nama_sertifikasi');

        $config['upload_path'] = './assets2/upload_sertifikat/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 5000;
        $config['file_name'] = 'SHM-' . date('dmY') . '-' . substr(
            md5(rand()),
            0,
            10
        );

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {

            $fileData = $this->upload->data();
            $upload = [
                'judul_sertifikasi' =>  $this->upload->data('file_name'),
                // 'judul_sertifikasi' => $fileData['file_name'],
                'id_aset_sertifikasi' => $id_aset_sertifikasi,
                'keterangan_sertifikasi' => $keterangan_sertifikasi,
                'nama_sertifikasi' => $nama_sertifikasi
            ];
            $dt = $this->m_aset->upload_sertifikat($upload);

            if ($dt > 1) {
                echo "<script type='text/javascript'>
                        alert(' Berhasil ');
                        window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
                        </script>";
            } else {
                echo "<script type='text/javascript'>
                        alert(' Gagal, Filenya Harus PDF lohh :( ');
                        window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
                        </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                    alert(' Gagal , Upload Sertifikatnya Dong :( " . $this->upload->display_errors() . "');
                    window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
                    </script>";
        }
    }


    // function update_sertifikat()
    // {

    //     $keterangan_sertifikasi = $this->input->post('keterangan_sertifikasi');
    //     $id_aset_sertifikasi = $this->input->post('id_aset_sertifikasi');
    //     $nama_sertifikasi = $this->input->post('nama_sertifikasi');
    //     $id_sertifikasi = $this->input->post('id_sertifikasi');

    //     $old_image = $this->input->post('old_image');
    //     $new_image = $_FILES['new_image']['name'];

    //     if ($new_image == TRUE) { 
    //         // $config['encrypt_name'] = TRUE;
    //         $config['upload_path'] = './assets2/upload_sertifikat/';
    //         $config['allowed_types'] = 'pdf';
    //         $config['max_size'] = 5000;
    //         $update_image = time() . $_FILES["new_image"]['name'];
    //         $config['file_name'] = $update_image;

    //         $this->load->library('upload', $config);
    //         if ($this->upload->do_upload('new_image')) {

    //             if (file_exists("./assets2/upload_sertifikat/" . $old_image)) {
    //                 unlink("./assets2/upload_sertifikat/" . $old_image);
    //             }
    //             $fileData = $this->upload->data();

    //             $upload = [
    //                 // 'foto' => $config['encrypt_name'],
    //                 'judul_sertifikasi' => $update_image,
    //                 'keterangan_sertifikasi' => $keterangan_sertifikasi,
    //                 'nama_sertifikasi' => $nama_sertifikasi
    //             ];



    //             $dt = $this->m_aset->update_sertifikat($upload, $id_sertifikasi);
    //             if ($dt > 0) {
    //                 echo "<script type='text/javascript'>
    //                         alert(' Berhasil ');
    //                         window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
    //                         </script>";
    //             } else {
    //                 echo "<script type='text/javascript'>
    //                         alert(' Gagal ');
    //                         window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
    //                         </script>";
    //             }
    //         } else {
    //             echo "<script type='text/javascript'>
    //                     alert(' Gagal " . $this->upload->display_errors() . "');
    //                     window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
    //                     </script>";
    //         }
    //     } else {
    //         $update_image = $old_image;
    //     }
    //     $upload = [
    //         'judul_sertifikasi' => $update_image,
    //         'keterangan_sertifikasi' => $keterangan_sertifikasi,
    //         'nama_sertifikasi' => $nama_sertifikasi
    //     ];
    //     $dt = $this->m_aset->update_sertifikat($upload, $id_sertifikasi);
    //     if ($dt > 0) {
    //         echo "<script type='text/javascript'>
    //                 alert(' Berhasil ');
    //                 window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
    //                 </script>";
    //     } else {
    //         echo "<script type='text/javascript'>
    //                 alert(' Gagal ');
    //                 window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
    //                 </script>";
    //     }
    // }


    function update_sertifikat2()
    {


        $keterangan_sertifikasi = $this->input->post('keterangan_sertifikasi');
        $id_aset_sertifikasi = $this->input->post('id_aset_sertifikasi');
        $nama_sertifikasi = $this->input->post('nama_sertifikasi');

        $id_sertifikasi = $this->input->post('id_sertifikasi');

        $data = array(
            'id_aset_sertifikasi' => $id_aset_sertifikasi,
            'keterangan_sertifikasi' => $keterangan_sertifikasi,
            'nama_sertifikasi' => $nama_sertifikasi
        );
        $exe = $this->m_aset->update_sertifikat($data, $id_sertifikasi);


        // $id_surat_det = $this->input->post('id_surat');
        $old_image = $this->input->post('old_image');

        $config['upload_path'] = './assets2/upload_sertifikat/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 5000;
        $config['file_name'] = 'SHM-' . date('dmY') . '-' . substr(
            md5(rand()),
            0,
            10
        );

        $this->load->library('upload', $config);

        if ($_FILES['new_image']['name'] != null) {

            if ($this->upload->do_upload('new_image')) {

                if (file_exists("./assets2/upload_sertifikat/" . $old_image)) {
                    unlink("./assets2/upload_sertifikat/" . $old_image);
                }

                $cek = $this->db->get_where(
                    'upload_sertifikat',
                    array('id_sertifikasi' => $this->input->post('id_sertifikasi'))
                )->row_array();

                if ($cek == null) {
                    $upload = [
                        'id_sertifikasi' => $this->input->post('id_sertifikasi'),
                        'judul_sertifikasi' => $this->upload->data('file_name')
                    ];
                    $dt = $this->m_aset->upload_sertifikat($upload);
                } else {
                    $upload = [
                        'judul_sertifikasi' => $this->upload->data('file_name')
                    ];
                    $dt = $this->m_aset->update_sertifikat($upload, $this->input->post('id_sertifikasi'));
                }

                if ($dt > 0) {
                    echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                            
                    window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
                            </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert(' Gagal ');
                            
                    window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
                            </script>";
                }
            }
        } else {
            echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                            
                    window.location.href ='" . base_url('aset/detail/' . $id_aset_sertifikasi) . "';
                            </script>";
        }
    }

    public function detail2($id_aset)
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $id_aset = $id_aset;

            $detail = $this->m_aset->get_detail($id_aset);

            $noreg = $detail['register_baru'];

            $peta = $this->m_aset->peta_bidang($id_aset);

            if ($peta) {
                $id_set_peta = $peta[0]->id_det_aset;
            } else {
                $id_set_peta = null;
            }

            $permohonan_hak = $this->m_aset->permohonan_hak($id_aset);
            if ($permohonan_hak) {
                $id_set_permohonan = $permohonan_hak[0]->id_det_aset;
            } else {
                $id_set_permohonan = null;
            }

            $pendaftaran_hak = $this->m_aset->pendaftaran_hak($id_aset);

            if ($pendaftaran_hak) {
                $id_set_pendaftaran  = $pendaftaran_hak[0]->id_det_aset;
            } else {
                $id_set_pendaftaran = null;
            }

            $get_kota = $this->get_kota();
            $kecamatan = $this->get_kecamatan();



            if ($detail['id_districts'] == null) {

                $id_districts = null;
            } else {
                $id_districts = $detail['id_districts'];
            }

            $lurah = $this->get_kelurahan($id_districts);

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'det' => $detail,
                'noreg' => $noreg,
                'peta' => $peta,
                'id_aset' => $id_aset,
                'id_set_peta' => $id_set_peta,
                'id_set_permohonan' => $id_set_permohonan,
                'id_set_pendaftaran' => $id_set_pendaftaran,
                'pendaftaran_hak' => $pendaftaran_hak,
                'permohonan_hak' => $permohonan_hak,
                'get_kota' => $get_kota,
                'lurah' => $lurah,
                'kecamatan' => $kecamatan,
                'content' => 'aset/detail2',
                'footer' => 'layout/footer',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function update()
    {

        $id_aset = $this->input->post('id_aset');



        $data = array(
            "register_lama" => $this->input->post('register_lama'),
            "register_baru" => $this->input->post('register_baru'),
            "lokasi_pencatatan" => $this->input->post('lokasi_pencatatan'),
            "luas" => $this->input->post('luas'),
            "tahun_pengadaan" => $this->input->post('tahun_pengadaan'),
            "penggunaan" => $this->input->post('penggunaan'),
            "alamat" => $this->input->post('alamat'),
            "masalah" => $this->input->post('masalah'),
            "id_regencies" => $this->input->post('id_regencie'),
            "id_districts" => $this->input->post('id_district'),
            "id_villages" => $this->input->post('id_village'),
            "lokasi_bpn" => $this->input->post('lokasi_bpn'),
            "atas_nama" => $this->input->post('atas_nama'),
            "dokumen_tanah" => $this->input->post('dokumen_tanah'),
            "keterangan" => $this->input->post('keterangan'),
        );


        $exe = $this->m_aset->update($data, $id_aset);

        if ($exe > 0) {
            echo "<script type='text/javascript'>
        alert(' Update Berhasil ');
        window.location.href ='" . base_url('aset') . "';
        </script>";
        }
    }

    function update_det()
    {

        $id_aset = $this->input->post('id_aset');

        $id_det_aset = $this->input->post('id_det_aset');

        $status_map =  $this->input->post('status_map');

        if ($status_map == 1) {

            $data = array(
                "register_baru" => $this->input->post('register_baru'),
                "no_sps" => $this->input->post('no_sps'),
                "tgl_sps" => $this->input->post('tgl_sps'),
                "no_nib" => $this->input->post('no_nib'),
                "tgl_nib" => $this->input->post('tgl_nib'),
                "status" => $this->input->post('status'),
                "keterangan" => $this->input->post('keterangan'),
                "luas_peta" => $this->input->post('luas_peta'),
                "status_map" => 1

            );
        } else if ($status_map == 2) {

            $data = array(
                "status_permohonan" => $this->input->post('status_permohonan'),
                "keterangan_permohonan" => $this->input->post('keterangan_permohonan'),
                "tgl_sk_bpn" => $this->input->post('tgl_sk_bpn'),
                "no_sk_bpn" => $this->input->post('no_sk_bpn'),
                "tgl_penelitian" => $this->input->post('tgl_penelitian'),
                "biaya_permohonan" => $this->input->post('biaya_permohonan'),
                "tgl_sps_permohonan" => $this->input->post('tgl_sps_permohonan'),
                "no_sps_permohonan" => $this->input->post('no_sps_permohonan'),
                "luas_permohonan" => $this->input->post('luas_permohonan'),
                "status_map" => 2

            );
        } else {
            $data = array(
                "register_baru" => $this->input->post('register_baru'),
                "no_sps_pendaftaran" => $this->input->post('no_sps_pendaftaran'),
                "tgl_sps_pendaftaran" => $this->input->post('tgl_sps_pendaftaran'),
                "status_pendaftaran" => $this->input->post('status_pendaftaran'),
                "no_sertifikat" =>  $this->input->post('no_sertifikat'),
                "tgl_sertifikat" =>  $this->input->post('tgl_sertifikat'),
                "luas_pendaftaran" =>  $this->input->post('luas_pendaftaran'),
                "keterangan_pendaftaran" => $this->input->post('keterangan_pendaftaran'),
                "status_map" => 3
            );
        }

        $exe = $this->m_aset->update_det($data, $id_det_aset);

        if ($exe > 0) {

            echo "<script type='text/javascript'>
        alert(' Update Berhasil ');
        window.location.href ='" . base_url('aset/detail/' . $id_aset) . "';
        </script>";
        }
    }

    function delete()
    {
        $id_aset = $this->input->post('id_aset');
        $del = $this->m_aset->hapus_data($id_aset, 'm_aset_baru');
    }

    function delete_det()
    {
        $id_det_aset = $this->input->post('id_det_aset');

        $del = $this->m_aset->hapus_data_det($id_det_aset);
    }

    function delete_sertifikasi()
    {
        $id_sertifikasi = $this->input->post('id_sertifikasi');

        $del = $this->m_aset->hapus_data_sertifikasi($id_sertifikasi);
    }

    function insert_det()
    {
        $id_aset = $this->input->post('id_aset');

        $status_map = $this->input->post('status_map');

        if ($status_map == 1) {

            $data  = array(
                "status_map" => $status_map,
                "status" => $this->input->post('status'),
                "keterangan" => $this->input->post('keterangan'),
                "register_baru" => $this->input->post('register_baru'),
                "id_aset" => $this->input->post('id_aset'),
                "no_sps" => $this->input->post('no_sps'),
                "tgl_sps" => $this->input->post('tgl_sps'),
                "tgl_nib" => $this->input->post('tgl_nib'),
                "no_nib" => $this->input->post('no_nib'),
                "luas_peta" => $this->input->post('luas_peta'),
            );
        } else if ($status_map == 2) {
            $data  = array(
                "status_map" => $status_map,
                "register_baru" => $this->input->post('register_baru'),
                "status_permohonan" => $this->input->post('status_permohonan'),
                "no_sk_bpn" => $this->input->post('no_sk_bpn'),
                "tgl_sk_bpn" => $this->input->post('tgl_sk_bpn'),
                "id_aset" => $this->input->post('id_aset'),
                "no_sps_permohonan" => $this->input->post('no_sps_permohonan'),
                "tgl_sps_permohonan" => $this->input->post('tgl_sps_permohonan'),
                "biaya_permohonan" => $this->input->post('biaya_permohonan'),
                "tgl_penelitian" => $this->input->post('tgl_penelitian'),
                "keterangan_permohonan" => $this->input->post('keterangan_permohonan'),
            );
        } else {

            $data  = array(
                "register_baru" => $this->input->post('register_baru'),
                "id_aset" => $this->input->post('id_aset'),
                "status_map" => $status_map,
                "status_pendaftaran" => $this->input->post('status_pendaftaran'),
                "no_sertifikat" => $this->input->post('no_sertifikat'),
                "tgl_sertifikat" => $this->input->post('tgl_sertifikat'),
                "biaya_pendaftaran" => $this->input->post('biaya_pendaftaran'),
                "no_sps_pendaftaran" => $this->input->post('no_sps_pendaftaran'),
                "luas_pendaftaran" => $this->input->post('luas_pendaftaran'),
            );
        }


        $exe = $this->m_aset->insertdata($data);
        if ($exe > 0) {
            echo "<script type='text/javascript'>
        alert(' Berhasil Ditambahkan ');
        window.location.href ='" . base_url('aset/detail/' . $id_aset) . "';
        </script>";
        }
    }

    function get_kota()
    {
        $a = $this->input->post('search');
        $kota = $this->m_aset->datakota($a);
        // foreach ($kota as $key) {

        //     echo '<option value="' . $key['id'] . '">' . $key['name'] . '</option>';
        // }
        return $kota;
    }

    function get_kecamatan()
    {
        // $a = $this->input->get('search');
        $kecamatan = $this->m_aset->kecamatan();

        return $kecamatan;
    }


    function get_kelurahan($id)
    {
        // $a = $this->input->get('search');
        $id = $id;

        $lurah = $this->m_aset->datakelurahan($id);
        return $lurah;
    }


    // function get_kec()
    // {
    //     $id = $this->input->post('id');
    //     $search = $this->input->get('search');

    //     $kec = $this->m_aset->datakecamatan($id, $search);
    //     // echo json_encode($kec);
    //     foreach ($kec as $key) {

    //         echo '<option value="' . $key['id'] . '">' . $key['name'] . '</option>';
    //     }
    // }


    // function get_kelurahan()
    // {
    //     $id = $this->input->post('id');

    //     $search = $this->input->get('search');

    //     $lurah = $this->m_aset->datakelurahan($id, $search);

    //     foreach ($lurah as $key) {
    //         echo '<option value="' . $key->id . '">' . $key->name . '</option>';
    //     }
    // }

    function detail_aset()
    {
        $id_aset = $this->input->post('id');
        $data = $this->m_aset->get_detail($id_aset);
        echo json_encode($data);
    }

    function get_kec()
    {
        $id = $this->input->get('id');
        $search = $this->input->get('search');

        $kec = $this->m_aset->datakecamatan($id, $search);
        echo json_encode($kec);
    }

    function get_kelurahan2()
    {
        $id = $this->input->get('id');
        $search = $this->input->get('search');

        $lurah = $this->m_aset->datakelurahan2($id, $search);
        echo json_encode($lurah);
    }



    public function laporan()
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $kat_c = $this->m_home->kategory_c();
            $total = $this->m_home->total();
            $mandali = $this->m_home->mandali();
            $terbit = $this->m_home->terbit_sertifikat();
            $get_kota = $this->get_kota();
            // $kecamatan = $this->get_kecamatan();


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'aset/laporan_aset',
                'footer' => 'layout/footer',
                'c' => $kat_c,
                'mandali' => $mandali,
                'get_kota' => $get_kota,
                'total' => $total,
                'terbit' => $terbit,
                'title' => ' Selamat Datang Di aplikasi Sertifikasi BPKAD'
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function laporan_aset()
    {

        ## Custom Field value
        $searchByMap  = $this->input->post('searchByMap');
        $fetch_data = $this->m_aset->make_datatables_lap($searchByMap);

        $data = array();
        $no = $_POST['start'];
        foreach ($fetch_data as $row) {
            $no++;
            $sub_array = array();

            $sub_array['masalah'] = $row->masalah;
            $sub_array['map'] = $row->status_map;
            $sub_array[] = $no;
            $sub_array[] = $row->register_baru;
            $sub_array[] = $row->alamat;


            if ($row->status_map == 3) {
                $sub_array[] = "Pendaftaran Hak";
            } else if ($row->status_map == 2) {
                $sub_array[] = "Permohonan Hak";
            } else {
                $sub_array[] = "Peta Bidang";
            }

            // $sub_array[] = '<a href="' . base_url('aset/detail/' . $row->idnya . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Detail</i> </a> | ';
            // $sub_array[] = '<a href="' . base_url('aset/detail2/' . $row->idnya . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Edit Data</i> </a> | <button role="button" class="tombol_delete btn btn-danger " id="' . $row->idnya . '"> Hapus </button>';

            // <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombolEdit" data-id="' .  $row->idnya . '" data-lokasi="' .  $row->lokasi_pencatatan . '" data-toggle="modal" data-registerbaru="' .  $row->register_baru . '" data-registerlama="' .  $row->register_lama . '" data-alamat="' .  $row->alamat . '" data-masalah="' .  $row->masalah . '" data-luas="' .  $row->luas . '"  data-luas="' .  $row->luas . '" data-tahun="' .  $row->tahun_pengadaan . '"  data-penggunaan="' .  $row->penggunaan . '" data-masalah="' .  $row->masalah . '" >Lihat Data</a> 
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_aset->get_all_data_lap($searchByMap),
            "recordsFiltered"           =>     $this->m_aset->get_filtered_data_lap($searchByMap),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }


    public function export()
    {
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');
        
		$writer = new Xlsx($spreadsheet);
		
		$filename = 'simple';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.Xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
    }
}
