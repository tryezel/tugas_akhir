<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php

                    use phpDocumentor\Reflection\Types\Object_;

                    echo site_url('admin/home') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Perhitungan</li>
</ol>

<div class="box">
    <div class="box-header">
        <div class="col-md-15">
            <h2 class="page-header">Input Data</h2>
        </div>
        <form action="<?php echo site_url('admin/perhitungan/edit/' . $data->id_pemain) ?>" method="get">
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

            <div class="col-md-2">
                <div class="form-group">
                    <label>&nbsp;</label><br>
                    <button class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <div class="box-body">
        <?php echo form_open('admin/perhitungan/simpan/', 'role="form"  enctype="multipart/form-data" class="form-horizontal"'); ?>
        <?php echo validation_errors(); ?>
        <div>Nama : <?= $data->nama_pemain ?></div>
        <div>Posisi : <?= $data->posisi ?></div>
        <input type="hidden" name="id_pemain" value="<?= $data->id_pemain ?>">
        <input type="hidden" name="bulan" value="<? $bulan ?>">
        <input type="hidden" name="tahun" value="<? $tahun ?>">
        <input type="hidden" name="id_pemain" value="<?= $data->id_pemain ?>">
        <hr>
        <?php
        foreach ($menu as $key => $v) {
            $param = array(
                'id_menu' => $v->id_titik,
                'id_pemain' => $data->id_pemain,
                'bulan' => $bulan,
                'tahun' => $tahun
            );
            $isi = $isi_menu->detail_data($param);
            foreach ($isi as $key => $value) {
                $array['point'] = $value->point;
            }

        ?>
            <div class="form-group" style="margin-left: 20px">
                <label for=""><?= $v->titik_lapangan ?></label> <br>
                <input type="hidden" name="id_menu[]" value="<?= $v->id_titik ?>">
                <input type="text" placeholder="Poin" name="point[]" value="<?php if (!empty($isi)) echo $array['point']; ?>" <?php if (!empty($isi)) echo 'disabled'; ?> required>
            </div>
        <?php } ?>
        <button class="btn btn-info" <?php if (!empty($isi)) echo 'disabled'; ?>>simpan</button>
        <a href="<?php if ($data->gender == 'l') {
                        echo base_url('admin/perhitungan/index_laki');
                    } elseif ($data->gender == 'p') {
                        echo base_url('admin/perhitungan/index_cewek');
                    }
                    ?> " class="btn btn-danger">Kembali</a>
        <?php echo form_close(); ?>
    </div>
</div>


<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">

    </div>
</div>


<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script>
</script>