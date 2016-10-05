<?php

class Anggota_berandam extends CI_Model{

    function  __construct() {
        parent::__construct();
    }

    function ambil_pesan_user()
    {
        $user = $this->session->userdata('username');

        $this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
        $this->db->order_by("id_pesan", "desc");
        $this->db->limit(5);
        $this->db->where('penulis =', $user);

        $query = $this->db->get('pesan');

        if($query->num_rows() > 0){
             return $query->result();
                $data[] = $row;
        }

    }

    function ambil_komen_user()
    {
        $user = $this->session->userdata('username');

        $this->db->order_by("id_komentar", "desc");
        $this->db->limit(5);
        $this->db->where('komentator =', $user);

        $query = $this->db->get('komentar');

        if($query->num_rows() > 0){
             return $query->result();
                $data[] = $row;
        }
//        return $data;
        $query->free_result();
    }



    function ambil_tanggapan()
        {
            $user = $this->session->userdata('username');

            $this->db->join('pesan', 'komentar.id_pesan_komentar = pesan.id_pesan');
            $this->db->order_by("id_komentar", "desc");
            $this->db->limit(5);
            $this->db->where('penulis =', $user);
            $this->db->where('komentator !=', $user);

            $query = $this->db->get('komentar');

            if($query->num_rows() > 0){
                 return $query->result();
                    $data[] = $row;
            }

    }

    function profil()
    {
        $user = $this->session->userdata('username');
        $this->db->where('username',  $user);
        $query = $this->db->get('anggota');

        if($query->num_rows() > 0){
            return $query->result();
                $data[] = $row;
        }
        return $data;
        $query->free_result();
    }

    function perbaharui_profil($id_anggota, $data)
    {
        $user = $this->session->userdata('username');
        $this->db->where('username =',  $user);
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
    }

    function perbaharui_profil_oleh_admin($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
    }

    function ambil_profil($id_anggota)
    {
        $user = $this->session->userdata('username');
        $this->db->where('username =',  $user);
        $this->db->where('id_anggota', $id_anggota);
        $query = $this->db->get('anggota');

        if($query->num_rows() > 0)
        {
            $row = $query ->row();
            return $row;
        }
    }

     function ambil_profil_oleh_admin($id_anggota)
    {
        
        $this->db->where('id_anggota', $id_anggota);
        $query = $this->db->get('anggota');

        if($query->num_rows() > 0)
        {
            $row = $query ->row();
            return $row;
        }
    }

    function perbaharui_password($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
	$update = $this->db->update('anggota', $data);
    }

    function ambil_password($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        $query = $this->db->get('anggota');

        if($query->num_rows() > 0)
        {
            $row = $query ->row();
            return $row;
        }
    }

    function perbaharui_komentar($id_komentar, $data)
    {
        $this->db->where('id_komentar', $id_komentar);
	$update =  $this->db->update('komentar', $data);
    }

    function ambil_komentar($id_komentar)
    {        
        $this->db->where('id_komentar', $id_komentar);
        $query = $this->db->get('komentar');

        if($query->num_rows() > 0)
        {
            $row = $query ->row();
            return $row;
        }
    }


    /*
     * Setelah fungsi diatas fungsi berikut ini untuk mengambil semua pesan
     * dan memnghitung semua jumlahnya.
     */

    function ambil_semua_pesan(){
        $user = $this->session->userdata('username');

        $this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
        $this->db->order_by("id_pesan", "desc");
        $this->db->where('penulis =', $user);

        if($query->num_rows() > 0)
        {
             return $query->result_array();
        }
    }

    function baris_pesan($row){
        $user = $this->session->userdata('username');

        $this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
        $this->db->order_by("id_pesan", "desc");
        $this->db->where('penulis =', $user);
        $query=$this->db->get('pesan',10,$row);


        if($query->num_rows()>0){

        // return result set as an associative array

        return $query->result_array();

        }
    }

    function jumlah_pesan(){
        $user = $this->session->userdata('username');
        $this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
        $this->db->order_by("id_pesan", "desc");
        $this->db->where('penulis =', $user);
        $this->db->from('pesan');


        return $this->db->count_all_results();
    }

     /*
     * Setelah fungsi diatas fungsi berikut ini untuk mengambil semua komentar
     * dan memnghitung semua jumlahnya.
     */

    function ambil_semua_komentar(){
        $user = $this->session->userdata('username');

        $this->db->where('komentator =', $user);

        if($query->num_rows() > 0)
        {
             return $query->result_array();
        }
    }

    function baris_komentar($row){
        $user = $this->session->userdata('username');

        $this->db->where('komentator =', $user);
        //$this->db->order_by("id_komentator", "desc");
        $query=$this->db->get('komentar',10,$row);


        if($query->num_rows()>0){

        // return result set as an associative array

        return $query->result_array();

        }
    }

    function jumlah_komentar(){
        $user = $this->session->userdata('username');

        $this->db->order_by("id_komentar", "desc");
        $this->db->where('komentator =', $user);
        $this->db->from('komentar');


        return $this->db->count_all_results();
    }


     /*
     * Setelah fungsi diatas fungsi berikut ini untuk mengambil semua tanggapan
     * dan memnghitung semua jumlahnya.
     */

    function ambil_semua_tanggapan(){
        $user = $this->session->userdata('username');

        $this->db->join('pesan', 'komentar.id_pesan_komentar = pesan.id_pesan');
        $this->db->order_by("id_komentar", "desc");
        $this->db->where('penulis =', $user);
        $this->db->where('komentator !=', $user);

        if($query->num_rows() > 0)
        {
             return $query->result_array();
        }
    }

    function baris_tanggapan($row){
        $user = $this->session->userdata('username');

        $this->db->join('pesan', 'komentar.id_pesan_komentar = pesan.id_pesan');
        $this->db->order_by("id_komentar", "desc");
        $this->db->where('penulis =', $user);
        $this->db->where('komentator !=', $user);
        //$this->db->order_by("id_komentator", "desc");
        $query=$this->db->get('komentar',10,$row);


        if($query->num_rows()>0){

        // return result set as an associative array

        return $query->result_array();

        }
    }

    function jumlah_tanggapan(){
        $user = $this->session->userdata('username');

        $this->db->join('pesan', 'komentar.id_pesan_komentar = pesan.id_pesan');
        $this->db->order_by("id_komentar", "desc");
        $this->db->where('penulis =', $user);
        $this->db->where('komentator !=', $user);
        $this->db->from('komentar');


        return $this->db->count_all_results();
    }

    /*
     * Selanjutnya adalah function untuk tambah komentar
     */

    function berikan_komentar($data)
    {
        $this->db->insert('komentar', $data);
    }
}