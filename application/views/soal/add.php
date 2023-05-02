<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title-5 m-b-35"> <?= $title ?></h3><br>

                    <form action="<?= site_url('bankSoal/prosesAdd') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Soal</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="form-group">
                                            <input type="file" name="file_soal" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control summernote" name="pertanyaan"><?= $this->input->post("pertanyaan") ?? $row->pertanyaan ?></textarea>
                                            <?php
                                            if ($page == 'edit') { ?>
                                                <input type="hidden" value="<?= $row->id_soal ?>" name="id_ujian">
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $abjad = ['a', 'b', 'c', 'd'];
                                foreach ($abjad as $abj) :
                                    $abjd = $abj;
                                ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Pilihan <?= strtoupper($abjd) ?></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <!-- <div class="form-group">
                                                <input type="file" name="file_<?= $abjd ?>" class="form-control">
                                            </div> -->
                                            <div class="form-group">
                                                <textarea class="form-control summernote" name="p_<?= $abjd ?>"><?= $this->input->post("jawab_'<?= $abjd ?>'") ?? $row->pertanyaan ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Kunci Jawaban</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kunci" id="" class="form-control">
                                            <option value="a">Pilihan A</option>
                                            <option value="b">Pilihan B</option>
                                            <option value="c">Pilihan C</option>
                                            <option value="d">Pilihan D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>