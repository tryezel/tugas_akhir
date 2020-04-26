<?php

class Pemain extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
        $this->load->model('auth_model');
        $this->load->model('Pemain_model');
        $this->load->model('Posisi_model');
        $this->load->model('Jurusan_model');
        $this->load->helper('url');
    }

    /*
     * Show artikel
     */
    function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Pemain | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();
        $data['id_posisi'] = $this->input->get('id_posisi');

        $param['id_posisi'] = $this->input->get('id_posisi');
        $data['data'] = $this->Pemain_model->semua_data($param);


        $this->template->load('alayout/template', 'admin/pemain/index', $data);
    }

    /*
     * Adding a new artikel
     */
    function tambah()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Pemain | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();
        $data['jurusannya'] = $this->Jurusan_model->tampil_data();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_pemain', 'Nama Pemain', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        if ($this->form_validation->run()) {

            $params = array(
                'id_posisi' => $this->input->post('id_posisi'),
                'id_jurusan' => $this->input->post('id_jurusan'),
                'nama_pemain' => $this->input->post('nama_pemain'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'tinggi'      => $this->input->post('tinggi'),
                'berat_badan' => $this->input->post('berat_badan'),
                'nim' => $this->input->post('nim'),
            );

            $this->Pemain_model->input_data($params);
            redirect('admin/pemain');
        } else {
            $this->template->load('alayout/template', 'admin/pemain/add', $data);
        }
    }

    function edit($id_pemain)
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Edit Data Pemain | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['posisinya'] = $this->Posisi_model->tampil_datanya();
        $data['jurusannya'] = $this->Jurusan_model->tampil_data();
        $data['pemain'] = $this->Pemain_model->detail_data($id_pemain);
        $this->template->load('alayout/template', 'admin/pemain/edit', $data);
    }

    function update($id_pemain)
    {
        $data = array(
            'id_posisi' => $this->input->post('id_posisi'),
            'id_jurusan' => $this->input->post('id_jurusan'),
            'nama_pemain' => $this->input->post('nama_pemain'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tinggi'      => $this->input->post('tinggi'),
            'berat_badan' => $this->input->post('berat_badan'),
            'nim' => $this->input->post('nim'),
        );

        $this->Pemain_model->update_data($data, $id_pemain);
        redirect('admin/pemain/index/');
    }

    function hapus($id)
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Pemain | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $pemain = $this->Pemain_model->detail_data($id);

        // check if the artikel exists before trying to delete it
        if (isset($pemain->id_pemain)) {
            $this->Pemain_model->hapus_data($pemain->id_pemain);
            redirect('admin/pemain/index');
        } else
            show_error('Data Artikel tidak ada');
    }
}
