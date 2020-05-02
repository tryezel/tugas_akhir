<?php

class Datamasukan_model extends CI_Model
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
    //         data_masukan.*,
    //         pemain.*,
    //         data_masukan.*,
    //         ');
    //     $this->db->join('pemain', 'data_masukan.id_pemain = pemain.id_pemain');
    //     $this->db->join('data_masukan', 'data_masukan.id_menu = data_masukan.id_menu');
    //     $this->db->from('data_masukan');
    //     $this->db->order_by('id_data', 'asc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    function detail_perposisi($param)
    {
        if (isset($param['bulan'])) {
            $this->db->where('MONTH(data_masukan.tanggal)', $param['bulan']);
        }
        if (!empty($param['id_posisi'])) {
            $this->db->where('data_masukan.id_menu', $param['id_posisi']);
        }
        if (isset($param['tahun'])) {
            $this->db->where('YEAR(data_masukan.tanggal)', $param['tahun']);
        }

        $this->db->select('
            pemain.nama_pemain
            ');
        $this->db->join('pemain', 'data_masukan.id_pemain = pemain.id_pemain');
        $this->db->from('data_masukan');
        $query =  $this->db->get();
        return $query->result();
    }

    function detail_data($param)
    {
        if (isset($param['bulan'])) {
            $this->db->where('MONTH(data_masukan.tanggal)', $param['bulan']);
        }
        if (!empty($param['id_pemain'])) {
            $this->db->where('data_masukan.id_pemain', $param['id_pemain']);
        }
        if (!empty($param['id_menu'])) {
            $this->db->where('data_masukan.id_menu', $param['id_menu']);
        }
        if (isset($param['tahun'])) {
            $this->db->where('YEAR(data_masukan.tanggal)', $param['tahun']);
        }

        $this->db->select('
            data_masukan.*
            ');
        $this->db->join('titik_lapangan', 'data_masukan.id_menu = titik_lapangan.id_titik');
        $this->db->order_by('titik_lapangan.titik_lapangan', 'asc');
        $this->db->from('data_masukan');
        $query =  $this->db->get();
        return $query->result();
    }

    function get_min($param)
    {
        if (isset($param['bulan'])) {
            $this->db->where('MONTH(data_masukan.tanggal)', $param['bulan']);
        }
        if (!empty($param['id_menu'])) {
            $this->db->where('data_masukan.id_menu', $param['id_menu']);
        }
        if (isset($param['tahun'])) {
            $this->db->where('YEAR(data_masukan.tanggal)', $param['tahun']);
        }
        $this->db->select_min('point');
        $query =  $this->db->get('data_masukan')->row();
        return $query->point;
    }

    function get_max($param)
    {
        if (isset($param['bulan'])) {
            $this->db->where('MONTH(data_masukan.tanggal)', $param['bulan']);
        }
        if (!empty($param['id_menu'])) {
            $this->db->where('data_masukan.id_menu', $param['id_menu']);
        }
        if (isset($param['tahun'])) {
            $this->db->where('YEAR(data_masukan.tanggal)', $param['tahun']);
        }
        $this->db->select_max('point');
        $query =  $this->db->get('data_masukan')->row();
        return $query->point;
    }

    function cek($param)
    {
        if (isset($param['bulan'])) {
            $this->db->where('MONTH(data_masukan.tanggal)', $param['bulan']);
        }
        if (!empty($param['id_pemain'])) {
            $this->db->where('data_masukan.id_pemain', $param['id_pemain']);
        }
        if (!empty($param['point'])) {
            $this->db->where('data_masukan.point', $param['point']);
        }
        if (!empty($param['id_menu'])) {
            $this->db->where('data_masukan.id_menu', $param['id_menu']);
        }
        if (isset($param['tahun'])) {
            $this->db->where('YEAR(data_masukan.tanggal)', $param['tahun']);
        }

        $this->db->select('
            data_masukan.*
            ');
        $this->db->from('data_masukan');
        $query =  $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }



    // function detail_front($link)
    // {
    //     $query =  $this->db->get_where($this->table, array('link' => $link));
    //     return $query->row();
    // }

    // function input_data($data)
    // {
    //     $this->db->insert($this->table, $data);
    // }

    // function total_pemain()
    // {
    //     $this->db->from('pemain');
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
