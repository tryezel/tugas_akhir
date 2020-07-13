<?php

class Config extends MY_Controller
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
        $this->load->model('Config_model');
        $this->load->helper('url');
    }

    /*
     * Show artikel
     */
    function action()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Action | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );

        $data['data'] = $this->Config_model->semua_data();

        $this->template->load('alayout/template', 'admin/config/index', $data);
    }

    /*
     * Adding a new artikel
     */
    function tambah()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Action | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_action', 'Nama Action', 'required');
        if ($this->form_validation->run()) {

            $params = array(
                'nama_action' => $this->input->post('nama_action'),
            );
            $this->Config_model->input_data($params);
            redirect('admin/config/action');
        } else {
            $this->template->load('alayout/template', 'admin/config/add', $data);
        }
    }

    function edit($id_action)
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Edit Action | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['action'] = $this->Config_model->detail_data($id_action);
        $this->template->load('alayout/template', 'admin/config/edit', $data);
    }

    function update($id_action)
    {
        $data = array(
            'nama_action' => $this->input->post('nama_action'),
        );

        $this->Config_model->update_data($data, $id_action);
        redirect('admin/config/action');
    }

    function hapus($id)
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Action | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $action = $this->Config_model->detail_data($id);

        // check if the artikel exists before trying to delete it
        if (isset($action->id_action)) {
            $this->Config_model->hapus_data($action->id_action);
            redirect('admin/config/action');
        } else
            show_error('Data Artikel tidak ada');
    }


    function jurusan()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Jurusan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );

        $data['data'] = $this->Jurusan_model->semua_data();

        $this->template->load('alayout/template', 'admin/config/index_jurusan', $data);
    }

    function tambah_jurusan()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Jurusan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jurusan', 'Nama Jurusan', 'required');
        if ($this->form_validation->run()) {

            $params = array(
                'jurusan' => $this->input->post('jurusan'),
            );
            $this->Jurusan_model->input_data($params);
            redirect('admin/config/jurusan');
        } else {
            $this->template->load('alayout/template', 'admin/config/add_jurusan', $data);
        }
    }

    function edit_jurusan($id_jurusan)
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Edit Jurusan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['jurusan'] = $this->Jurusan_model->detail_data($id_jurusan);
        $this->template->load('alayout/template', 'admin/config/edit_jurusan', $data);
    }

    function update_jurusan($id_jurusan)
    {
        $data = array(
            'jurusan' => $this->input->post('jurusan'),
        );

        $this->Jurusan_model->update_data($data, $id_jurusan);
        redirect('admin/config/jurusan');
    }

    function hapus_jurusan($id)
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Jurusan | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $jurusan = $this->Jurusan_model->detail_data($id);

        // check if the artikel exists before trying to delete it
        if (isset($jurusan->id_jurusan)) {
            $this->Jurusan_model->hapus_data($jurusan->id_jurusan);
            redirect('admin/config/jurusan');
        } else
            show_error('Data tidak ada');
    }
}
