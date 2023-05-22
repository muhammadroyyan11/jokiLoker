<section class="content-header">
  <h1>Dashboard
    <small>Dashboard</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>
  </ol>
  <hr>
</section>

<?php if (userdata('role') == 2 || userdata('role') == 1) { ?>
  <section>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $this->fungsi->count_lowongan(); ?></h3>

          <p>Lowongan aktif</p>
        </div>
        <div class="icon">
          <i class="fa fa-paperclip"></i>
        </div>
        <a href="<?= site_url('kelolaLowongan')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-gray">
        <div class="inner">
          <h3><?= $this->fungsi->count_newMember(); ?></h3>

          <p>Akun baru (Bulan Ini)</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="<?= site_url('user/bulan')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $this->fungsi->count_karyawan(); ?></h3>

          <p>Account Management</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="<?= site_url('user')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><?= $this->fungsi->count_upload_cv(); ?></h3>

          <p>User Upload CV</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="<?= site_url('user/uploaded')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h3><?= $this->fungsi->count_no_upload(); ?></h3>

          <p>User Belum pload CV</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="<?= site_url('user/not_uploaded')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $this->fungsi->count_dept(); ?></h3>

          <p>Department</p>
        </div>
        <div class="icon">
          <i class="fa fa-building-o"></i>
        </div>
        <a href="<?= site_url('kategori')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $this->fungsi->count_subDept(); ?></h3>

          <p>Sub Department</p>
        </div>
        <div class="icon">
          <i class="fa fa-building-o"></i>
        </div>
        <a href="<?= site_url('subKategori')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </section>
<?php } ?>