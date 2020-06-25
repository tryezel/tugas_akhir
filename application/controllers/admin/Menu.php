<?php

class Menu extends MY_Controller
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
        $this->load->model('Action_model');
        $this->load->model('Titik_model');
        $this->load->helper('url');
    }

    /*
     * Show artikel
     */
    function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Menu Latihan | ' . $site['nama_website'],
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

        $this->template->load('alayout/template', 'admin/menu/index', $data);
    }

    /*
     * Adding a new artikel
    //  */
    function tambah()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Menu Latihan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();
        $data['actionnya'] = $this->Action_model->tampil_datanya();
        $data['titiknya'] = $this->Titik_model->tampil_datanya();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');
        $this->form_validation->set_rules('repetisi', 'Repetisi', 'required');
        if ($this->form_validation->run()) {
            date_default_timezone_set('ASIA/JAKARTA');
            $params = array(
                'id_titik' => $this->input->post('id_titik'),
                'id_action' => $this->input->post('id_action'),
                'id_posisi' => $this->input->post('id_posisi'),
                'bobot' => $this->input->post('bobot'),
                'repetisi' => $this->input->post('repetisi'),
                'tanggal' => date('Y-m-d'),
            );

            $this->Menu_model->input_data($params);
            redirect('admin/menu');
        } else {
            $this->template->load('alayout/template', 'admin/menu/add', $data);
        }
    }

    function edit($id_menu)
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Edit Menu Latihan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();
        $data['actionnya'] = $this->Action_model->tampil_datanya();
        $data['titiknya'] = $this->Titik_model->tampil_datanya();
        $data['menu'] = $this->Menu_model->detail_data($id_menu);
        $this->template->load('alayout/template', 'admin/menu/edit', $data);
    }

    function update($id_menu)
    {
        $data = array(
            'id_titik' => $this->input->post('id_titik'),
            'id_action' => $this->input->post('id_action'),
            'id_posisi' => $this->input->post('id_posisi'),
            'bobot' => $this->input->post('bobot'),
            'repetisi' => $this->input->post('repetisi'),
            'tanggal' => date('Y-m-d'),
        );

        $this->Menu_model->update_data($data, $id_menu);
        redirect('admin/menu/index/');
    }

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
