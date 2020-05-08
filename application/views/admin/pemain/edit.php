<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo site_url('admin/home') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Edit Data Pemain</li>
</ol>

<div class="box">
    <div class="box-header">
        <div class="col-md-12">
            <h2 class="page-header">Edit Data Pemain</h2>
        </div>
    </div>
    <div class="input-group input-group-sm">
        <div class="box-body">
            <div class="col-md-12">
                <div class="card-body">
                    <?php echo form_open('admin/pemain/update/' . $pemain->id_pemain, 'role="form"  enctype="multipart/form-data" class="form-horizontal"'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="id">Nama Pemain</label>
                            <input type="text" placeholder="nama_pemain" name="nama_pemain" value="<?php echo ($this->input->post('nama_pemain') ? $this->input->post('nama_pemain') : $pemain->nama_pemain); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="id">NIM</label>
                            <input type="text" placeholder="nim" name="nim" value="<?php echo ($this->input->post('nim') ? $this->input->post('nim') : $pemain->nim); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Posisi</label>
                            <select class="form-control" name="id_posisi">
                                <option value="">Pilih Posisi</option>

                                <!-- memsnggil database kategori buku dengan variabel $value -->
                                <?php foreach ($posisinya as $value) { ?>
                                    <option <?= ($value->id_posisi == $pemain->id_posisi) ? 'selected' : '' ?> value="<?php echo $value->id_posisi; ?>"><?php echo $value->posisi ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id">Tanggal Lahir</label>
                            <input type="date" placeholder="tanggal_lahir" name="tanggal_lahir" value="<?php echo ($this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') : $pemain->tanggal_lahir); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option <?= ($pemain->gender == 'l') ? 'selected' : '' ?> value="l">Laki-laki</option>
                                <option <?= ($pemain->gender == 'p') ? 'selected' : '' ?> value="p">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id">Tinggi</label>
                            <input type="text" placeholder="tinggi" name="tinggi" value="<?php echo ($this->input->post('tinggi') ? $this->input->post('tinggi') : $pemain->tinggi); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="id">Berat Badan</label>
                            <input type="text" placeholder="berat_badan" name="berat_badan" value="<?php echo ($this->input->post('berat_badan') ? $this->input->post('berat_badan') : $pemain->berat_badan); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control" name="id_jurusan">
                                <option value="">Pilih Jurusan</option>

                                <!-- memsnggil database kategori buku dengan variabel $value -->
                                <?php foreach ($jurusannya as $value) { ?>
                                    <option <?= ($value->id_jurusan == $pemain->id_jurusan) ? 'selected' : '' ?> value="<?php echo $value->id_jurusan; ?>"><?php echo $value->jurusan ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <hr>
                        <br>
                    </div>

                    <div class="col-md-12">
                        <div style="float: right">
                            <button type="submit" class="btn btn-primary" value="simpan">Simpan</button>
                            <a href="<?php echo base_url('admin/pemain') ?>" class="btn btn-danger">Kembali</a>
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