<div class="row" ng-controller="rablController">
  <div class="col-12 d-flex justify-content-start" style="margin-bottom: 12px">
    <a href="<?=base_url()?>rabl/content?url=add" class="btn btn-info btn-flat btn-sm"><i class="fas fa-plus-circle"></i> Tambah</a>
  </div>
  <div class="col-12">
    <div class="card card-warning card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-pengajuan-tab" data-toggle="pill" href="javascript.void();" data-target="#custom-tabs-one-pengajuan"
              role="tab" aria-controls="custom-tabs-one-pengajuan" aria-selected="true">Pengajuan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-disetujui-tab" data-toggle="pill" href="javascript.void();" data-target="#custom-tabs-one-disetujui"
              role="tab" aria-controls="custom-tabs-one-disetujui" aria-selected="false">Disetujui</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-pengajuan" role="tabpanel"
            aria-labelledby="custom-tabs-one-pengajuan-tab">
            <div class="table-responsive p-0">
              <table datatable="ng" class="table table-sm table-bordered table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th class="align-middle text-center">No</th>
                    <th class="align-middle text-center">Tanggal<br>Pengajuan</th>
                    <th class="align-middle text-center">OPD</th>
                    <th class="align-middle text-center">Nomor</th>
                    <th class="align-middle text-center">Tanggal</th>
                    <th class="align-middle text-center">Pekerjaan</th>
                    <th class="align-middle text-center">Nilai<br>Pekerjaan</th>
                    <th class="align-middle text-center">Sumber Dana</th>
                    <th class="align-middle text-center">Lokasi</th>
                    <th class="align-middle text-center">Waktu<br>Pelaksanaan</th>
                    <th class="align-middle text-center">Tahun<br>Anggaran</th>
                    <th class="align-middle text-center"><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in datas">
                    <td>{{$index+1}}</td>
                    <td>{{item.tanggalpengajuan}}</td>
                    <td>{{item.opd}}</td>
                    <td>{{item.nomor}}</td>
                    <td>{{item.tanggal}}</td>
                    <td>{{item.pekerjaan}}</td>
                    <td>{{item.nilaipekerjaan}}</td>
                    <td>{{item.sumberdana}}</td>
                    <td>{{item.lokasi}}</td>
                    <td>{{item.waktupelaksanaan}}</td>
                    <td>{{item.tahunanggaran}}</td>
                    <td class="d-flex justify-content-center">
                      <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
          <div class="tab-pane fade" id="custom-tabs-one-disetujui" role="tabpanel"
            aria-labelledby="custom-tabs-one-disetujui-tab">
            <div class="table-responsive p-0">
              <table class="table table-sm table-hover table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pengajuan</th>
                    <th>OPD</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Pekerjaan</th>
                    <th>Nilai Pekerjaan</th>
                    <th>Sumber Dana</th>
                    <th>Lokasi</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Tahun Anggaran</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in datas">
                    <td>{{$index+1}}</td>
                    <td>{{item.tanggalpengajuan}}</td>
                    <td>{{item.opd}}</td>
                    <td>{{item.nomor}}</td>
                    <td>{{item.tanggal}}</td>
                    <td>{{item.pekerjaan}}</td>
                    <td>{{item.nilaipekerjaan}}</td>
                    <td>{{item.sumberdana}}</td>
                    <td>{{item.lokasi}}</td>
                    <td>{{item.waktupelaksanaan}}</td>
                    <td>{{item.tahunanggaran}}</td>
                    <td class="d-flex justify-content-center">
                      <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>