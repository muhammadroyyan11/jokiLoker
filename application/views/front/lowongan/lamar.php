<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <!-- Start  contact -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form contact-form">
                            <div class="sec-title p-b-60">
                                <h3 class="m-text5 t-center">
                                    Form pelamar
                                </h3>
                                <h5 class="m-text2 t-center" style="margin-top:12px; font-style: bold; font-size:2 20px">
                                    <?= $lowongan->title ?>
                                </h5>
                            </div>
                            <?php
                            if (userdata('cv') == null) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Anda tidak bisa melamar pekerjaan, Silahkan Upload CV Terlebih dahulu, klik <a href="<?= site_url('loker')?>">Disini</a> untuk melengkapi Biodata
                                </div>
                            <?php }
                            ?>
                            <form action="<?= site_url('loker/prosesLamar'); ?>" method="post" role="form" class="php-email-form">

                                <div class="bo4 of-hidden size15 m-b-20">
                                    <input class="sizefull s-text7 p-l-22 p-r-22 border border-dark" type="text" name="name" value="<?= $user->nama ?>" placeholder="Full Name">
                                </div>

                                <div class="bo4 of-hidden size15 m-b-20">
                                    <input class="sizefull s-text7 p-l-22 p-r-22 border border-dark" type="text" name="phone" value="<?= $user->no_telp ?>" placeholder="Phone Number">
                                </div>

                                <div class="bo4 of-hidden size15 m-b-20">
                                    <input class="sizefull s-text7 p-l-22 p-r-22 border border-dark" type="text" name="email" value="<?= $user->email ?>" placeholder="Email Address" />
                                </div>
                                <input type="hidden" name="user_id" value="<?= $user->id_user ?>">
                                <input type="hidden" name="lowongan_id" value="<?= $lowongan->id_lowongan ?>">
                                <input type="hidden" name="ujian_id" value="<?= $lowongan->id_ujian ?>">

                                <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20 border border-dark" name="deskripsi" placeholder="Tuliskan singkat deskripsi diri anda"></textarea>
                                <?php
                                if (userdata('cv') != null) { ?>
                                    <div class="w-size25">
                                        <!-- Button -->
                                        <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                            Send
                                        </button>
                                    </div>
                                <?php }
                                ?>
                            </form>
                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div><!-- End Contact Section -->
</section>