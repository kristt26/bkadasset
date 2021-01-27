<div ng-controller="homeController">
  <div class="col-md-12">
    <div class="row" style="margin-bottom: 50px">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
            <h3>{{datas.opd}}</h3>

            <p>Jumlah OPD</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?=base_url('opd')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{datas.pengajuan}}<sup style="font-size: 20px"></sup></h3>

            <p>Jumlah RABL</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?=base_url('rabl')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{datas.disetujui}}</h3>

            <p>RABL Diajukan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?=base_url('rabl#custom-tabs-one-pengajuan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{datas.ditolak}}</h3>

            <p>RABL Disetujui</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="<?=base_url('rabl#custom-tabs-one-disetujui')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      </div>
    </div>
  <!-- <div class="col-lg-12 text-center">
    <img src="<?=base_url('public/img/logo.png')?>" alt="" width="10%">
    <h3>SISTEM INFORMASI PENATAUSAHAAN ASSET TETAP DAERAH KOTA JAYAPURA</h3>
  </div> -->
</div>
