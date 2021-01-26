<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <!-- <p>&nbsp;</p> -->
      <p style="color:white">Selamat Datang</p>
      <a href="#" class="d-block  text-wrap">
        <?=strtoupper($this->session->userdata('nama'));?>
      </a>
      <a href="#" class="d-block  text-wrap">
        <?=$this->session->userdata('role') == 'OPD' ? ucfirst($this->session->userdata('opd')) : strtoupper($this->session->userdata('jabatan'));?>
      </a>
            <!-- <img src="<?=base_url()?>favicon.ico" class="img-circle elevation-2" alt="User Image"> -->
    </div>
    <!-- <div class="info">
    </div> -->
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <?php
$a = $this->session->userdata('role');
if ($this->session->userdata('role') == "Admin"):
?>
      <li class="nav-item">
        <a href="<?=base_url('home')?>" ng-class="{'nav-link active': header=='Home', 'nav-link': header!='Home'}">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Home
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=base_url('pengguna')?>"
          ng-class="{'nav-link active': header=='Manajemen User', 'nav-link': header!='Manajemen User'}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            User
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=base_url('opd')?>"
          ng-class="{'nav-link active': header=='Manajemen OPD', 'nav-link': header!='Manajemen OPD'}">
          <i class="nav-icon fas fa-user"></i>
          <p>
            OPD
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=base_url('kendaraan')?>"
          ng-class="{'nav-link active': header=='Data Kendaraan', 'nav-link': header!='Data Kendaraan'}">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Kendaraan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=base_url('rabl')?>"
          ng-class="{'nav-link active': header=='Manajemen RAB', 'nav-link': header!='Manajemen RAB'}">
          <i class="nav-icon fas fa-money-check-alt"></i>
          <p>
            RABL
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=base_url('laporan')?>"
          ng-class="{'nav-link active': header=='Laporan', 'nav-link': header!='Laporan'}">
          <i class="nav-icon fas fa-file"></i>
          <p>
            Laporan
          </p>
        </a>
      </li>
      <?php else: ?>
        <li class="nav-item">
          <a href="<?=base_url('home')?>" ng-class="{'nav-link active': header=='Home', 'nav-link': header!='Home'}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item">
        <a href="<?=base_url('rabl')?>"
          ng-class="{'nav-link active': header=='Manajemen RABL' || header=='Tambah RABL' || header=='Ubah RABL', 'nav-link': header!='Manajemen RABL' || header!='Tambah RABL' || header!='Ubah RABL'}">
          <i class="nav-icon fas fa-money-check-alt"></i>
          <p>
            RABL & SP
          </p>
        </a>
      </li>
      <?php endif;?>

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>