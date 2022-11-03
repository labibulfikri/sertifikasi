<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller {

    /*
    |-------------------------------------------------------------------
    | Construct
    |-------------------------------------------------------------------
    | 
    */
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }

    /*
    |-------------------------------------------------------------------
    | Index
    |-------------------------------------------------------------------
    |
    */
	function index()
	{
 
        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'content' => 'aset/laporan_aset',
            'footer' => 'layout/footer', 
            'title' => ' Selamat Datang Di aplikasi Sertifikasi BPKAD'
        );
        $this->load->view($data['masterpage'], $data);
    }
    
    /*
    |-------------------------------------------------------------------
    | Import Excel
    |-------------------------------------------------------------------
    |
    */
	function import_excel()
	{
        $this->load->helper('file');

        /* Allowed MIME(s) File */
        $file_mimes = array(
            'application/octet-stream', 
            'application/vnd.ms-excel', 
            'application/x-csv', 
            'text/x-csv', 
            'text/csv', 
            'application/csv', 
            'application/excel', 
            'application/vnd.msexcel', 
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if(isset($_FILES['uploadFile']['name']) && in_array($_FILES['uploadFile']['type'], $file_mimes)) {

            $array_file = explode('.', $_FILES['uploadFile']['name']);
            $extension  = end($array_file);

            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['uploadFile']['tmp_name']);
            $sheet_data  = $spreadsheet->getActiveSheet(0)->toArray();
            $array_data  = [];

            for($i = 1; $i < count($sheet_data); $i++) {
                $data = array(
                    'name'       => $sheet_data[$i]['0'],
                    'price'      => $sheet_data[$i]['1'],
                    'qty'        => $sheet_data[$i]['2'],
                    'input_date' => $sheet_data[$i]['3']
                );
                $array_data[] = $data;
            }
            
            if($array_data != '') {
                $this->home_model->insert_transaction_batch($array_data);
            }
            $this->modal_feedback('success', 'Success', 'Data Imported', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Import failed', 'Try again');
        }
        redirect('/');
    }

    /*
    |-------------------------------------------------------------------
    | Export Excel
    |-------------------------------------------------------------------
    |
    */
	function export_excel()
	{
        $lokasi_bpn = $this->input->post('lokasi_bpn'); 
        $id_regencie = $this->input->post('id_regencie');
        $id_district = $this->input->post('id_district');
        $id_village = $this->input->post('id_village');
 
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();





        if ($id_regencie == "0"){
            $id_regencie = null;
        }
        if ($id_district == "0"){
            $id_district  = null;
        }
        if ($id_village == "0") {
            $id_village = null;
        }


        $fetch_data = $this->m_laporan->make_query($lokasi_bpn,$id_regencie,$id_district,$id_village);


         /* Excel Header */
         
         $sheet->setCellValue('A1', '#');
         $sheet->mergeCells('B1:H1')->getCell('B1')->setValue('PETA BIDANG');
         $sheet->mergeCells('I1:K1')->getCell('I1')->setValue('PERMOHONAN HAK');
         $sheet->mergeCells('L1:Q1')->getCell('L1')->setValue('PERMOHONAN HAK');
         
         $sheet->setCellValue('A2', '#');
        //  $sheet->setCellValue('B2', 'PETA BIDANG');
         $sheet->setCellValue('B2', 'NO REGISTER');
         $sheet->setCellValue('C2', 'KOTA');
         $sheet->setCellValue('D2', 'KECAMATAN');
         $sheet->setCellValue('E2', 'KELURAHAN');
         $sheet->setCellValue('F2', 'NO SPS');
         $sheet->setCellValue('G2', 'TANGGAL SPS');
         $sheet->setCellValue('H2', 'STATUS'); 
        //  $sheet->setCellValue('J2', 'PERMOHONAN HAK'); 
         $sheet->setCellValue('I2', 'NO SPS'); 
         $sheet->setCellValue('J2', 'TANGGAL SPS');
         $sheet->setCellValue('K2', 'STATUS'); 
        //  $sheet->setCellValue('N2', 'PENDAFTARAN HAK'); 
         $sheet->setCellValue('L2', 'NO SPS'); 
         $sheet->setCellValue('M2', 'TANGGAL SPS');
         $sheet->setCellValue('N2', 'STATUS'); 

         
        //  $sheet->setCellValue('A1', '#');
        //  $sheet->setCellValue('B1', 'PETA BIDANG');
        //  $sheet->setCellValue('C1', 'NO REGISTER');
        //  $sheet->setCellValue('D1', 'KOTA');
        //  $sheet->setCellValue('E1', 'KECAMATAN');
        //  $sheet->setCellValue('F1', 'KELURAHAN');
        //  $sheet->setCellValue('G1', 'NO SPS');
        //  $sheet->setCellValue('H1', 'TANGGAL SPS');
        //  $sheet->setCellValue('I1', 'STATUS'); 
        //  $sheet->setCellValue('J1', 'PERMOHONAN HAK'); 
        //  $sheet->setCellValue('K1', 'NO SPS'); 
        //  $sheet->setCellValue('L1', 'TANGGAL SPS');
        //  $sheet->setCellValue('M1', 'STATUS'); 
        //  $sheet->setCellValue('N1', 'PENDAFTARAN HAK'); 
        //  $sheet->setCellValue('O1', 'NO SPS'); 
        //  $sheet->setCellValue('P1', 'TANGGAL SPS');
        //  $sheet->setCellValue('Q1', 'STATUS'); 


         $row_number = 3;
         $no=1;
        foreach($fetch_data as $key )
        {
            $sheet->setCellValue('A'.$row_number, $no);
            // $sheet->setCellValue('B'.$row_number, "PETA BIDANG");
            $sheet->setCellValue('B'.$row_number, $key->register_baru);
            $sheet->setCellValue('C'.$row_number, $key->kota);
            $sheet->setCellValue('D'.$row_number, $key->kecamatan);
            $sheet->setCellValue('E'.$row_number, $key->kelurahan);
            $sheet->setCellValue('F'.$row_number, $key->no_sps);
            $sheet->setCellValue('G'.$row_number, $key->tgl_sps);
            $sheet->setCellValue('H'.$row_number, $key->status);
            // $sheet->setCellValue('J'.$row_number, "PERMOHONAN HAK");
            $sheet->setCellValue('I'.$row_number, $key->no_sps_permohonan);
            $sheet->setCellValue('J'.$row_number, $key->tgl_sps_permohonan);
            $sheet->setCellValue('K'.$row_number, $key->status_permohonan);             
            // $sheet->setCellValue('N'.$row_number, "PENDAFTARAN HAK");
            $sheet->setCellValue('L'.$row_number, $key->no_sps_pendaftaran);
            $sheet->setCellValue('M'.$row_number, $key->tgl_sps_pendaftaran);
            $sheet->setCellValue('N'.$row_number, $key->status_pendaftaran);         
        
            $row_number++;
            $no++;
        }
        ob_start();
        // $sheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // $sheet->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // $sheet->getActiveSheet(0)->setTitle("Budget Sales");
        // $sheet->setActiveSheetIndex(0);
		$writer = new Xlsx($spreadsheet);
		
		$filename = 'simple';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.Xlsx"'); 
		header('Cache-Control: max-age=0');        
		$writer->save('php://output');

        // $write = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
        // $writer->save('php://output');
        // $write->save('php://output');
        $xlsData = ob_get_contents();
        ob_end_clean();
        $response =  array(
            'status' => TRUE,
            'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
        );
    
        die (json_encode($response));
    }

}
