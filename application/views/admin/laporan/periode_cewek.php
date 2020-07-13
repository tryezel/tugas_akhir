<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php

              use phpDocumentor\Reflection\Types\Null_;

              echo site_url('admin/home') ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Laporan</li>
</ol>

<div class="box">
  <div class="box-header">
    <h2 class="page-header" style="display: initial;">Laporan Pemain Perempuan</h2> <button class="btn btn-primary" style="float: right">Laporan Periode</button>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <hr>
    <form action="<?php echo site_url('admin/laporan/periode_cewek') ?>" method="get">
      <div class="col-md-2">
        <div class="form-group">
          <label>Bulan</label>
          <?= form_dropdown('bulan', bulan_indonesia(), $bulanAkhir, 'class="form-control"') ?>
          <center>-</center>
          <?= form_dropdown('bulanAkhir', bulan_indonesia(), $bulan, 'class="form-control"') ?>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>Tahun</label>
          <?= form_dropdown('tahun', opt_tahun(2015), $tahun, 'class="form-control"') ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Posisi</label>
          <select name="id_posisi" class="form-control">
            <option value="" <?php if (!empty($id_posisi)) {
                                echo 'selected';
                              } ?>>Semua</option>
            <?php foreach ($posisinya as $value) { ?>
              <option value="<?php echo $value->id_posisi ?>" <?php if ($id_posisi == $value->id_posisi) echo 'selected' ?>><?php echo $value->posisi ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>&nbsp;</label><br>
          <button class="btn btn-primary">Cari</button>
        </div>
      </div>

    </form>
    <br>
    <?php if (empty($id_posisi)) { ?>
      <!-- notif jika posisi belum terisi -->
  </div>
  <p class="box-msg">
    <div class="info-box alert-danger">
      <div class="info-box-icon">
        <i class="fa fa-info"></i>
      </div>
      <div class="info-box-content">
        <h4>
          Silahkan pilih Posisi Terlebih dahulu
        </h4>
      </div>
    </div>
  </p>
  <hr>

<?php } else { ?>

  <!-- Tampilan jika posisi terisi -->
  <?php
      // percobaaan
      // $params = array(
      //   'id_posisi' => $id_posisi,
      //   'bulan' => 5,
      //   'tahun' => $tahun,
      // );
      // $bulan5 = $dataMenu->semua_data($params);
      // if (empty($bulan5)) {
      //   $nilai = array();
      //   foreach ($pemain as $key => $value) {
      //     $nilai[$value->nama_pemain] = "0";
      //   }
      //   echo '<hr>';
      //   echo '<pre>';
      //   print_r($nilai);
      //   echo '</pre><hr>';
      // } else {
      //   echo '<hr>';
      //   echo '<pre>';
      //   print_r($bulan5);
      //   echo '</pre><hr>';
      // }

      foreach ($pemain as $key => $value) {
        $semua_nama_pemain[$key] = $value->nama_pemain;
      }
      $indexHasil = 0;
      $hasil_akhir = array();

      for ($i = $bulan; $i <= $bulanAkhir; $i++) {
        $params = array(
          'id_posisi' => $id_posisi,
          'bulan' => $i,
          'tahun' => $tahun,
        );

        $data = null;
        $bobot_total = Null;
        $hasil_akhir[$indexHasil]['bulan'] = nomor_bulan($i);

        $data = $dataMenu->semua_data($params);

        if (empty($data)) {
          foreach ($pemain as $key => $value) {
            $hasil_akhir[$indexHasil][$value->nama_pemain] = 0;
          }
        } else {
          $hasil_akhir[$indexHasil]['nama'] = "tes";

          $bobot_total = $bobot_total_model->total_bobot($params);
          foreach ($data as $key => $v) {
            $normal = normalisasi($v->bobot, $bobot_total);
            $normalisasi[$indexHasil][$key] = $normal;
          }

          foreach ($data as $key => $v) {
            $utility_pemain[$indexHasil][$key] = $v->titik_lapangan;
          }

          foreach ($pemain as $keyP => $v) {
            $semua_pemain[$indexHasil][$keyP] = $v->id_pemain;
            $id_pemain = $v->id_pemain;
            $params2 = array(
              'id_pemain' => $v->id_pemain,
              'bulan' => $i,
              'tahun' => $tahun
            );

            $nama = $v->nama_pemain;
            $semua_utility[$indexHasil][$id_pemain]['nama_pemain'] = $nama;
            $data_point[$indexHasil] = $point->detail_data($params2);

            foreach ($data_point[$indexHasil] as $keyD => $a) {
              $params3 = array(
                'id_menu' => $a->id_menu,
                'point' => $a->point,
                'bulan' => $i,
                'tahun' => $tahun
              );
              $nilai = round(utility($params3), 3);
              $semua_utility[$indexHasil][$id_pemain][$keyD] = $nilai;
              // $nilai = 0;
            }
          }

          foreach ($semua_utility[$indexHasil] as $key => $value) {
            $smart = 0;
            foreach ($normalisasi[$indexHasil] as $titik => $v) {
              $hasil = $v * $value[$titik];
              $smart += $hasil;
            }
            $hasil_akhir[$indexHasil][$value['nama_pemain']] = $smart;
          }
        }

        $indexHasil++;
      }

  ?>
  <h2>Grafik Pemain</h2>
  <div id="graph"></div>
  <?php
      // echo 'normalisasi <br> <pre>';
      // print_r($normalisasi);
      // echo '</pre><hr>';
      // echo 'data point <br> <pre>';
      // print_r($data_point);
      // echo '</pre><hr>';
      // echo 'semuau litity <br> <pre>';
      // print_r($semua_utility);
      // echo '</pre><hr>';
      // echo 'hasil akhir <br> <pre>';
      // print_r($hasil_akhir);
      // echo '</pre><hr>';
      // echo 'semua pemain <br> <pre>';
      // print_r($semua_nama_pemain);
      // echo '</pre><hr>';
  ?>
<?php } ?>

<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
<script>
  Morris.Bar({
    element: 'graph',
    data: <?php echo json_encode($hasil_akhir); ?>,
    xkey: 'bulan',
    ykeys: <?php echo json_encode($semua_nama_pemain); ?>,
    labels: <?php echo json_encode($semua_nama_pemain); ?>
  });
</script>
</div>
</div>