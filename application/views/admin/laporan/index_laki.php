<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Laporan</li>
</ol>
<div class="col-xs-12">

  <div class="box">
    <div class="box-header">
      <h2 class="page-header" style="display: initial;">Laporan Pemain Laki-Laki</h2>
    </div>
    <hr>

    <!-- /.box-header -->
    <div class="box-body">
      <hr>
      <form action="<?php echo site_url('admin/laporan/index_laki') ?>" method="get">
        <div class="col-md-2">
          <div class="form-group">
            <label>Bulan</label>
            <?= form_dropdown('bulan', bulan_indonesia(), $bulan, 'class="form-control"') ?>
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
        <div class="col-md-2">
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

  <?php } else { ?>
    <!-- Tampilan jika posisi terisi -->

    <?php
        $normalisasi = array();
        foreach ($data as $key => $v) {
          $normal = normalisasi($v->bobot, $bobot_total);
          $normalisasi[$key] = $normal;
        }
    ?>

    <hr>

    <table id="table_id" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <td>Nama Pemain</td>
          <?php
          // Proses grap
          $semua_nama_pemain;
          $chart_pemain = array();
          foreach ($data as $key => $v) {
            // menambahkan array grap
            $chart_pemain[$key]['titik_lapangan'] = $v->titik_lapangan;
            $chart_pemain[$key]['id_titik'] = $v->id_titik;
          ?>
            <td><?= $v->titik_lapangan; ?></td>
          <?php }
          foreach ($pemain as $key => $value) {
            $semua_nama_pemain[$key] = $value->nama_pemain;
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($chart_pemain != '') {
          // proses pengisian data
          foreach ($chart_pemain as $key => $value) {
            foreach ($pemain as $i => $v) {
              $params = array(
                'id_pemain' => $v->id_pemain,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'id_menu' => $chart_pemain[$key]['id_titik'],
              );
              $data_point = $point->detail_row($params);
              $chart_pemain[$key][$v->nama_pemain] = $data_point;
            }
          }


          foreach ($pemain as $key => $v) {
            $params = array(
              'id_pemain' => $v->id_pemain,
              'bulan' => $bulan,
              'tahun' => $tahun
            );
            $data_point = $point->detail_data($params);
        ?>
            <tr>
              <td><?= $v->nama_pemain;
                  ?> </td>
              <?php foreach ($data_point as $v) { ?>
                <td><?php echo $v->point; ?></td>
              <?php } ?>
            </tr>
        <?php }
        }
        ?>
    </table>
    <hr>
    <!-- <h2>Tabel Utility</h2> -->
    <!-- <table id=" table_id" class="display" cellspacing="0" width="100%"> -->
    <tr>
      <!-- <td>Nama Pemain</td> -->
      <?php
        $utility_pemain = array();
        $semua_pemain = array();
        $semua_utility = array();
        $hasil_akhir = array();
        foreach ($data as $key => $v) {
          $utility_pemain[$key] = $v->titik_lapangan;
      ?>
        <!-- <td><?= $v->titik_lapangan ?></td> -->
      <?php }
      ?>
    </tr>
    <?php
        $data = array();
        foreach ($pemain as $key => $v) {
          $semua_pemain[$key] = $v->id_pemain;
          $id_pemain = $v->id_pemain;
          $params = array(
            'id_pemain' => $v->id_pemain,
            'bulan' => $bulan,
            'tahun' => $tahun
          );
          $data_point = $point->detail_data($params);
    ?>
      <tr>
        <td><?php
            $nama = $v->nama_pemain;
            $semua_utility[$id_pemain]['nama_pemain'] = $nama;
            ?></td>
        <?php foreach ($data_point as $key => $i) { ?>
          <td><?php
              $params = array(
                'id_menu' => $i->id_menu,
                'point' => $i->point,
                'bulan' => $bulan,
                'tahun' => $tahun
              );
              $nilai = round(utility($params), 3);
              $nilai;
              $semua_utility[$id_pemain][$key] = $nilai;
              ?></td>
        <?php } ?>
      </tr>
    <?php }
    ?>
    </table>
    <!-- <pre>
      <?php print_r($utility_pemain) ?>
      ==========pemain===============
      <?php print_r($semua_pemain) ?>
      ==========nilai===============
      <?php print_r($semua_utility) ?>
      <hr>
      <?php
        foreach ($semua_utility as $key => $value) {
          echo $value['nama_pemain'] . '<br>';
          $smart = 0;
          foreach ($normalisasi as $titik => $v) {
            $hasil = $v * $value[$titik];
            echo $titik . '-> ' . $v . ' x ' . $value[$titik] . ' = ' . $hasil . '<br>';
            $smart += $hasil;
          }
          echo $smart . '<br>';
          $hasil_akhir[$value['nama_pemain']] = $smart;
        }
        // echo count($semua_utility) . '<br>';
        // echo count($semua_utility, COUNT_RECURSIVE);
      ?>
    </pre> -->
    <hr>
    <!-- <h2>Tabel Hasil Pengolahan</h2>
    <table id=" table_id" class="display" cellspacing="0" width="100%">
      <tr>
        <td>Nama Pemain</td>
        <?php
        foreach ($data as $v) { ?>
          <td><?= $v->titik_lapangan ?></td>
        <?php }
        ?>
      </tr>
      <?php
        foreach ($pemain as $v) {
          $params = array(
            'id_pemain' => $v->id_pemain,
            'bulan' => $bulan,
            'tahun' => $tahun
          );
          $data_point = $point->detail_data($params);
      ?>
        <tr>
          <td><?= $v->nama_pemain ?></td>
          <?php foreach ($data_point as $v) { ?>
            <td><?php
                $params = array(
                  'id_menu' => $v->id_menu,
                  'point' => $v->point,
                  'bulan' => $bulan,
                  'tahun' => $tahun
                );
                echo round(utility($params), 3);
                ?></td>
          <?php } ?>
        </tr>
      <?php }
      ?>
    </table> -->


    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Hasil Akhir</h2>
        <p class="card-text"><?php arsort($hasil_akhir);
                              foreach ($hasil_akhir as $key => $value) {
                                echo "$key = $value <br>";
                              };
                              ?></p>
        <form action="<?php echo site_url('admin/laporan/detail_laki') ?>" method="get">
          <input type="hidden" name="id_posisi" value="<?= $id_posisi ?>" id="">
          <input type="hidden" name="bulan" value="<?= $bulan ?>" id="">
          <input type="hidden" name="tahun" value="<?= $tahun ?>" id="">
          <button type="submit" class="btn btn-primary">Detail Perhitungan</button>
        </form>
      </div>
    </div>


    <hr>
    <h2>Grafik Pemain</h2>
    <div id="graph"></div>

    <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
    <script>
      Morris.Bar({
        element: 'graph',
        data: <?php echo json_encode($chart_pemain); ?>,
        xkey: 'titik_lapangan',
        ykeys: <?php echo json_encode($semua_nama_pemain); ?>,
        labels: <?php echo json_encode($semua_nama_pemain); ?>
      });
      <?php } ?>
    </script>
  </div>
</div>