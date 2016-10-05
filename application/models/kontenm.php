<?php

class Kontenm extends CI_Model {
    function  __construct() {
        parent::__construct(); 
    }

    function ambil_konten($rute_pesan=NULL) {
	$data = array();

        if ($rute_pesan) {
            $options = array('rute_pesan' => $rute_pesan);            
            
            $this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
            $this->db->order_by('id_pesan', 'desc');
            $this->db->limit(15);
            
            $q = $this->db->get_where('pesan',$options);
        }

        else {

           $q = $this->db->query("select * from pesan join rute on pesan.rute_pesan = rute.id_rute order by id_pesan desc limit 15;");
            }

            if ($q->num_rows() > 0) {
                foreach ($q->result_array() as $row) {
                    $data[] = $row;
                    }
            }

        $q->free_result();
        return $data;
    }
	
	function konten_provinsi($idprov = NULL)
	{
		$this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
		$this->db->where('pesan.idprov', $idprov);
		$this->db->order_by('pesan.id_pesan', 'desc');
		$this->db->limit(15);
		$q = $this->db->get('pesan');
		
		if ($q->num_rows() > 0) {
			return $q->result();
		}
	}
    
    function ambil_detail($id_pesan)
    {
        $data = array();

        $options = array('id_pesan' => $id_pesan);
        $q = $this->db->query("SELECT * FROM (`pesan`) JOIN `rute` ON `pesan`.`rute_pesan` = `rute`.`id_rute` WHERE pesan.id_pesan = $id_pesan LIMIT 1");

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function ambil_komen($id_pesan)
    {
        $data = array();

        $options = array('id_pesan' => $id_pesan);
        $q = $this->db->query("SELECT * FROM (`komentar`) JOIN `pesan` ON `komentar`.`id_pesan_komentar` = `pesan`.`id_pesan` WHERE pesan.id_pesan = $id_pesan");

        if($q->num_rows() > 0)
        {
             return $q->result_array();
        }


    }
}
