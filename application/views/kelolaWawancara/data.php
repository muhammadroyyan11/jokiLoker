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
                        <!-- <div class="pull-right">
                            <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default">
                                <i class="fa fa-plus"></i> Add
                            </button>
                        </div> -->
                        <h3 class="box-title">Data <?= $title ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Wawancara</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Lowongan</th>
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
                                        <td><?= $data['nama_wawancara'] ?></td>
                                        <td><?= date_indo($data['tanggal']) ?></td>
                                        <td><?= $data['title'] ?></td>
                                        <td>
                                            <button class="btn btn-circle btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit<?= $data['id_wawancara'] ?>"><i class="fa fa-fw fa-edit"></i></button>
                                            <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('wawancara/delete/') . $data['id_wawancara'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                            <a href="<?= base_url('kelolaWawancara/report/') . $data['id_wawancara'] ?>" class="btn btn-circle btn-sm btn-primary"><i class="fa fa-fw fa-file-text-o "></i></a>
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
