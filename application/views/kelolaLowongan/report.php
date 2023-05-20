<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i> <?= $title ?></a></li>
    </ol>
    <hr>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">

            <!-- /.col -->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-right">
                         
                            <a href="<?= site_url('kelolaLowongan') ?>" class="btn btn-warning btn-flat">
                                <i class="fa fa-undo"></i> Kembali
                            </a>
                        </div>
                        <h3 class="box-title">Data <?= $title ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelamar</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($lowongan as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['no_telp'] ?></td>
                                        <td><?= $data['email'] ?></td>
                                        <td>
                                            <!-- <a href="https://api.whatsapp.com/send?phone=<?= $data['no_telp'] ?>&text=Dear%20Calon%20Pegawai%2C%0A%0ADari%20hasil%20pengerjaan%20ujian%20test%2C%20anda%20dinyatakan%20lolos.%0A%0ARegard%2C%0AHRD%20PT%20TjARKINDO%20MAS" target="_blank" class="btn btn-circle btn-sm btn-success" title="Hubugi Kandidat"><i class="fa fa-fw fa-whatsapp"></i></a> -->
                                            <a href="https://api.whatsapp.com/send?phone=<?= $data['no_telp'] ?>&text=Dear%20<?= $data['nama']?>%2C%0A%0ASelamat%20anda%20dinyatakan%20lolos%20administrasi%20data%2C%20Proses%20selanjutnya%20adalah%20pengerjaan%20soal%20test%20yang%20bisa%20diakses%20melalui%20link%20berikut%3A%0A%20%0A<?= base_url() ?>loker%2Fstart%2F<?= $data['ujian_id']?>%0A%0ASelamat%20mengerjakan%0A%0ASalam%20Hangat%2C%0AHRD%20PT%20Tjarkindo%20Mas" target="_blank" class="btn btn-circle btn-sm btn-success" title="Hubugi Kandidat"><i class="fa fa-fw fa-whatsapp"></i></a>
                                            <a href="<?= base_url('kelolaLowongan/detail/') . $data['id_lamaran'] ?>" class="btn btn-circle btn-sm btn-primary" title="Detail Hasil"><i class="fa fa-fw fa-info"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
</section>