<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Edit Menu Latihan</li>
</ol>

<div class="box">
    <div class="box-header">
        <div class="col-md-12">
            <h2 class="page-header">Edit Menu Latihan</h2>
        </div>
    </div>
</div>


<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">

        <div class="col-md-9">

            <div class="box-body">
                <div class="col-md-17">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php echo form_open('admin/menu/update/' . $menu->id_menu, 'role="form"  enctype="multipart/form-data" class="form-horizontal"'); ?>
                            <?php echo validation_errors(); ?>
                            <div class="col-md-8">

                                <div class="form-group">
                                    <label>Posisi</label>
                                    <select class="form-control" name="id_posisi">
                                        <option value="">Pilih Posisi</option>

                                        <!-- memsnggil database kategori buku dengan variabel $value -->
                                        <?php foreach ($posisinya as $value) { ?>
                                            <option <?= ($value->id_posisi == $menu->id_posisi) ? 'selected' : '' ?> value="<?php echo $value->id_posisi; ?>"><?php echo $value->posisi ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Titik Lapangan</label>
                                    <select class="form-control" name="id_titik">
                                        <option value="">Pilih Titik</option>

                                        <!-- memsnggil database kategori buku dengan variabel $value -->
                                        <?php foreach ($titiknya as $value) { ?>
                                            <option <?= ($value->id_titik == $menu->id_titik) ? 'selected' : '' ?> value="<?php echo $value->id_titik; ?>"><?php echo $value->titik_lapangan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="id">Repetisi</label>
                                    <input type="text" placeholder="repetisi" name="repetisi" value="<?php echo ($this->input->post('repetisi') ? $this->input->post('repetisi') : $menu->repetisi); ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="id">Bobot</label>
                                    <input type="text" placeholder="bobot" name="bobot" value="<?php echo ($this->input->post('bobot') ? $this->input->post('bobot') : $menu->bobot); ?>" class="form-control" required>
                                </div>


                                <hr>
                                <br>
                            </div>

                            <div class="col-md-8">
                                <div style="float: right">
                                    <button type="submit" class="btn btn-primary" value="simpan">Simpan</button>
                                    <a href="<?php echo base_url('admin/menu') ?>" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
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
<script>
</script>