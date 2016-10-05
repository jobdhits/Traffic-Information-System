<?php

class Pesanm extends CI_Model{

    function  __construct() {
        parent::__construct();
    }

    function tambah($data)
    {
        $this->db->insert('pesan', $data);
    }

     function perbaharui($id_pesan, $data)
    {
        $user = $this->session->userdata('username');
        $this->db->where('penulis =',  $user);
        $this->db->where('id_pesan', $id_pesan);
        $this->db->update('pesan', $data);
    }

     function perbaharui_oleh_admin($id_pesan, $data)
    {
        $user = $this->session->userdata('username');
        //$this->db->where('penulis =',  $user);
        $this->db->where('id_pesan', $id_pesan);
        $this->db->update('pesan', $data);
    }

    function hapus($id_pesan)
    {
        $user = $this->session->userdata('username');
        $this->db->where('penulis =',  $user);
        $this->db->where('id_pesan', $id_pesan);
        $this->db->delete('pesan');
    }

    function hapus_oleh_admin($id_pesan)
    {
        $this->db->where('id_pesan', $id_pesan);
        $this->db->delete('pesan');
    }

    function hapus_profil_oleh_admin($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->delete('anggota');
    }

    function hapus_komentar_oleh_admin($id_komentar)
    {
        $this->db->where('id_komentar', $id_komentar);
        $this->db->delete('komentar');
    }


    function ambil_pesan($id_pesan)
    {
        $this->db->where('id_pesan', $id_pesan);
        $q = $this->db->get('pesan');
        if($q->num_rows() > 0)
        {
            $row = $q->row();
            return $row;
        }
    }

}