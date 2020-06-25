<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Laporan</li>
</ol>
<div class="col-xs-12">

  <div class="box">
    <div class="box-header">
      <h2 class="page-header" style="display: initial;">Detail Laporan Pemain Laki-Laki</h2>
    </div>
    <hr>

    <!-- /.box-header -->
    <div class="box-body">

      <br>
      <?php if (empty($id_posisi)) { ?>
        <!-- notif jika posisi belum terisi -->
    </div>


  <?php } else { ?>
    <!-- Tampilan jika posisi terisi -->
    <table id="table_id" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Posisi</th>
          <th>Titik Lapangan</th>
          <th>Action</th>
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
            <td><?= $v->nama_action ?></td>
            <td><?= $v->bobot ?></td>
            <td>
              <?= $bobot_total ?>
            </td>
            <td><?php
                $normal = normalisasi($v->bobot, $bobot_total);
                echo  $normal;
                $normalisasi[$key] = $normal;
                ?></td>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>

    <hr>
    <h2>Tabel Pemain</h2>
    <table id="table_id" class="display" cellspacing="0" width="100%"">
        <tr>
          <td>Nama Pemain</td>
          <?php
          foreach ($data as $v) { ?>
            <td><?= $v->titik_lapangan . '~' . $v->nama_action ?></td>
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
        $utility_pemain = array();
        $semua_pemain = array();
        $semua_utility = array();
        $hasil_akhir = array();
        foreach ($data as $key => $v) {
          $utility_pemain[$key] = $v->titik_lapangan;
        ?>
          <td><?= $v->titik_lapangan . '~' . $v->nama_action ?></td>
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
              echo $nama = $v->nama_pemain;
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
                echo $nilai;
                $semua_utility[$id_pemain][$key] = $nilai;
                ?></td>
          <?php } ?>
        </tr>
      <?php }
      ?>
    </table>



    <hr>

    </pre>
    <hr>
    <!-- <h2>Tabel Hasil Pengolahan</h2> -->
    <table id=" table_id" class="display" cellspacing="0" width="100%">
      <tr>
        <!-- <td>Nama Pemain</td> -->
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
          <!-- <td><?= $v->nama_pemain ?></td> -->
          <?php foreach ($data_point as $v) { ?>
            <td><?php
                $params = array(
                  'id_menu' => $v->id_menu,
                  'point' => $v->point,
                  'bulan' => $bulan,
                  'tahun' => $tahun
                );
                round(utility($params), 3);
                ?></td>
          <?php } ?>
        </tr>
      <?php }
      ?>
    </table>
  <?php } ?>
  </div>

  <h2>Perhitungan Hasil Akhir</h2>
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
  <hr>
  <h3>Hasil Akhir</h3>

  <?php arsort($hasil_akhir);
  foreach ($hasil_akhir as $key => $value) {
    echo "$key = $value <br>";
  };
  ?>
</div>