<div class="register-box">
    <div class="register-box-body">
        <h3 class="text-center mt-0 mb-4">
            <b>R</b>egister
        </h3>
        <?= $this->session->flashdata('pesan'); ?>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                <span class="form-control-feedback"></span>
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="form-control-feedback"></span>
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telp">
                <span class="form-control-feedback"></span>
                <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
                <select name="jenis_kelamin" class="form-control">
                    <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <span class="form-control-feedback"></span>
                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
                <input type="date" class="form-control" name="ttl" placeholder="Tanggal Lahir">
                <span class="form-control-feedback"></span>
                <?= form_error('ttl', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap">
                <!-- <input type="text" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir"> -->
                <span class="form-control-feedback"></span>
                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="form-control-feedback"></span>
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password2" placeholder="Masukkan ulang password">
                <span class="form-control-feedback"></span>
                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <center><a href="<?= site_url('auth') ?>" class="text-center">Saya sudah punya akun</a></center>
    </div>
    <!-- /.form-box -->
</div>