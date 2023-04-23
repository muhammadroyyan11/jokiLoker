<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> - tambah data <?= $title ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add New User Account</h3>
            <div class="pull-right">
                <a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="<?= site_url('KelolaLowongan/proses')?>" method="post">
                        <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                            <label>Nama lowongan *</label>
                            <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">
                            <span class="help-block"><?= form_error('nama') ?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label>Requirement *</label>
                            <!-- <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control"> -->
                            <textarea name="requrement" id="editor1" name="require" class="form-control" cols="30" rows="10"></textarea>
                            <span class="help-block"><?= form_error('require') ?></span>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label>Deskripsi *</label>
                            <textarea id="editor2" name="deskripsi" class="form-control" rows="10" cols="80"></textarea>
                            <span class="help-block"><?= form_error('password') ?></span>
                        </div>
                        <div class="form-group <?= form_error('wisata_id') ? 'has-error' : null ?>" id="destination">
                            <label>Deptartment / Categori *</label>
                            <select name="dept_id" id="select" class="form-control">
                                <option value="">-- Pilih Department --</option>
s                                <?php foreach ($kategori as $l => $data) { ?>
                                    <option value="<?= $data['id_sub'] ?>"><b><?= $data['nama_kategori']?></b> - <?= $data['nama_sub']?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?= form_error('wisata_id') ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                            <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
