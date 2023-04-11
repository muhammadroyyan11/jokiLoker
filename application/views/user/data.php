<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i> <?= $title ?></a></li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data <?= $title ?></h3>
                    <div class="pull-right">
                        <a href="<?= site_url('user/add')?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aktivasi</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($users) {
                                $no = 1;
                                foreach ($users as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <a href="<?= base_url('user/toggle/') . $data['id_user'] ?>" class="btn btn-circle btn-sm <?= $data['is_active'] ? 'btn-secondary' : 'btn-success' ?>" title="<?= $data['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                        </td>
                                        <td><?= $data['nama_lengkap']; ?></td>
                                        <td><?= $data['username']; ?></td>
                                        <td><?= $data['email']; ?></td>
                                        <td>
                                            <?php if ($data['role'] == 1) {
                                                echo 'Admin';
                                            } elseif ($data['role'] == 2){
                                                echo 'HRD';
                                            } elseif ($data['role'] == 3){
                                                echo 'Calon Karyawan';
                                            }?>
                                        </td>
                                        <td>

                                            <a href="<?= base_url('auser/edit/') . $data['id_user'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                            <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('user/delete/') . $data['id_user'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>