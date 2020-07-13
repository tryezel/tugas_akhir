<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Jurusan</li>
</ol>

<div class="box">
    <div class="box-header">
        <div class="col-md-12">
            <h2 class="page-header">Edit Jurusan</h2>
        </div>
    </div>
    <div class="input-group input-group-sm">
        <div class="box-body">
            <div class="col-md-12">
                <div class="card-body">
                    <?php echo form_open('admin/config/update_jurusan/' . $jurusan->id_jurusan, 'role="form"  enctype="multipart/form-data" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="id">Nama Jurusan</label>
                            <input type="text" placeholder="jurusan" name="jurusan" value="<?php echo ($this->input->post('jurusan') ? $this->input->post('jurusan') : $jurusan->jurusan); ?>" class="form-control" required>
                        </div>

                        <br>
                    </div>

                    <div class="col-md-12">
                        <div style="float: right">
                            <button type="submit" class="btn btn-primary" value="simpan">Simpan</button>
                            <a href="<?php echo base_url('admin/config/jurusan') ?> " class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script>
</script>