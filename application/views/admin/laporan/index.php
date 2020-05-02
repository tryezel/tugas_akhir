<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Laporan</li>
</ol>
<div class="col-xs-12">

  <div class="box">
    <div class="box-header">
      <h2 class="page-header" style="display: initial;">Laporan</h2>
    </div>
    <hr>

    <!-- /.box-header -->
    <div class="box-body">
      <form action="<?php echo site_url('admin/laporan/index') ?>" method="get">
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
    <table id="table_id" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Posisi</th>
          <th>Titik Lapangan</th>
          <th>Bobot</th>
          <th>Total</th>
          <th>Normalisi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $normalisasi = array();
        foreach ($data as $key => $v) { ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $v->posisi ?></td>
            <td><?= $v->titik_lapangan ?></td>
            <td><?= $v->bobot ?></td>
            <td>
              <?= $bobot_total ?>
            </td>
            <td><?php
                $normal = normalisasi($v->bobot, $bobot_total);
                echo  $normal;
                $normalisasi[$v->titik_lapangan][$v->id_titik] = $normal;
                ?></td>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
    <?php print_r($normalisasi); ?>
    <hr>
    <h2>Tabel Pemain</h2>
    <table id="table_id" class="display" cellspacing="0" width="100%"">
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
          <td><?php echo $v->point; ?></td>
          <?php } ?>
      </tr>
        <?php }
        ?>
      </table>

      <hr>
    <h2>Tabel Utility</h2>
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
        $data = array();
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
    </table>

    <hr>
    <h2>Tabel Hasil Pengolahan</h2>
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
                // $hasil = utility($params);
                // if (strlen($hasil) > 3) {
                //   echo number_format($hasil, 3);
                // } else
                //   echo $hasil;

                echo round(utility($params), 3);
                ?></td>
          <?php } ?>
        </tr>
      <?php }
      ?>
    </table>
  <?php } ?>
  </div>
</div>