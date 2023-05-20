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
                         
                            <a href="<?= site_url('kelolaWawancara') ?>" class="btn btn-warning btn-flat">
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
                                foreach ($wawancara as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['no_telp'] ?></td>
                                        <td><?= $data['email'] ?></td>
                                        <td>
                                            <!-- <a href="https://api.whatsapp.com/send?phone=<?= $data['no_telp'] ?>&text=Dear%20Calon%20Pegawai%2C%0A%0ADari%20hasil%20pengerjaan%20ujian%20test%2C%20anda%20dinyatakan%20lolos.%0A%0ARegard%2C%0AHRD%20PT%20TjARKINDO%20MAS" target="_blank" class="btn btn-circle btn-sm btn-success" title="Hubugi Kandidat"><i class="fa fa-fw fa-whatsapp"></i></a> -->
                                            <a href="https://api.whatsapp.com/send?phone=<?= $data['no_telp'] ?>&text=Dear%20<?= $data['nama'] ?>%2C%0A%0ASelamat%20anda%20dinyatakan%20lolos%20ke%20tahap%20berikutnya%2C%20Proses%20selanjutnya%20adalah%20wawancara%20test%20yang%20di%20laksanakan%20pada%3A%0A%20%0AHari%2C%20tanggal%09%09%3A%20<?= mediumdate_indo($data['tanggal'])?>%0APukul%09%09%09%3A%2009.00%20-%20Selesai%0ATempat%09%09%09%3A%20PT%20Tjarkindo%20Mas%0A%0A%0ASekian%20pemberitahuan%20dari%20kami%2C%20Terima%20kasih%0A%0ASalam%20Hangat%2C%0AHRD%20PT%20Tjarkindo%20Mas" target="_blank" class="btn btn-circle btn-sm btn-success" title="Hubugi Kandidat"><i class="fa fa-fw fa-whatsapp"></i></a>
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