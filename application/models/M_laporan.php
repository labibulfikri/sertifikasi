<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function make_query($byBpn,$id_regencie,$id_district,$id_village)
    {
        $byBpn = $byBpn;
        $id_regencie = $id_regencie;
        $id_district = $id_district;
        $id_village = $id_village;

         

        $table = "m_aset_baru";
        $select_column = "           
            m_aset_baru.id_aset as idnya,
            m_aset_baru.register_baru,
            m_aset_baru.register_lama,
            m_aset_baru.masalah,
            m_aset_baru.lokasi_pencatatan,
            m_aset_baru.luas,
            m_aset_baru.penggunaan,
            m_aset_baru.tahun_pengadaan,
            m_aset_baru.terbit,
            m_aset_baru.alamat,
            m_aset_det.id_aset,  
            m_aset_baru.lokasi_bpn,  
            status_map,
            no_sps,
            tgl_sps,
            no_sps_pendaftaran,
            tgl_sps_pendaftaran,
            no_sps_permohonan,
            tgl_sps_permohonan,
            status,
            status_permohonan,
            status_pendaftaran,
            id_districts,
            districts.name as kecamatan,
            villages.name as kelurahan,
            id_villages,
            id_regencies,
            regencies.name as kota, 
            regencies.id";

        
            
        $this->db->select($select_column);
        $this->db->from($table); 

        $this->db->join('m_aset_det', 'm_aset_baru.id_aset = m_aset_det.id_aset','left');
        $this->db->join('villages', 'm_aset_baru.id_villages = villages.id','left');
        $this->db->join('districts', 'm_aset_baru.id_districts = districts.id','left');
        $this->db->join('regencies', 'm_aset_baru.id_regencies = regencies.id','left');
    
 

      
        if ($byBpn == "bpn1") {
            $this->db->where('m_aset_baru.lokasi_bpn', $byBpn);    
        }  elseif ($byBpn == "bpn2") {
            $this->db->where('m_aset_baru.lokasi_bpn', $byBpn);
        } 
        
        if ($id_regencie != null){
            $this->db->where('m_aset_baru.id_regencies', $id_regencie);            
        }

        if($id_district != null){
            $this->db->where('m_aset_baru.id_districts', $id_district);            
        }  
        // elseif(){
        //     $this->db->where('m_aset_baru.id_districts', $id_district);            
        // }
        if ($id_village != null){
            $this->db->where('m_aset_baru.id_villages', $id_village);            
        } 

        $i = 0;
        $order = array('id_aset' => 'asc');
        $column_search = array('m_aset_baru.register_baru', 'register_lama', 'alamat');

 
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->group_by('idnya');
                    $this->db->group_by('m_aset_baru.id_aset');

                    $this->db->order_by('status_map', 'DESC');
                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
 
                    $this->db->group_end(); //close bracket
            }

            $i++;
        }
        // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
        $this->db->group_by('idnya');
        $this->db->group_by('m_aset_baru.id_aset');

        $this->db->order_by('m_aset_baru.id_aset', 'asc');

       
        $query = $this->db->get();

        //  $a = $this->db->last_query($query);
        // print_r($a);
        // exit();

        
        return $query->result();
    }
}