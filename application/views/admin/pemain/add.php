<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url('admin/home') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Data Pemain</li>
</ol>
<div class="box">
    <div class="box-header">
        <div class="col-md-12">
            <h2 class="page-header">Tambah Data Pemain</h2>
        </div>
    </div>

    <div class="box-body">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    <?php echo form_open('admin/pemain/tambah', 'role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>

                    <div class="row">
                        <div class="col-md-8 card-body">
                            <div>
                                <label for="id">Nama Pemain</label>
                                <input type="text" placeholder="Nama Pemain" name="nama_pemain" value="<?php echo $this->input->post('nama_pemain'); ?>" class="form-control" required>

                            </div>

                            <div>
                                <label for="id">NIM</label>
                                <input type="text" placeholder="NIM" name="nim" value="<?php echo $this->input->post('nim'); ?>" class="form-control" required>

                            </div>

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
                                <label for="id">Tanggal Lahir</label>
                                <input type="date" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $this->input->post('tanggal_lahir'); ?>" class="form-control" required>

                            </div>

                            <div>
                                <label for="id">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="l">Laki-Laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                                </form>
                            </div>

                            <div>
                                <label for="id">Tinggi</label>
                                <input type="text" placeholder="Tinggi Cm" name="tinggi" value="<?php echo $this->input->post('tinggi'); ?>" class="form-control" required>

                            </div>

                            <div>
                                <label for="id">Berat Badan</label>
                                <input type="text" placeholder="Berat Badan Kg" name="berat_badan" value="<?php echo $this->input->post('berat_badan'); ?>" class="form-control" required>

                            </div>

                            <div>
                                <label for="id">Jurusan</label>
                                <select class="form-control" name="id_jurusan" required>
                                    <option for="id" value="">Jurusan</option>
                                    <?php foreach ($jurusannya as $value) { ?>
                                        <option value="<?php echo $value->id_jurusan ?>"><?php echo $value->jurusan ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="col-md-12">
                                <hr>
                                <div style="float: right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo base_url('admin/pemain') ?>" class="btn btn-danger">Kembali</a>
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