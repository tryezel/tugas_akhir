<?php

class Laporan extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
        $this->load->model('auth_model');
        $this->load->model('Menu_model');
        $this->load->model('Posisi_model');
        $this->load->model('Datamasukan_model');
        $this->load->model('Titik_model');
        $this->load->model('Pemain_model');
        $this->load->helper('url');
    }

    /*
     * Show artikel
     */
    function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => ' Laporan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();

        $param['bulan']  = $this->input->get('bulan');
        $param['tahun']  = $this->input->get('tahun');
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');

        if (empty($param['bulan'])) {
            $param['bulan'] = date('m');
            $data['bulan'] = date('m');
        }
        if (empty($param['tahun'])) {
            $param['tahun'] = date('Y');
            $data['tahun'] = date('Y');
        }
        if (!empty($this->input->get('id_posisi'))) {
            $param['id_posisi'] = $this->input->get('id_posisi');
        }

        $data['data'] = $this->Menu_model->semua_data($param);
        $data['bobot_total'] = $this->Menu_model->total_bobot($param);
        $data['pemain'] = $this->Pemain_model->semua_data($param);
        $data['point'] = $this->Datamasukan_model;

        $this->template->load('alayout/template', 'admin/laporan/rev', $data);
    }

    function detail_laki()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => ' Laporan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();

        $param['bulan']  = $this->input->get('bulan');
        $param['tahun']  = $this->input->get('tahun');
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');


        $param['id_posisi'] = $this->input->get('id_posisi');


        $data['data'] = $this->Menu_model->semua_data($param);
        $data['bobot_total'] = $this->Menu_model->total_bobot($param);
        $data['pemain'] = $this->Pemain_model->data_laki($param);
        $data['point'] = $this->Datamasukan_model;

        $this->template->load('alayout/template', 'admin/laporan/detail_laki', $data);
    }

    function index_laki()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => ' Laporan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();

        $param['bulan']  = $this->input->get('bulan');
        $param['tahun']  = $this->input->get('tahun');
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');

        if (empty($param['bulan'])) {
            $param['bulan'] = date('m');
            $data['bulan'] = date('m');
        }
        if (empty($param['tahun'])) {
            $param['tahun'] = date('Y');
            $data['tahun'] = date('Y');
        }
        if (!empty($this->input->get('id_posisi'))) {
            $param['id_posisi'] = $this->input->get('id_posisi');
        }

        $data['data'] = $this->Menu_model->semua_data($param);
        $data['bobot_total'] = $this->Menu_model->total_bobot($param);
        $data['pemain'] = $this->Pemain_model->data_laki($param);
        $data['point'] = $this->Datamasukan_model;


        $this->template->load('alayout/template', 'admin/laporan/index_laki', $data);
    }

    function periode_laki()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => ' Laporan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();

        $param['bulan']  = $this->input->get('bulan');
        $param['tahun']  = $this->input->get('tahun');
        $data['bulan']   = $this->input->get('bulan');
        $data['bulanAkhir']  = $this->input->get('bulanAkhir');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');

        if (empty($param['bulan'])) {
            $param['bulan'] = date('m');
            $data['bulan'] = 01;
        }
        if (empty($param['bulanAkhir'])) {
            $data['bulanAkhir'] = date('m');
        }
        if (empty($param['tahun'])) {
            $param['tahun'] = date('Y');
            $data['tahun'] = date('Y');
        }
        if (!empty($this->input->get('id_posisi'))) {
            $param['id_posisi'] = $this->input->get('id_posisi');
        }

        $data['dataMenu'] = $this->Menu_model;
        $data['bobot_total_model'] = $this->Menu_model;
        $data['pemain'] = $this->Pemain_model->data_laki($param);
        $data['point'] = $this->Datamasukan_model;

        $this->template->load('alayout/template', 'admin/laporan/periode_laki', $data);
    }

    function detail_cewek()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => ' Laporan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();

        $param['bulan']  = $this->input->get('bulan');
        $param['tahun']  = $this->input->get('tahun');
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');


        $param['id_posisi'] = $this->input->get('id_posisi');


        $data['data'] = $this->Menu_model->semua_data($param);
        $data['bobot_total'] = $this->Menu_model->total_bobot($param);
        $data['pemain'] = $this->Pemain_model->data_cewek($param);
        $data['point'] = $this->Datamasukan_model;

        $this->template->load('alayout/template', 'admin/laporan/detail_laki', $data);
    }

    function index_cewek()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => ' Laporan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();

        $param['bulan']  = $this->input->get('bulan');
        $param['tahun']  = $this->input->get('tahun');
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');

        if (empty($param['bulan'])) {
            $param['bulan'] = date('m');
            $data['bulan'] = date('m');
        }
        if (empty($param['tahun'])) {
            $param['tahun'] = date('Y');
            $data['tahun'] = date('Y');
        }
        if (!empty($this->input->get('id_posisi'))) {
            $param['id_posisi'] = $this->input->get('id_posisi');
        }

        $data['data'] = $this->Menu_model->semua_data($param);
        $data['bobot_total'] = $this->Menu_model->total_bobot($param);
        $data['pemain'] = $this->Pemain_model->data_cewek($param);
        $data['point'] = $this->Datamasukan_model;

        $this->template->load('alayout/template', 'admin/laporan/index_cewek', $data);
    }

    function periode_cewek()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => ' Laporan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();

        $param['bulan']  = $this->input->get('bulan');
        $param['tahun']  = $this->input->get('tahun');
        $data['bulan']   = $this->input->get('bulan');
        $data['bulanAkhir']  = $this->input->get('bulanAkhir');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');

        if (empty($param['bulan'])) {
            $param['bulan'] = date('m');
            $data['bulan'] = date('m', strtotime('-3 months'));
        }
        if (empty($param['tahun'])) {
            $param['tahun'] = date('Y');
            $data['tahun'] = date('Y');
        }
        if (!empty($this->input->get('id_posisi'))) {
            $param['id_posisi'] = $this->input->get('id_posisi');
        }

        $data['dataMenu'] = $this->Menu_model;
        $data['bobot_total_model'] = $this->Menu_model;
        $data['pemain'] = $this->Pemain_model->data_cewek($param);
        $data['point'] = $this->Datamasukan_model;

        $this->template->load('alayout/template', 'admin/laporan/periode_cewek', $data);
    }
}
