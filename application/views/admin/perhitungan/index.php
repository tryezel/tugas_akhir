<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Perhitungan</li>
</ol>
<div class="col-xs-12">

  <div class="box">
    <div class="box-header">
      <h2 class="page-header" style="display: initial;">Perhitungan</h2>
    </div>
    <hr>

    <!-- /.box-header -->
    <div class="box-body">
      <form action="<?php echo site_url('admin/perhitungan/index') ?>" method="get">
        <!-- <div class="col-md-2">
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
        </div> -->
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
      <table id="table_id" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Perhitungan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $key => $v) { ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $v->nama_pemain ?></td>
              <td><?= $v->posisi ?></td>
              <td>
                <a href="<?= site_url('admin/perhitungan/edit/' . $v->id_pemain) ?>" class="btn btn-info">Tambah</a>
              </td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>