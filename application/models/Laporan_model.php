<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Laporan_model extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}

		function ambil_pemain($posisi)
		{
			$this->db->where('id_posisi', $posisi);
			return $this->db->get('pemain')->result();
		}

		function ambil_data($posisi, $bulan)
		{
            // // SELECT * FROM `data_masukan` WHERE id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = 2)
			// $this->db->where('id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = 2)', );
			return $this->db->query("SELECT * FROM `data_masukan` WHERE id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = $posisi) AND MONTH(tanggal) =  $bulan")->result();
        }

		function data_menu($posisi, $bulan)
		{
            // // SELECT * FROM `data_masukan` WHERE id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = 2)
			// $this->db->where('id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = 2)', );
			return $this->db->query("SELECT DISTINCT id_menu FROM `data_masukan` WHERE id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = $posisi) AND MONTH(tanggal) =  $bulan order by id_menu ASC")->result();
        }
		function id_pemain($posisi, $bulan)
		{
            // // SELECT * FROM `data_masukan` WHERE id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = 2)
			// $this->db->where('id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = 2)', );
			return $this->db->query("SELECT DISTINCT id_pemain FROM `data_masukan` WHERE id_pemain IN (SELECT id_pemain FROM pemain WHERE id_posisi = $posisi) AND MONTH(tanggal) =  $bulan order by id_pemain ASC")->result();
        }

		function ambil_bobot($posisi, $bulan)
		{
            $this->db->where('id_posisi', $posisi);
            $this->db->where('MONTH(tanggal)',  $bulan);
			return $this->db->get("menu_latihan")->result();
        }
		function jumlah_titik($posisi, $bulan)
		{
            // $this->db->where('id_posisi', $posisi);
			return $this->db->query("SELECT COUNT(id_titik) AS jumlah_titik FROM menu_latihan WHERE id_posisi = $posisi AND MONTH(tanggal) =  $bulan")->result_array();
        }
		function sum_bobot($posisi, $bulan)
		{
			
			return $this->db->query("SELECT SUM(bobot) AS sum_bobot FROM menu_latihan WHERE id_posisi = $posisi AND MONTH(tanggal) =  $bulan")->result_array();
        }

        function max($id_menu, $bulan)
        {

            return $this->db->query("SELECT MAX(point) AS pointmax, id_menu FROM `data_masukan` where id_menu = $id_menu AND MONTH(tanggal) =  $bulan")->result_array();
        }

        function min($id_menu, $bulan)
        {
            return $this->db->query("SELECT MIN(point) AS pointmin, id_menu FROM `data_masukan` where id_menu = $id_menu AND MONTH(tanggal) =  $bulan")->result_array();
        }
    }
?>