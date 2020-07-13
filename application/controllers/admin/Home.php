<?php
#===================================================|
# Please DO NOT modify this information :			      |
#---------------------------------------------------|
# @Author 		: Susantokun
# @Date 		  : 2018-05-26T19:05:28+07:00
# @Email 		  : support@susantokun.com
# @Project 		: CodeIgniter
# @Filename 	: Home.php
# @Instagram 	: susantokun
# @Website 		: http://www.susantokun.com
# @Youtube 		: http://youtube.com/susantokun
# @Last modified time: 2018-05-27T04:36:55+07:00
#===================================================|

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
        $this->load->model('pemain_model');
        $this->load->model('menu_model');
        $this->load->model('titik_model');
        $this->load->model('posisi_model');
        $this->load->model('datamasukan_model');
        // $this->load->model('download_area_model');
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Dashboard | ' . $site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $data['pemain'] = $this->pemain_model->total_pemain();
        $data['menu'] = $this->menu_model->total_menu();
        $data['titik'] = $this->titik_model->total_titik();


        $data['dataMenu'] = $this->menu_model;
        $data['bobot_total_model'] = $this->menu_model;
        $data['pemainModel'] = $this->pemain_model;
        $data['point'] = $this->datamasukan_model;
        $data['posisi'] = $this->posisi_model->tampil_datanya();

        $this->template->load('alayout/template', 'admin/dashboard', $data);
    }
}
