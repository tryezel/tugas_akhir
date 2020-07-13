<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin/home') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Config</li>
</ol>
<div class="box">
    <div class="box-header">
        <div class="col-md-12">
            <h2 class="page-header">Tambah Data Action</h2>
        </div>
    </div>

    <div class="box-body">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    <?php echo form_open('admin/config/tambah', 'role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>

                    <div class="row">
                        <div class="col-md-8 card-body">
                            <div>
                                <label for="id">Nama Action</label>
                                <input type="text" placeholder="Nama action" name="nama_action" value="<?php echo $this->input->post('nama_action'); ?>" class="form-control" required>
                            </div>

                            <div class="col-md-12">
                                <hr>
                                <div style="float: right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo base_url('admin/config/action') ?>" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>

                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>