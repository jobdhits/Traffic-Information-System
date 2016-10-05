<?php

class Admin_berandam extends CI_Model{

    function  __construct() {
        parent::__construct();
        
    }
function ambil_provinsi()
{
    $this->db->order_by("id_provinsi", "asc");
    $query = $this->db->get('provinsi');

    if($query->num_rows() > 0)
    {
         return $query->result();
            $data[] = $row;
    }
}

function ambil_rute()
{
    $this->db->order_by("id_rute", "asc");

    $this->db->limit(5);
    $query = $this->db->get('rute');

    if($query->num_rows() > 0)
    {
         return $query->result();
            $data[] = $row;
    }
}

function ambil_anggota_5()
{
    $this->db->order_by("id_anggota", "desc");
    $this->db->where('usertype !=', 'admin');
    $this->db->limit(5);
    $query = $this->db->get('anggota');

    if($query->num_rows() > 0)
    {
         return $query->result();
            $data[] = $row;
    }
}

function ambil_pesan_5()
{
    $this->db->order_by("id_pesan", "desc");
    $this->db->limit(5);
    $query = $this->db->get('pesan');

    if($query->num_rows() > 0)
    {
         return $query->result();
            $data[] = $row;
    }
}

function ambil_komentar_5()
{
    $this->db->order_by("id_komentar", "desc");
    $this->db->limit(5);
    $query = $this->db->get('komentar');

    if($query->num_rows() > 0)
    {
         return $query->result();
            $data[] = $row;
    }
}

    /*
     * PAGINATION
     * Setelah fungsi diatas fungsi berikut ini untuk mengambil semua pesan
     * dan memnghitung semua jumlahnya.
     */

    function ambil_semua_pesan(){
        $this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
        $this->db->order_by("id_pesan", "desc");
  
        if($query->num_rows() > 0)
        {
             return $query->result_array();
        }
    }

    function baris_pesan($row){

        $this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
        $this->db->order_by("id_pesan", "desc");
        $query=$this->db->get('pesan',10,$row);


        if($query->num_rows()>0){

        // return result set as an associative array

        return $query->result_array();

        }
    }

    function jumlah_pesan(){
        $this->db->join('rute', 'pesan.rute_pesan = rute.id_rute');
        $this->db->order_by("id_pesan", "desc");
        $this->db->from('pesan');


        return $this->db->count_all_results();
    }

    function perbaharui_profil($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
    }

    function ambil_profil($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        $query = $this->db->get('anggota');

        if($query->num_rows() > 0)
        {
            $row = $query ->row();
            return $row;
        }
    }
       /*
     * Setelah fungsi diatas fungsi berikut ini untuk mengambil semua rute
     * dan memnghitung semua jumlahnya.
     */

     /*
     * Semua anggota
     */

     function ambil_semua_rute(){

         $query = $this->db->get('rute');

        if($query->num_rows() > 0)
        {
             return $query->result_array();
        }
    }

    function baris_rute($row){

        $query = $this->db->get('rute',10,$row);


        if($query->num_rows()>0){

        // return result set as an associative array

        return $query->result_array();

        }
    }

    function jumlah_rute(){

         $this->db->select('*');
        $this->db->from('rute');


        return $this->db->count_all_results();
    }

    /*
     * Semua komentar dan pesan dari anggota
     * pagination
     */

    function ambil_semua_komentar(){
//        $user = $this->session->userdata('username');
//
//        $this->db->where('komentator =', $user);
         $query = $this->db->get('komentar');

        if($query->num_rows() > 0)
        {
             return $query->result_array();
        }
    }

    function baris_komentar($row){

        $query = $this->db->get('komentar',10,$row);


        if($query->num_rows()>0){

        // return result set as an associative array

        return $query->result_array();

        }
    }

    function jumlah_komentar(){

        $this->db->select('*');
        $this->db->from('komentar');

        return $this->db->count_all_results();
    }

    /*
     * Semua anggota
     */

     function ambil_semua_anggota(){
         
         $query = $this->db->get('anggota');

        if($query->num_rows() > 0)
        {
             return $query->result_array();
        }
    }

    function baris_anggota($row){
        
        $query = $this->db->get('anggota',10,$row);


        if($query->num_rows()>0){

        // return result set as an associative array

        return $query->result_array();

        }
    }

    function jumlah_anggota(){

         $this->db->select('*');
        $this->db->from('anggota');


        return $this->db->count_all_results();
    }

}

