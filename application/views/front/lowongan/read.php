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
                            <img src="<?= base_url() ?>assets/img/logo.png" alt="IMG-BLOG" style="max-width: 18rem">
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

                            </div>

                            <div class="flex-w flex-m p-b-21">
                                <p class="share-text">bagikan : </p>&nbsp;&nbsp;
                                <a href="https://twitter.com/intent/tweet?url=<?= base_url() ?>loker/view/<?= $lowongan->seo_title ?>&text=<?= $lowongan->title ?>" class="btn btn-circle tombol-twitter" target="_blank"><i class="fa fa-twitter"></i></a>&nbsp;
                                <a href="https://www.facebook.com/sharer.php?u=<?= base_url() ?>loker/view/<?= $lowongan->seo_title ?>" class="btn tombol-facebook" target="_blank"><i class="fa fa-facebook"></i>&nbsp;</a>&nbsp;
                                <a href="https://api.whatsapp.com/send?text=<?= base_url() ?>loker/view/<?= $lowongan->seo_title ?> | <?= $lowongan->title ?>" class="btn tombol-whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            </div>
                            <hr>

                            <!-- <p class="p-b-25">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed turpis sed lorem dignissim vulputate nec cursus ante. Nunc sit amet tempor magna. Donec eros sem, porta eget leo et, varius eleifend mauris. Donec eu leo congue, faucibus quam eu, viverra mauris. Nulla consectetur lorem mi, at scelerisque metus hendrerit vitae. Proin vel magna vel neque porta ultricies non eget mauris. Suspendisse potenti.
								</p>

								<p class="p-b-25">
									Aliquam faucibus scelerisque placerat. Vestibulum vel libero eu nulla varius pretium eget eu magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean dictum faucibus felis, ac vestibulum risus mollis in. Phasellus neque dolor, euismod vitae auctor eget, dignissim a felis. Etiam malesuada elit a nibh aliquam, placerat ultricies nibh dictum. Nam ut egestas velit. Pellentesque viverra tincidunt tellus. Etiam cursus, ligula id vehicula cursus, turpis mauris facilisis massa, eget tincidunt est purus et odio. Nam quis luctus libero, non posuere velit. Ut eu varius diam, eu euismod elit. Donec efficitur, neque eu consectetur consectetur, dui sem consectetur felis, vitae rutrum risus urna vel arcu. Aliquam semper ullamcorper laoreet. Sed arcu lectus, fermentum imperdiet purus eu, ornare ornare libero.
								</p> -->
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

                        <div class="w-size25">
                            <!-- Button -->
                            <button class="flex-c-m size2 bg1 bo-rad-23 hov1 trans-0-4" data-toggle="modal" data-target="#exampleModalCenter">
                                <span style="color: white;  ">Lamar Posisi Ini</span>
                            </button>
                        </div>


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
                        <!-- <?php foreach ($lowongan as $key => $data) { ?>
                            <li class="flex-w p-b-20">
                                <a href="<?= site_url("shop/detail/$data->seo_title") ?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                                    <img src="<?= base_url() ?>assets/img/uploads/produk/<?= $data->gambar_name ?>" alt="IMG-PRODUCT">
                                </a>

                                <div class="w-size23 p-t-5">
                                    <a href="<?= site_url("shop/detail/$data->seo_name") ?>" class="s-text20">
                                        <b><?= character_limiter($data->name, 31) ?></b>
                                    </a>

                                    <span class="dis-block s-text17 p-t-6">
                                        <?= "Rp " . number_format($data->harga, 2, ',', '.'); ?>
                                    </span>
                                </div>
                            </li>
                        <?php } ?> -->
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