<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <!-- <p>&nbsp;</p> -->
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
      <!-- <li
        ng-class="{'nav-item menu-open': header=='Pelanggan' || header=='Pembelian', 'nav-item': header!='Pelanggan' || header!='Pembelian'}">
        <a href="#"
          ng-class="{'nav-link active': header=='Pelanggan' || header=='Pembelian', 'nav-link': header!='Pelanggan' || header!='Pembelian'}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Master Data
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?=base_url('pelanggan')?>"
              ng-class="{'nav-link active': header=='Pelanggan', 'nav-link': header!='Pelanggan'}">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('pembelian')?>"
              ng-class="{'nav-link active': header=='Pembelian', 'nav-link': header!='Pembelian'}">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Pembelian
              </p>
            </a>
          </li>
        </ul>
      </li> -->
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
        <a href="<?=base_url('pesan')?>"
          ng-class="{'nav-link active': header=='Pesan Broadcast', 'nav-link': header!='Pesan Broadcast'}">
          <i class="nav-icon fas fa-sms"></i>
          <p>
            Pesan Broadcast
          </p>
        </a>
      </li>
      <li
        ng-class="{'nav-item menu-open': header=='Laporan Pembelian' || header=='Laporan Penjualan', 'nav-item': header!='Laporan Pembelian' || header!='Laporan Penjualan'}">
        <a href="#"
          ng-class="{'nav-link active': header=='Laporan Pembelian' || header=='Laporan Penjualan', 'nav-link': header!='Laporan Pembelian' || header!='Laporan Penjualan'}">
          <i class="nav-icon fas fa-file"></i>
          <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?=base_url('pembelian/laporan')?>"
              ng-class="{'nav-link active': header=='Laporan Pembelian', 'nav-link': header!='Laporan Pembelian'}">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Pembelian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('transaksi/laporan')?>"
              ng-class="{'nav-link active': header=='Laporan Penjualan', 'nav-link': header!='Laporan Penjualan'}">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Penjualan
              </p>
            </a>
          </li>
        </ul>
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