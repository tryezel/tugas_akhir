<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Action_model extends CI_Model

{
    private $tabel = 'action';
    private $id_kategori = 'action.id_action';

    public function __construct()
    {
        $this->table = 'action';
        $this->primary_key = 'id_action';
        $this->protected = array('id_action');
        parent::__construct();
    }


    function tampil_datanya($number = NULL, $offset = NULL)
    {
        //ini untuk menampilkan kategori data
        $query = $this->db->get($this->table, $number, $offset);
        return $query->result();
    }

    // public function get_all_categories()
    // {
    //     $query = $this->db->query('SELECT artikel.id_artikel, kategori_artikel.*, COUNT( * ) as total FROM artikel
    //         JOIN kategori_artikel ON kategori_artikel.id_kategori = artikel.id_kategori WHERE artikel.konfirm2 != 0
    //         GROUP BY id_kategori');
    //     return $query->result();
    // }

    // function tampil_data()
    // {
    //     $this->db->select('*');
    //     $this->db->from('kategori_artikel');
    //     $this->db->order_by('id_kategori', 'asc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // function spesifik_data($id_kategori)
    // {
    //     $query = $this->db->get_where($this->table, array('id_kategori' => $id_kategori));
    //     return $query->row();
    // }

    // function input_data($data)
    // {
    //     $this->db->insert($this->table, $data);
    // }

    // function update_data($data, $id_kategori)
    // {
    //     $this->db->where('id_kategori', $id_kategori);
    //     $this->db->update($this->table, $data);
    // }

    // function hapus_data($id_kategori)
    // {
    //     $this->db->where('id_kategori', $id_kategori);
    //     $this->db->delete($this->table);
    // }
}
