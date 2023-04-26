<div class="register-box">
    <div class="register-box-body">
        <h3 class="text-center mt-0 mb-4">
            <b>R</b>egister
        </h3>
        <?= $this->session->flashdata('pesan'); ?>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telp">
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group">
                <select name="jenis_kelamin" class="form-control">
                    <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="ttl" placeholder="Tanggal Lahir">
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap">
                <!-- <input type="text" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir"> -->
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password2" placeholder="Masukkan ulang password">
                <span class="form-control-feedback"></span>
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