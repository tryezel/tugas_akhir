<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">My Dashboard</li>
</ol>
<!-- Icon Cards-->

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $pemain ?></h3>
        <p>Data Pemain</p>
      </div>
      <div class="icon">
        <i class="fa fa-newspaper-o"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= $menu ?></h3>
        <p>Data Menu Latihan</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?= $titik ?></h3>
        <p>Titik Latihan</p>
      </div>
      <div class="icon">
        <i class="fa fa-bullhorn"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>1</h3>
        <p>Laporan</p>
      </div>
      <div class="icon">
        <i class="fa fa-cloud-download"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
</div>
<br>
<div class="container row">
  <div class="col-md-12">
    <?php
    $bulan = date("m");
    if ($bulan >= 3)
      $bulanAwal = date("m", strtotime("-2 Months"));
    else
      $bulanAwal = 1;

    $hasil_akhir = array();

    foreach ($posisi as $keyPosisi => $value) {
      $id_posisi = $value->id_posisi;
      $nama_posisi = $value->posisi;
      $params = array(
        'id_posisi' => $id_posisi,
      );

      $pemain = $pemainModel->data_laki($params);
      if ($pemain) {
        foreach ($pemain as $key => $value) {
          $semua_nama_pemain[$keyPosisi][$key] = $value->nama_pemain;
        }
      } else {
        $semua_nama_pemain[$keyPosisi][0] = 'Pemain kosong';
      }

      $indexHasil = 0;

      for ($i = $bulanAwal; $i <= $bulan; $i++) {
        $params = array(
          'id_posisi' => $id_posisi,
          'bulan' => $i,
          'tahun' => date('Y'),
        );

        $data = null;
        $bobot_total = Null;
        $hasil_akhir[$keyPosisi][$indexHasil]['bulan'] = nomor_bulan($i);

        $data = $dataMenu->semua_data($params);

        if (empty($data)) {
          foreach ($pemain as $key => $value) {
            $hasil_akhir[$keyPosisi][$indexHasil][$value->nama_pemain] = 0;
          }
        } else {
          $hasil_akhir[$keyPosisi][$indexHasil]['nama'] = "tes";

          $bobot_total = $bobot_total_model->total_bobot($params);
          foreach ($data as $key => $v) {
            $normal = normalisasi($v->bobot, $bobot_total);
            $normalisasi[$keyPosisi][$indexHasil][$key] = $normal;
          }

          foreach ($pemain as $keyP => $v) {
            $semua_pemain[$keyPosisi][$indexHasil][$keyP] = $v->id_pemain;
            $id_pemain = $v->id_pemain;
            $params2 = array(
              'id_pemain' => $v->id_pemain,
              'bulan' => $i,
              'tahun' => date('Y')
            );

            $nama = $v->nama_pemain;
            $semua_utility[$keyPosisi][$indexHasil][$id_pemain]['nama_pemain'] = $nama;
            $data_point[$keyPosisi][$indexHasil] = $point->detail_data($params2);

            foreach ($data_point[$keyPosisi][$indexHasil] as $keyD => $a) {
              $params3 = array(
                'id_menu' => $a->id_menu,
                'point' => $a->point,
                'bulan' => $i,
                'tahun' => date('Y')
              );
              $nilai = round(utility($params3), 3);
              $semua_utility[$keyPosisi][$indexHasil][$id_pemain][$keyD] = $nilai;
              // $nilai = 0;
            }
          }

          foreach ($semua_utility[$keyPosisi][$indexHasil] as $key => $value) {
            $smart = 0;
            foreach ($normalisasi[$keyPosisi][$indexHasil] as $titik => $v) {
              $hasil = $v * $value[$titik];
              $smart += $hasil;
            }
            $hasil_akhir[$keyPosisi][$indexHasil][$value['nama_pemain']] = $smart;
          }
        }

        $indexHasil++;
      }
    ?>
      <div>
        <h2><?= $nama_posisi ?></h2>
      </div>
      <div id="graph-laki-<?= $id_posisi ?>"></div>
      <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
      <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
      <script>
        Morris.Bar({
          element: "graph-laki-<?= $id_posisi ?>",
          data: <?php echo json_encode($hasil_akhir[$keyPosisi]); ?>,
          xkey: 'bulan',
          ykeys: <?php echo json_encode($semua_nama_pemain[$keyPosisi]); ?>,
          labels: <?php echo json_encode($semua_nama_pemain[$keyPosisi]); ?>
        });
      </script>

    <?php
    }
    ?>
  </div>
  <!-- <div class="col-md-6">
    <h1>Pemain Perempuan</h1>
    <?php
    $bulan = date("m");
    if ($bulan >= 3)
      $bulanAwal = date("m", strtotime("-2 Months"));
    else
      $bulanAwal = 1;

    $hasil_akhir_per = array();

    foreach ($posisi as $keyPosisi => $value) {
      $id_posisi = $value->id_posisi;
      $nama_posisi = $value->posisi;
      $params = array(
        'id_posisi' => $id_posisi,
      );

      $pemain_per = $pemainModel->data_cewek($params);
      if ($pemain_per) {
        foreach ($pemain_per as $key => $value) {
          $semua_nama_pemain_per[$keyPosisi][$key] = $value->nama_pemain;
        }
      } else {
        $semua_nama_pemain_per[$keyPosisi][0] = 'Pemain kosong';
      }

      $indexHasil = 0;

      for ($i = $bulanAwal; $i <= $bulan; $i++) {
        $params = array(
          'id_posisi' => $id_posisi,
          'bulan' => $i,
          'tahun' => date('Y'),
        );

        $data = null;
        $bobot_total_per = Null;
        $hasil_akhir_per[$keyPosisi][$indexHasil]['bulan'] = nomor_bulan($i);

        $data = $dataMenu->semua_data($params);

        if (empty($data)) {
          foreach ($pemain_per as $key => $value) {
            $hasil_akhir_per[$keyPosisi][$indexHasil][$value->nama_pemain] = 0;
          }
        } else {
          $hasil_akhir_per[$keyPosisi][$indexHasil]['nama'] = "tes";

          $bobot_total_per = $bobot_total_model->total_bobot($params);
          foreach ($data as $key => $v) {
            $normal_per = normalisasi($v->bobot, $bobot_total_per);
            $normalisasi_per[$keyPosisi][$indexHasil][$key] = $normal_per;
          }

          foreach ($pemain_per as $keyP => $v) {
            $semua_pemain_per[$keyPosisi][$indexHasil][$keyP] = $v->id_pemain;
            $id_pemain = $v->id_pemain;
            $params2 = array(
              'id_pemain' => $v->id_pemain,
              'bulan' => $i,
              'tahun' => date('Y')
            );

            $nama_per = $v->nama_pemain;
            $semua_utility_per[$keyPosisi][$indexHasil][$id_pemain]['nama_pemain'] = $nama;
            $data_point_per[$keyPosisi][$indexHasil] = $point->detail_data($params2);

            foreach ($data_point_per[$keyPosisi][$indexHasil] as $keyD => $a) {
              $params3 = array(
                'id_menu' => $a->id_menu,
                'point' => $a->point,
                'bulan' => $i,
                'tahun' => date('Y')
              );
              $nilai_per = round(utility($params3), 3);
              $semua_utility_per[$keyPosisi][$indexHasil][$id_pemain][$keyD] = $nilai;
              // $nilai = 0;
            }
          }
          foreach ($semua_utility_per[$keyPosisi][$indexHasil] as $key => $value) {
            $smart = 0;
            foreach ($normalisasi_per[$keyPosisi][$indexHasil] as $titik => $v) {
              $hasil = $v * $value[$titik];
              $smart += $hasil;
            }
            $hasil_akhir_per[$keyPosisi][$indexHasil][$value['nama_pemain']] = $smart;
          }
        }

        $indexHasil++;
      }
    ?>

      <div>
        <h2><?= $nama_posisi ?></h2>
      </div>
      <div id="graph-perempuan-<?= $id_posisi ?>"></div>
      <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
      <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
      <script>
        Morris.Bar({
          element: "graph-perempuan-<?= $id_posisi ?>",
          data: <?php echo json_encode($hasil_akhir_per[$keyPosisi]); ?>,
          xkey: 'bulan',
          ykeys: <?php echo json_encode($semua_nama_pemain_per[$keyPosisi]); ?>,
          labels: <?php echo json_encode($semua_nama_pemain_per[$keyPosisi]); ?>
        });
      </script>

    <?php
    }
    ?>
  </div> -->
</div>