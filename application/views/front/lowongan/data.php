<!-- Slide1 -->
<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 item3-slick1" style="background-image: url(<?= base_url() ?>assets/img/gallery-18.jpg);">

                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">

                    <h3 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 m-b-22">
                        Welcome
                    </h3>
                    <br>
                    <br>
                    <div class="container">
                        <div class="row">
                            <?php
                            if (userdata('role') == 3) { ?>
                                <div class="col-md-3 mx-auto p-b-30">
                                    <a href="#" data-toggle="modal" data-target="#profileUpdate">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            Profile User
                                        </span><br><br>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#kelolaLamaran">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            Kelola Lamaran
                                        </span>
                                    </a>
                                </div>
                                <div class="col-md-3 mx-auto p-b-30">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            CV User
                                        </span><br><br>
                                    </a>
                                    <a href="#">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33" data-toggle="modal" data-target="#kelolaUjian">
                                            Kelola Tes Ujian
                                        </span>
                                    </a>
                                </div>
                            <?php } elseif (userdata('role') == 2) { ?>
                                <div class="col-md-3 mx-auto p-b-30">
                                    <a href="#" data-toggle="modal" data-target="#profileUpdate">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            Profil HRD
                                        </span>
                                    </a>
                                </div>
                                <div class="col-md-3 mx-auto p-b-30">
                                    <a href="<?= site_url('dashboard') ?>">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            Dashboard HRD
                                        </span><br><br>
                                    </a>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container" id="card-lists">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Daftar Lowongan Pekerjaan
                </h3>
            </div>
            <?= $this->session->flashdata('pesan'); ?>

            <?php
            if ($lamaranCount > 0) { ?>
                <div class="alert alert-danger" role="alert">
                    Anda memiliki <b><?= $lamaranCount ?></b> ujian yang belum dikerjakan, Silahkan cek menu kelola ujian
                </div>
            <?php }
            ?>

            <div class="form contact-form">
                <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22 border border-dark" id="myInput" onkeyup="myFunction()" type="text" name="name" placeholder="Ketikkan Lowongan yang diinginkan">
                </div>
            </div>

            <div class="row">
                <!-- start foreach  -->
                <?php
                foreach ($lowongan as $key => $data) { ?>
                    <div class="col-md-4 p-b-30" id="">
                        <div class="job-instructor-layout">
                            <div class="brows-job-type ">
                                <span class="full-time"><?= $data['tipe'] ?></span>
                            </div>
                            <div class="job-instructor-thumb text-center">
                                <a href="<?= site_url('loker/view/' . $data['seo_title']) ?>">
                                    <img src="<?= base_url() ?>assets/img/logo.png" alt="" style="max-width: 8rem">
                                </a>
                            </div>
                            <div class="job-instructor-content">
                                <h4 class="instructor-title"><a href="<?= site_url('loker/view/' . $data['seo_title']) ?>"></a></h4>
                                <div class="instructor-skills">
                                    <?= $data['section'] ?> </div>
                                <div class="instructor-skills admin">
                                    <a href="<?= site_url('loker/view/' . $data['seo_title']) ?>">
                                        <h5><?= $data['title'] ?></h5>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php  }
                ?>
                <!-- end foreach  -->
            </div>
        </div>
    </section>


</section>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Curriculum Vittae</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('loker/upload_cv') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <h5 for="exampleInputEmail1">File Tersimpan</h5><br>
                        <a href="<?= base_url() ?>assets/uploads/cv/<?= $cv->cv ?>" target="_blank" class="btn btn-secondary"><?= $cv->cv ?></a>
                    </div><br>
                    <div class="form-group">
                        <h5 for="exampleInputEmail1">Upload File / Update</h5><br>
                        <input type="file" name="cv" class="form-control border border-dark" id="exampleInputEmail1">
                        <small id="emailHelp" class="form-text text-muted">Tipe file harus menggunakan format PDF</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal Update Profile-->
<div class="modal fade" id="profileUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('loker/changeProfile/') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <h5 for="exampleInputEmail1">Foto Profil</h5>
                        <!-- <input type="text" name="nama" class="form-control border border-dark" value="<?= userdata('nama') ?>" id="exampleInputEmail1"> -->
                        <center><img src="<?= base_url() ?>assets/uploads/foto/<?= userdata('foto')?>" alt="" class="border border-black" style="max-width: 130px; margin-top: 10px;"></center><br>
                        <input type="file" name="foto" class="form-control border border-dark" id="exampleInputEmail1">
                        <small id="emailHelp" class="form-text text-muted">Lewati form upload jika tidak ada perubahan Foto</small>
                    </div><br>
                    <div class="form-group">
                        <h5 for="exampleInputEmail1">Nama</h5>
                        <input type="text" name="nama" class="form-control border border-dark" value="<?= userdata('nama') ?>" id="exampleInputEmail1">
                    </div><br>
                    <div class="form-group">
                        <h5 for="exampleInputEmail1">Password baru</h5>
                        <input type="password" name="password" class="form-control border border-dark" id="exampleInputEmail1">
                        <small id="emailHelp" class="form-text text-muted">Kosongi form password jika tidak ada perubahan</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal Kelola Lamaran -->
<div class="modal fade bd-example-modal-lg" id="kelolaLamaran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">List Lamaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('loker/upload_cv') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Lowongan</th>
                                <th scope="col">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($history as $key => $data) { ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data['title'] ?></td>
                                    <td>
                                        <?php if ($data['statusLamaran'] == null) {
                                            echo 'Menunggu Keputusan HRD';
                                        } else {
                                            echo $data['statusLamaran'];
                                        } ?>
                                    </td>
                                </tr>
                            <?php  }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Kelola Ujian -->
<div class="modal fade bd-example-modal-lg" id="kelolaUjian" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">List Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('loker/upload_cv') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Lowongan Test</th>
                                <th scope="col">Token</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($lamaran as $key => $data) { ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data['title'] ?></td>
                                    <td><?= $data['token'] ?></td>
                                    <td><a href="<?= base_url('loker/start/' . $data['id_ujian'])  ?>" target="_blank" class="btn btn-circle btn-sm btn-primary"><i class="fa fa-fw fa-pencil"></i> Mulai</a></td>
                                </tr>
                            <?php  }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>