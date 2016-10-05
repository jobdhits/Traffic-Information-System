<?php

class Provinsim extends CI_Model {

    function  __construct() {
        parent::__construct();
    }

    function tambah($data)
    {
        $this->db->insert('provinsi', $data);
    }

    /*
     * ambil provinsi pada fungsi ini
     * untuk controller pada pesan dan bukan pada rute
     */

      function pilih_provinsi($id_provinsi)
        {
             $this->db->where('id_provinsi', $id_provinsi);
            $q = $this->db->get('provinsi');

            if($q->num_rows() > 0)
            {
                $row = $q->row();
                return $row;
            }
        }

    function ambil_provinsi() {
        $data = array();

        $this->db->order_by('id_provinsi', 'asc');
        $q = $this->db->get('provinsi');

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }


    function perbaharui($id_provinsi, $data)
    {
        $this->db->where('id_provinsi', $id_provinsi);
        $this->db->update('provinsi', $data);
    }

    function hapus($id_provinsi)
    {
        $this->db->where('id_provinsi', $id_provinsi);
        $this->db->delete('provinsi');
    }
	
	function get_prov()
	{
        $q = $this->db->get('provinsi');
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
	}

}