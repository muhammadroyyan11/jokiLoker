<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> - tambah data <?= $title ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add New User Account</h3>
            <div class="pull-right">
                <a href="<?= site_url('bankSoal') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="<?= site_url('bankSoal/proses') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                            <label>Soal</label>
                            <input type="file" name="file_soal" class="form-control"><br>
                            <input type="hidden" value="<?= $row->id_soal ?>" name="id_ujian">
                            <textarea class="form-control summernote" name="soal"><?= $this->input->post("soal") ?? $row->pertanyaan ?></textarea>
                        </div>  
                        <?php
                        $abjad = ['a', 'b', 'c', 'd'];
                        foreach ($abjad as $abj) :
                            $abjd = $abj;
                        ?>
                            <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                                <label>Pilihan <?= $abjd ?></label>
                                <input type="file" name="file_<?= $abjd ?>" class="form-control"><br>
                                <textarea class="form-control summernote" name="jawab_<?= $abjd ?>"><?= $this->input->post("jawab_'<?= $abjd ?>'") ?? $row->pertanyaan ?></textarea>
                                <span class="help-block"><?= form_error('nama') ?></span>
                            </div>

                        <?php endforeach; ?>
                        <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                            <label for="textarea-input" class=" form-control-label">Kunci Jawaban</label>
                            <select name="kunci" id="" class="form-control">
                                <option value="a">Pilihan A</option>
                                <option value="b">Pilihan B</option>
                                <option value="c">Pilihan C</option>
                                <option value="d">Pilihan D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">Simpan</button>
                            <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>