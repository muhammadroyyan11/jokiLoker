<!-- content page -->

<style type='text/css'>
    .feed-share {
        position: relative;
        overflow: hidden;
        line-height: 0;
        margin: 0 0 30px
    }
</style>


<section class="bgwhite p-t-60 p-b-25">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-50 p-r-0-lg">
                    <div class="p-b-40">
                        <div class="blog-detail-img wrap-pic-w">
                            <img src="<?= base_url() ?>assets/img/read_detail.png" alt="IMG-BLOG" style="max-width: 60  rem" class="border border-black">
                        </div>

                        <div class="blog-detail-txt p-t-33">
                            <h4 class="p-b-11 m-text24">
                                <?= strtoupper($lowongan->title) ?>
                            </h4>

                            <div class="s-text8 flex-w flex-m p-b-21">
                                <span>
                                    Uploaded By HRD
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    <?php
                                    $dateMasuk = new DateTime($lowongan->created);
                                    ?>
                                    <?= $dateMasuk->format('d F Y') ?>
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    <?php
                                    $dateMasuk = new DateTime($lowongan->deadline);
                                    ?>
                                    Deadline : <?= $dateMasuk->format('d F Y') ?>, <?= $dateMasuk->format('H:i')?> WIB
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    <?php
                                    $dateMasuk = new DateTime($lowongan->deadline);
                                    ?>
                                    Jumlah pelamar : <?= $pelamar ?> Pelamar
                                </span>

                            </div>

                            <div class="flex-w flex-m p-b-21">
                                <p class="share-text">bagikan : </p>&nbsp;&nbsp;
                                <a href="https://twitter.com/intent/tweet?url=<?= base_url() ?>loker/view/<?= $lowongan->seo_title ?>&text=<?= $lowongan->title ?>" class="btn btn-circle tombol-twitter" target="_blank"><i class="fa fa-twitter"></i></a>&nbsp;
                                <a href="https://www.facebook.com/sharer.php?u=<?= base_url() ?>loker/view/<?= $lowongan->seo_title ?>" class="btn tombol-facebook" target="_blank"><i class="fa fa-facebook"></i>&nbsp;</a>&nbsp;
                                <a href="https://api.whatsapp.com/send?text=<?= base_url() ?>loker/view/<?= $lowongan->seo_title ?> | <?= $lowongan->title ?>" class="btn tombol-whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            </div>
                            <hr>

                            <?php
                            if ($lowongan->requirements != null) { ?>
                                <h4>Requirement : </h4><br>
                                <p align="justify"> <?= $lowongan->requirements ?> </p><br><br><br>
                            <?php }
                            ?>
                            <?php
                            if ($lowongan->deskripsi != null) { ?>
                                <h4>Description : </h4><br>
                                <p align="justify"> <?= $lowongan->deskripsi ?> </p><br><br><br>
                            <?php }
                            ?>
                        </div>
                        <?php
                        if ($count == 0) {
                            if (userdata('role') != 2) { ?>
                                <div class="w-size25">
                                    <a href="<?= site_url('loker/lamar/' . $lowongan->seo_title) ?>" class="flex-c-m size2 bg1 bo-rad-23 hov1 trans-0-4">
                                        <span style="color: white;  ">Lamar Posisi Ini</span>
                                    </a>
                                </div>
                        <?php }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="rightbar">

                    <!-- Featured Products -->
                    <h4 class="m-text23 p-t-65 p-b-34">
                        Lowongan lainnya
                    </h4>

                    <ul class="bgwhite">
                        <?php
                        foreach ($featured as $key => $data) {

                            $today_date = strtotime(date("Y-m-d H:i:s"));

                            $tengat = strtotime($data['deadline']);

                            if ($tengat > $today_date) { ?>
                                <li class="flex-w p-b-20">
                                    <a href="<?= site_url("loker/view/") . $data['seo_title'] ?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                                        <img src="<?= base_url() ?>assets/img/logo.png" alt="IMG-PRODUCT" class="border" style="max-width: 18rem">
                                        <!-- <img src="<?= base_url() ?>assets/img/read_detail.png" alt="IMG-BLOG" style="max-width: 18rem"> -->
                                    </a>

                                    <div class="w-size23 p-t-5">
                                        <a href="<?= site_url("loker/view/") . $data['seo_title'] ?>" class="s-text20">
                                            <b><?= character_limiter($data['title'], 31) ?></b>
                                        </a>

                                        <span class="dis-block s-text17 p-t-6">
                                            <?= $data['section'] ?>
                                        </span>
                                    </div>
                                </li> <br>
                        <?php }
                        } ?>
                    </ul>


                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>