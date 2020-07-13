<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Action</li>
</ol>
<div class="col-xs-12">

  <div class="box">
    <div class="box-header">
      <h2 class="page-header" style="display: initial;">Data Action</h2>
      <a href="<?php echo site_url('admin/config/tambah') ?> " class="btn btn-success" style="float: right;">Tambah Action</a>
    </div>
    <!-- /.box-header -->

    <table id="table_id" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Action</th>
          <th>Pilihan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data as $key => $v) { ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $v->nama_action ?></td>
            <td>
              <a href="<?= site_url('admin/config/hapus/' . $v->id_action) ?>" class="btn btn-danger">Hapus</a>
              <a href="<?= site_url('admin/config/edit/' . $v->id_action) ?>" class="btn btn-warning">Edit</a>
            </td>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </div>
</div>