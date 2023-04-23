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
                                    <a href="#">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            Profile User
                                        </span><br><br>
                                    </a>
                                    <a href="#">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            Kelola Lamaran
                                        </span>
                                    </a>
                                </div>
                                <div class="col-md-3 mx-auto p-b-30">
                                    <a href="#">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            CV User
                                        </span><br><br>
                                    </a>
                                    <a href="#">
                                        <span class="caption2-slide1 m-text1 t-center m-b-33">
                                            Kelola Tes Ujian
                                        </span>
                                    </a>
                                </div>
                            <?php } elseif (userdata('role') == 2) { ?>
                                <div class="col-md-3 mx-auto p-b-30">
                                    <a href="#">
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
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Daftar Lowongan Pekerjaan
                </h3>
            </div>


            <div class="form contact-form">
                <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22 border border-dark" type="text" name="name" placeholder="Ketikkan Lowongan yang diinginkan">
                </div>
            </div>

            <div class="row">
                <!-- start foreach  -->
                <?php
                foreach ($lowongan as $key => $data) { ?>
                    <div class="col-md-4 p-b-30">
                        <div class="job-instructor-layout">
                            <div class="brows-job-type ">
                                <span class="full-time">Kontrak</span>
                            </div>
                            <div class="job-instructor-thumb text-center">
                                <img src="<?= base_url() ?>assets/img/logo.png" alt="" style="max-width: 8rem">
                            </div>
                            <div class="job-instructor-content">
                                <h4 class="instructor-title"><a href="#"></a></h4>
                                <div class="instructor-skills">
                                    Staff </div>
                                <div class="instructor-skills">
                                    <h5><?= $data['title']?></h5>
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