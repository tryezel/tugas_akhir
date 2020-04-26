<?php

class Perhitungan_model extends CI_Model
{
    private $table = 'data_masukan';
    private $id = 'data_masukan.id_data';


    function __construct()
    {
        $this->table = "data_masukan";
        parent::__construct();
    }

    // function data($number,$offset){
    //     $this->db->select('
    //     artikel.*, kategori_artikel.id_kategori AS id_kategori, kategori_artikel.kategori_artikel
    //     ');
    //      $this->db->select('
    //     artikel.*, user.id_user AS id_user, user.nama');
    //     $this->db->join('user', 'artikel.id_user = user.id_user');
    //     $this->db->join('kategori_artikel', 'artikel.id_kategori = kategori_artikel.id_kategori');
    //     return $query = $this->db->get('artikel',$number,$offset)->result();	

    // }

    // function get_data($filter = array())
    // {
    // 	if(!empty($filter))
    // 	{
    // 		if(!empty($filter['limit']))
    // 		{
    // 			if(!empty($filter['offset']))
    // 			{
    // 				$this->db->limit($filter['limit'], $filter['offset']);
    // 			}
    // 			else
    // 			{
    // 				$this->db->limit($filter['limit']);
    // 			}
    // 		}

    // 	}

    // 	$this->db->select('
    //         artikel.*, 
    //         kategori_artikel.id_kategori AS id_kategori, 
    //         kategori_artikel.kategori_artikel,
    //         user.id_user AS id_user, 
    //         user.nama
    //     ');
    //     $this->db->from('artikel');
    //     $this->db->join('user', 'artikel.id_user = user.id_user');
    //     $this->db->join('kategori_artikel', 'artikel.id_kategori = kategori_artikel.id_kategori');

    // 	$query = $this->db->get();
    // 	return $query;
    // }

    function jml_data()
    {
        $query = $this->db->get($this->table);
        $total = $query->num_rows();
        return $total;
    }



    // function semua_data($param)
    // {
    //     if (!empty($param['id_posisi'])) {
    //         $this->db->where('pemain.id_posisi', $param['id_posisi']);
    //     }
    //     $this->db->select('
    //         pemain.*,
    //         posisi.*,
    //         jurusan.*,
    //         ');
    //     $this->db->join('posisi', 'pemain.id_posisi = posisi.id_posisi');
    //     $this->db->join('jurusan', 'pemain.id_jurusan = jurusan.id_jurusan');
    //     $this->db->from('pemain');
    //     $this->db->order_by('id_pemain', 'asc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    function detail_data($param)
    {
        if (isset($param['bulan'])) {
            $this->db->where('MONTH(menu_latihan.tanggal)', $param['bulan']);
        }
        if (isset($param['tahun'])) {
            $this->db->where('YEAR(menu_latihan.tanggal)', $param['tahun']);
        }

        $this->db->select('
            menu_latihan.*,
            posisi.*,
            titik_lapangan.*,
            pemain.*,
            ');
        $this->db->join('posisi', 'menu_latihan.id_posisi = posisi.id_posisi');
        $this->db->join('titik_lapangan', 'menu_latihan.id_titik = titik_lapangan.id_titik');
        $this->db->join('pemain', 'posisi.id_posisi = pemain.id_posisi');
        $this->db->from('menu_latihan');
        $this->db->where('menu_latihan.id_posisi', $param['id_posisi']);
        $this->db->where('pemain.id_pemain', $param['id_pemain']);
        $query =  $this->db->get();
        return $query->result();
    }

    // function detail_front($link)
    // {
    //     $query =  $this->db->get_where($this->table, array('link' => $link));
    //     return $query->row();
    // }

    function input_data($data)
    {
        $this->db->insert($this->table, $data);
    }

    // function total_menu()
    // {
    //     $this->db->from('menu_latihan');
    //     $query = $this->db->get();
    //     if ($query->num_rows() > 0) {
    //         return $query->num_rows();
    //     } else {
    //         return 0;
    //     }
    // }

    function update_data($data, $id_data)
    {
        $this->db->where('id_data', $id_data);
        $this->db->update($this->table, $data);
    }

    // function hapus_data($id_data)
    // {
    //     $this->db->where('id_pemain', $id_data);
    //     $this->db->delete($this->table);
    // }
}
