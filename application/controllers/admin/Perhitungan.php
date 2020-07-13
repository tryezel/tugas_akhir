<?php

class Perhitungan extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
        $this->load->model('auth_model');
        $this->load->model('Perhitungan_model');
        $this->load->model('Pemain_model');
        $this->load->model('Posisi_model');
        $this->load->model('Titik_model');
        $this->load->model('Datamasukan_model');
        $this->load->helper('url');
    }

    /*
     * Show artikel
     */
    function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perhitungan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');

        if (empty($data['bulan'])) {
            $data['bulan'] = date('m');
        }
        if (empty($data['tahun'])) {
            $data['tahun'] = date('Y');
        }
        $param['id_posisi'] = $this->input->get('id_posisi');
        $param['gender'] = $this->input->get('gender');
        $data['data'] = $this->Pemain_model->semua_data($param);

        $this->template->load('alayout/template', 'admin/perhitungan/index', $data);
    }

    function index_laki()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perhitungan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');

        if (empty($data['bulan'])) {
            $data['bulan'] = date('m');
        }
        if (empty($data['tahun'])) {
            $data['tahun'] = date('Y');
        }
        $param['id_posisi'] = $this->input->get('id_posisi');
        $param['gender'] = $this->input->get('gender');
        $data['data'] = $this->Pemain_model->data_laki($param);

        $this->template->load('alayout/template', 'admin/perhitungan/index_laki', $data);
    }

    function index_cewek()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perhitungan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $data['id_posisi'] = $this->input->get('id_posisi');

        if (empty($data['bulan'])) {
            $data['bulan'] = date('m');
        }
        if (empty($data['tahun'])) {
            $data['tahun'] = date('Y');
        }
        $param['id_posisi'] = $this->input->get('id_posisi');
        $param['gender'] = $this->input->get('gender');
        $data['data'] = $this->Pemain_model->data_cewek($param);

        $this->template->load('alayout/template', 'admin/perhitungan/index_cewek', $data);
    }

    /*
     * Adding a new artikel
    //  */
    // function tambah()
    // {
    //     $site = $this->Konfigurasi_model->listing();
    //     $data = array(
    //         'title'                 => 'Menu Latihan | ' . $site['nama_website'],
    //         'favicon'               => $site['favicon'],
    //         'site'                  => $site,
    //     );
    //     $data['posisinya'] = $this->Posisi_model->tampil_datanya();
    //     $data['titiknya'] = $this->Titik_model->tampil_datanya();
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('bobot', 'Bobot', 'required');
    //     $this->form_validation->set_rules('repetisi', 'Repetisi', 'required');
    //     if ($this->form_validation->run()) {
    //         date_default_timezone_set('ASIA/JAKARTA');
    //         $params = array(
    //             'id_titik' => $this->input->post('id_titik'),
    //             'id_posisi' => $this->input->post('id_posisi'),
    //             'bobot' => $this->input->post('bobot'),
    //             'repetisi' => $this->input->post('repetisi'),
    //             'tanggal' => date('Y-m-d'),
    //         );

    //         $this->Menu_model->input_data($params);
    //         redirect('admin/menu');
    //     } else {
    //         $this->template->load('alayout/template', 'admin/menu/add', $data);
    //     }
    // }

    function edit($id)
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Edit Menu Latihan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $param['bulan']  = $this->input->get('bulan');
        $param['tahun']  = $this->input->get('tahun');
        $data['bulan']   = $this->input->get('bulan');
        $data['tahun'] = $this->input->get('tahun');
        $param['id_pemain'] = $id;

        if (empty($param['bulan'])) {
            $param['bulan'] = date('m');
            $data['bulan'] = date('m');
        }
        if (empty($param['tahun'])) {
            $param['tahun'] = date('Y');
            $data['tahun'] = date('Y');
        }

        $data['data'] = $this->Pemain_model->detail_data($id);
        $data['isi_menu'] = $this->Datamasukan_model;
        $param['id_posisi'] =  $this->Pemain_model->detail_data($id)->id_posisi;
        $data['menu'] = $this->Perhitungan_model->detail_data($param);
        $this->template->load('alayout/template', 'admin/perhitungan/edit', $data);
    }

    function simpan()
    {
        $id_posisi = $this->input->post('id_posisi');
        $id_pemain = $this->input->post('id_pemain');
        $gender = $this->input->post('gender');
        $id_menu = $this->input->post('id_menu[]');
        $point = $this->input->post('point[]');

        foreach ($id_menu as $key => $v) {

            $data = array(
                'point' => $point[$key],
                'id_pemain' => $id_pemain,
                'id_menu' => $id_menu[$key],
                'tanggal' => date('Y-m-d'),
            );

            if ($point[$key] != '')
                $this->Perhitungan_model->input_data($data);
        }
        if ($gender == 'l') {
            redirect('admin/perhitungan/index_laki?id_posisi=' . $id_posisi);
        }
        if ($gender == 'p') {
            redirect('admin/perhitungan/index_cewek?id_posisi=' . $id_posisi);
        }
    }

    // function update($id_menu)
    // {
    //     $data = array(
    //         'id_titik' => $this->input->post('id_titik'),
    //         'id_posisi' => $this->input->post('id_posisi'),
    //         'bobot' => $this->input->post('bobot'),
    //         'repetisi' => $this->input->post('repetisi'),
    //         'tanggal' => date('Y-m-d'),
    //     );

    //     $this->Menu_model->update_data($data, $id_menu);
    //     redirect('admin/menu/index/');
    // }

    // function hapus($id)
    // {
    //     $site = $this->Konfigurasi_model->listing();
    //     $data = array(
    //         'title'                 => 'Data Pemain | ' . $site['nama_website'],
    //         'favicon'               => $site['favicon'],
    //         'site'                  => $site,
    //     );
    //     $pemain = $this->Pemain_model->detail_data($id);

    //     // check if the artikel exists before trying to delete it
    //     if (isset($pemain->id_pemain)) {
    //         $this->Pemain_model->hapus_data($pemain->id_pemain);
    //         redirect('admin/pemain/index');
    //     } else
    //         show_error('Data Artikel tidak ada');
    // }
}
