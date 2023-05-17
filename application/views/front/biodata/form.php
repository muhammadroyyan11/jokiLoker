<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container">
                <div class="row">
                    <!-- Start  contact -->
                    <div class="col-md-6 col-md-offset-6">
                        <div class="form contact-form">
                            <div class="sec-title p-b-60">
                                <h3 class="m-text5 t-center">
                                    Biodata
                                </h3>
                            </div>
                            <form action="/action_page.php">
                                <div class="form-group">
                                    <label for="email">Nama Lengkap</label>
                                    <input type="text" class="form-control border" autocomplete="off" placeholder="Masukkan Nama Lengkap" value="<?= $row->nama ?>" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Alamat:</label>
                                    <input type="text" class="form-control border" autocomplete="off" placeholder="Masukkan Nama Lengkap" value="<?=  $row->alamat ?>" name="alamat">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Agama:</label>
                                    <select name="agama" id="" class="form-control border">
                                        <option value="">asd</option>
                                        <option value="">asd</option>
                                    </select>
                                </div>
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"> Remember me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-6">
                        <div class="form contact-form">
                            <div class="sec-title p-b-60">
                                <h3 class="m-text5 t-center">
                                    File penunjang
                                </h3>
                            </div>
                            <form action="/action_page.php">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control border" autocomplete="off" placeholder="Enter email" id="email">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div><!-- End Contact Section -->
</section>