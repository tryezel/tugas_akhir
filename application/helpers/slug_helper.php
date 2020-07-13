<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function paging($controller = '', $total_rows = '', $limit = '', $uri = '')
{
    $CI = &get_instance();
    $CI->load->library('pagination');

    $config['base_url']     = site_url($controller);
    $config['total_rows']     = $total_rows;
    $config['per_page']     = $limit;

    $config['first_url']     = site_url($controller);

    // TAMBAHAN PENTING
    $suffix              = http_build_query($_GET, '', "&");
    $config['suffix']      = '?' . $suffix;
    $config['first_url'] = site_url($controller . '?' . $suffix);
    // TAMBAHAN PENTING

    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']     = '<span class="sr-only">(current)</span></span></li>';
    // $this->load->library('pagination');

    $config['full_tag_open']     = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']     = '</ul></nav></div>';
    $config['first_link']         = 'Awal';
    $config['first_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['first_tag_close']     = '</span></li>';
    $config['last_link']         = 'Akhir';
    $config['last_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['last_tag_close']     = '</span></li>';
    $config['next_link']         = '&gt;';
    $config['next_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close']     = '<span aria-hidden="true"></span></span></li>';
    $config['prev_link']         = '&lt;';
    $config['prev_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close']     = '</li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']     = '<span class="sr-only">(current)</span></span></li>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']     = '</span></li>';

    $CI->pagination->initialize($config);

    return $CI->pagination->create_links();
}

function show_msg($content = '', $type = 'success', $icon = 'fa-info-circle', $size = '14px')
{
    if ($content != '') {
        return  '<p class="box-msg">
          <div class="info-box alert-' . $type . '">
          <div class="info-box-icon">
          <i class="fa ' . $icon . '"></i>
          </div>
          <div class="info-box-content" style="font-size:' . $size . '">
          ' . $content
            . '</div>
          </div>
          </p>';
    }
}

function show_succ_msg($content = '', $size = '14px')
{
    if ($content != '') {
        return   '<p class="box-msg">
          <div class="info-box alert-success">
          <div class="info-box-icon">
          <i class="fa fa-check-circle"></i>
          </div>
          <div class="info-box-content" style="font-size:' . $size . '">
          <b style="font-size: 20px">SUKSES</b><br> ' . $content
            . '</div>
          </div>
          </p>';
    }
}

function show_err_msg($content = '', $size = '14px')
{
    if ($content != '') {
        return   '<p class="box-msg">
          <div class="info-box alert-error">
          <div class="info-box-icon">
          <i class="fa fa-warning"></i>
          </div>
          <div class="info-box-content" style="font-size:' . $size . '">
          ' . $content
            . '</div>
          </div>
          </p>';
    }
}

function show_err_form_msg($content = '', $size = '14px')
{
    if ($content != '') {
        return   '<div class="box-body" style="text-align:center">
          <div class="alert alert-danger alert-dismissible">'
            . $content .
            '</div>
          </div>';
    }
}


function tgl($date)
{
    /* ARRAY u/ hari dan bulan */
    $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",);
    $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    /* Memisahkan format tanggal bulan dan tahun menggunakan substring */
    $tahun      = substr($date, 0, 4);
    $bulan      = substr($date, 5, 2);
    $tgl     = substr($date, 8, 2);
    $waktu     = substr($date, 11, 5);
    $hari     = date("w", strtotime($date));

    $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int) $bulan - 1] . " " . $tahun . " " . $waktu . " WIB";
    return $result;
}
/* by RioBermano.Com */


function alert($class, $title, $description)
{
    return '<div class="alert ' . $class . ' alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> ' . $title . '</h4>
      ' . $description . '
      </div>';
}

function bulan_indonesia($index = '')
{
    $list = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );
    if (!empty($index)) {
        return $list[$index];
    } else {
        return $list;
    }
}

function bulan_indonesia_2($index = '')
{
    $list = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );
    if (!empty($index)) {
        return $list[$index];
    } else {
        return $list;
    }
}

function nomor_bulan($bulan)
{
    if ($bulan == 1) {
        return 'Januari';
    }

    if ($bulan == 2) {
        return 'Februari';
    }

    if ($bulan == 3) {
        return 'Maret';
    }

    if ($bulan == 4) {
        return 'April';
    }

    if ($bulan == 5) {
        return 'Mei';
    }

    if ($bulan == 6) {
        return 'Juni';
    }

    if ($bulan == 7) {
        return 'Juli';
    }

    if ($bulan == 8) {
        return 'Agustus';
    }

    if ($bulan == 9) {
        return 'September';
    }

    if ($bulan == 10) {
        return 'Oktober';
    }

    if ($bulan == 11) {
        return 'November';
    }

    if ($bulan == 12) {
        return 'Desember';
    }
}

function opt_tahun($start = 1990)
{
    $result = array();
    for ($start; $start <= date('Y'); $start++) {
        $result[$start] = $start;
    }
    return $result;
}

function utility($param)
{
    $CI = get_instance();
    $CI->load->model('Datamasukan_model');
    $min = $CI->Datamasukan_model->get_min($param);
    $max = $CI->Datamasukan_model->get_max($param);
    $hasil = ($param['point'] - $min) / ($max - $min);
    return $hasil;
}
function normalisasi($bobot, $total)
{
    return $bobot / $total;
}

if (!function_exists('dump')) {
    function dump($var, $show = TRUE, $exit = FALSE)
    {

        // Add formatting
        echo '<pre>';
        die(var_dump($var));
        echo '</pre>';

        // Output
        if ($show == TRUE) {
            echo $output;
        } else {
            return $output;
        }

        //exit ?
        if ($exit == TRUE) {
            exit;
        }
    }
}
