<div class="row" ng-controller="laporanController">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Laporan</h3>
        <div class="card-tools">
          <div class="input-group">
            <!-- <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
              </span>
            </div>
            <input type="text" class="form-control float-right form-control-sm" ng-model="tanggal" id="reservationtime"
              ng-change="tampil(tanggal)"> -->
            <button class="btn btn-primary btn-sm"><i class="fas fa-print" ng-click="print()"></i></button>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 500px;">
        <div id="print">
          <div class="screen">
            <div class="col-md-12 d-flex justify-content-between">
              <div class="col-md-4"><img src="<?=base_url('public/img/logo.png');?>" width="100px"></div>
              <div class="col-md-4 text-center">
                <h2>LAPORAN</h2><h5>RENCANA ANGGARAN BELANJA LANGSUNG</h5>
              </div>
              <div class="col-md-4">&nbsp;</div>
            </div>
            <hr class="style2" style="margin-bottom:12px"><br>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle">NAMA OPD</th>
                <th class="text-center align-middle">PEJABAT</th>
                <th class="text-center align-middle">NAMA DAN TYPE KENDARAAN</th>
                <th class="text-center align-middle">NOMOR RANGKA</th>
                <th class="text-center align-middle">PLAT<br>NOMOR</th>
                <th class="text-center align-middle">TAHUN<br>PEROLEHAN</th>
                <th class="text-center align-middle">KETERANGAN</th>
              </tr>
            </thead>
            <tbody ng-repeat="itemopd in datas track by $index">
              <tr>
                <td colspan="8" class="bg-warning">{{itemopd.opd}}</td>
              </tr>
              <tr ng-repeat="item in itemopd.detail track by $index">
                <td>{{$index+1}}</td>
                <td>{{item.opd}}</td>
                <td>{{item.pejabat}}<br>{{item.jabatan}}</td>
                <td>{{item.merk + ' ' +item.type}}</td>
                <td class="text-center">{{item.nomorrangka}}</td>
                <td class="text-center">{{item.nomorplat}}</td>
                <td class="text-center">{{item.tahunperolehan}}</td>
                <td>{{item.keterangan}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>