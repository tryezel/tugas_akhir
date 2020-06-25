<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin/home') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Menu Latihan</li>
</ol>
<div class="box">
    <div class="box-header">
        <div class="col-md-12">
            <h2 class="page-header">Tambah Menu Latihan</h2>
        </div>
    </div>



    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">

            <div class="col-md-9">

                <div class="box-body">
                    <div class="col-md-17">
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php echo form_open('admin/menu/tambah', 'role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                                <?php echo validation_errors(); ?>

                                <div class="row">
                                    <div class="col-md-8 card-body">

                                        <div>
                                            <label for="id">Posisi</label>
                                            <select class="form-control" name="id_posisi" required>
                                                <option for="id" value="">Posisi</option>
                                                <?php foreach ($posisinya as $value) { ?>
                                                    <option value="<?php echo $value->id_posisi ?>"><?php echo $value->posisi ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="id">Titik Lapangan</label>
                                            <select class="form-control" name="id_titik" required>
                                                <option for="id" value="">Titik Lapangan</option>
                                                <?php foreach ($titiknya as $value) { ?>
                                                    <option value="<?php echo $value->id_titik ?>"><?php echo $value->titik_lapangan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="id">Action</label>
                                            <select class="form-control" name="id_action" required>
                                                <option for="id" value="">Action</option>
                                                <?php foreach ($actionnya as $value) { ?>
                                                    <option value="<?php echo $value->id_action ?>"><?php echo $value->nama_action ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="id">Repetisi</label>
                                            <input type="text" placeholder="Repetisi" name="repetisi" value="<?php echo $this->input->post('repetisi'); ?>" class="form-control" required>

                                        </div>

                                        <div>
                                            <label for="id">Bobot</label>
                                            <input type="text" placeholder="Bobot" name="bobot" value="<?php echo $this->input->post('bobot'); ?>" class="form-control" required>

                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                            <div style="float: right">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a href="<?php echo base_url('admin/menu') ?>" class="btn btn-danger">Kembali</a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php echo form_close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img src="<?php echo site_url('assets/img/lapfx.jpg') ?>" width="700" height="475">
            </div>
        </div>
    </div>


    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>