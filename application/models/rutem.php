<?php

class Rutem extends CI_Model {

    function  __construct() {
        parent::__construct();
    }

    function tambah($data)
    {
        $this->db->insert('rute', $data);
    }

    /*
     * ambil rute pada fungsi ini
     * untuk controller pada pesan dan bukan pada rute
     */
    function ambil_rute($idprov=NULL) {
        $data = array();
		if(!empty($idprov)) $this->db->where('idprov', $idprov);
        $this->db->order_by('id_rute', 'asc');
        $q = $this->db->get('rute');

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    /*
     * pada fungsi ini ambil rute untuk pembaharuan rute
     */

    function pilih_rute($id_rute)
    {
         $this->db->where('id_rute', $id_rute);
        $q = $this->db->get('rute');
        
        if($q->num_rows() > 0)
        {
            $row = $q->row();
            return $row;
        }
    }

    function perbaharui($id_rute, $data)
    {
        $this->db->where('id_rute', $id_rute);
        $this->db->update('rute', $data);
    }

    function hapus($id_rute)
    {
        $this->db->where('id_rute', $id_rute);
        $this->db->delete('rute');
    }
    
}