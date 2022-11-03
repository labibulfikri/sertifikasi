
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_home extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
        }

        function kategory_c()
        {

            $table = "m_aset_baru";
            $select_column = array(
                "count(id_aset)as kategory_c"
            );
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->where("masalah", 0);
            $query = $this->db->get();


            return $query->row_array();
        }

        function total()
        {

            $table = "m_aset_baru";
            $select_column = array(
                "count(id_aset)as total"
            );
            $this->db->select($select_column);
            $this->db->from($table);
            $query = $this->db->get();


            return $query->row_array();
        }

        function mandali()
        {

            $table = "m_aset_baru";
            $select_column = array(
                "count(id_aset)as mandali"
            );
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->where("masalah", 1);
            $query = $this->db->get();


            return $query->row_array();
        }

        //PETA 
        function peta_all()
        {

            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as peta_all"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 1);
            $query = $this->db->get(); 
            return $query->row_array();
        }

        function belum_ukur()
        {

            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as belum_ukur"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 1);
            $this->db->where("m_aset_det.status", "BELUM_UKUR");


            $query = $this->db->get(); 


            
//  $str = $this->db->last_query();
//            print_r($str);
//           exit();

            return $query->row_array();

        }

        function sudah_ukur()
        {

            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as sudah_ukur"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 1);
            $this->db->where("m_aset_det.status", "SUDAH_UKUR");
            $query = $this->db->get(); 
            return $query->row_array();

        }

        function terbit_peta_bidang()
        {

            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as terbit_peta_bidang"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 1);
            $this->db->where("m_aset_det.status", "TERBIT_PETA_BIDANG");
            $query = $this->db->get(); 
            return $query->row_array();

        }

    //pendaftaran     
    function pendaftaran_all()
        {

            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as pendaftaran_all"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 3);
            $query = $this->db->get(); 
            return $query->row_array();

        }

    function proses_sertifikat()
        {

            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as proses_terbit"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 3);
$this->db->where("m_aset_det.status_pendaftaran", "BELUM_TERBIT_SERTIFIKAT");
            $query = $this->db->get(); 
            return $query->row_array(); 
        }
 
    function terbit_sertifikat()
        {

            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as total_terbit"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 3);
$this->db->where("m_aset_det.status_pendaftaran", "terbit_sertifikat");
            $query = $this->db->get();

//  $str = $this->db->last_query();
//            print_r($str);
//           exit();

            return $query->row_array(); 
        }

    //permohonan
    function permohonan_all()
        {
            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as permohonan_all"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 2);
            $query = $this->db->get(); 
            return $query->row_array();
        }

        function belum_penelitian()
        {
            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as belum_penelitian"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 2);
            $this->db->where("m_aset_det.status_permohonan", "BELUM_PENELITIAN_TANAH");
            $query = $this->db->get(); 
            return $query->row_array();
        }

        function sudah_penelitian()
        {
            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as sudah_penelitian"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 2);
            $this->db->where("m_aset_det.status_permohonan", "SUDAH_PENELITIAN_TANAH");
            $query = $this->db->get(); 
            return $query->row_array();
        }

        function terbit_sk_permohonan()
        {
            $table = "m_aset_det";
            $select_column = array(
                "count(m_aset_det.id_aset)as terbit_sk_permohonan"
            );
            $this->db->select($select_column);
            $this->db->from($table);

            $this->db->join('m_aset_baru', ' m_aset_baru.id_aset = m_aset_det.id_aset', 'left');
            $this->db->where("m_aset_det.status_map", 2);
            $this->db->where("m_aset_det.status_permohonan", "TERBIT_SK_PENELITIAN");
            $query = $this->db->get(); 
            return $query->row_array();
        }




        function make_query()
        {

            $table = "m_aset_baru";
            $select_column = array(
                "*",

            );


            $order_column = array(null, "register_baru", "register_lama", "alamat", null);

            $this->db->select($select_column);
            $this->db->from($table);
            // $this->db->where('status', 0);
            $i = 0;
            $order = array('id_aset' => 'asc');
            $column_search = array('register_baru', 'register_lama', 'alamat');
            foreach ($column_search as $item) // loop column 
            {
                if (@$_POST['search']['value']) // if datatable send POST for search
                {

                    if ($i === 0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if (count($column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }
            if (isset($_POST["order"])) {
                $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

                // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
            } else {
                $this->db->order_by('id_aset', 'DESC');
                // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
            }
        }

        function make_datatables()
        {

            // $id = $id;
            $this->make_query();
            if ($_POST["length"] != -1) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();

            // $str = $this->db->last_query();
            // print_r($str);
            // exit();
            return $query->result();
        }

        function get_filtered_data()
        {
            // $id = $id;
            $this->make_query();
            $query = $this->db->get();
            return $query->num_rows();
        }
        function get_all_data()
        {
            $this->db->select("*");
            $this->db->from('m_aset_baru');
            // $this->db->where('id_user', $id);
            $i = 0;
            $order = array('id_aset' => 'asc');

            $column_search = array('register_baru', 'register_lama', 'alamat');
            foreach ($column_search as $item) // loop column 
            {
                if (@$_POST['search']['value']) // if datatable send POST for search
                {

                    if ($i === 0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if (count($column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }
            return $this->db->count_all_results();
        }
    }
