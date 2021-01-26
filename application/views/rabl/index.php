<div class="row" ng-controller="rablController" ng-init="Init()">
  <input type="hidden" ng-model="role" value="Testing">
  <div ng-show="user.role=='OPD'" class="col-12 d-flex justify-content-start" style="margin-bottom: 12px">
    <a href="<?=base_url()?>rabl/content?url=add" class="btn btn-info btn-flat btn-sm"><i
        class="fas fa-plus-circle"></i> Tambah</a>
  </div>
  <div class="col-12">
    <div class="card card-warning card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-pengajuan-tab" data-toggle="pill" href="javascript.void();"
              data-target="#custom-tabs-one-pengajuan" role="tab" aria-controls="custom-tabs-one-pengajuan"
              aria-selected="true">Pengajuan &nbsp;<span ng-attr-title="{{proses.length}} Record" class="badge bg-danger" data-toggle="tooltip" data-placement="top" tooltip>{{proses.length}}</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-disetujui-tab" data-toggle="pill" href="javascript.void();"
              data-target="#custom-tabs-one-disetujui" role="tab" aria-controls="custom-tabs-one-disetujui"
              aria-selected="false">Disetujui &nbsp;<span ng-attr-title="{{disetujui.length}} Record" class="badge bg-danger" data-toggle="tooltip" data-placement="top" tooltip>{{disetujui.length}}</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-ditolak-tab" data-toggle="pill" href="javascript.void();"
              data-target="#custom-tabs-one-ditolak" role="tab" aria-controls="custom-tabs-one-ditolak"
              aria-selected="false">Ditolak &nbsp;<span ng-attr-title="{{ditolak.length}} Record" class="badge bg-danger" data-toggle="tooltip" data-placement="top" tooltip>{{ditolak.length}}</span></a>
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
                    <th class="align-middle text-center">Pelaksana</th>
                    <th class="align-middle text-center"><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in proses">
                    <td>{{$index+1}}</td>
                    <td>{{item.tanggal | date:'EEEE, dd MMMM y'}}</td>
                    <td>{{item.opd}}</td>
                    <td>{{item.pelaksana.nama}}</td>
                    <td class="d-flex justify-content-center">
                      <button type="button" style="margin-right: 5px"
                        title="{{item.suratperjanjian.id ? 'Lihat Surat' : 'Create Surat'}}" data-toggle="tooltip"
                        data-placement="top" tooltip
                        ng-class="{'btn btn-secondary btn-sm': !item.suratperjanjian, 'btn btn-primary btn-sm': item.suratperjanjian}"
                        ng-click="showModal('createSuratPerjanjian', item)"><i
                          ng-class="{'fas fa-search-plus': item.suratperjanjian, 'fas fa-pencil-alt': !item.suratperjanjian}"></i></button>
                      <a href="<?=base_url()?>rabl/content?url=update&param={{item.id}}" ng-show="user.role=='OPD'"
                        type="button" style="margin-right: 5px" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                          class="fas fa-edit"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
          <div class="tab-pane fade" id="custom-tabs-one-disetujui" role="tabpanel"
            aria-labelledby="custom-tabs-one-disetujui-tab">
            <div class="table-responsive p-0">
              <table datatable="ng" class="table table-sm table-bordered table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th class="align-middle text-center">No</th>
                    <th class="align-middle text-center">Tanggal<br>Pengajuan</th>
                    <th class="align-middle text-center">OPD</th>
                    <th class="align-middle text-center">Pelaksana</th>
                    <th class="align-middle text-center"><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in disetujui">
                    <td>{{$index+1}}</td>
                    <td>{{item.tanggal | date:'EEEE, dd MMMM y'}}</td>
                    <td>{{item.opd}}</td>
                    <td>{{item.pelaksana.nama}}</td>
                    <td class="d-flex justify-content-center">
                      <button type="button" style="margin-right: 5px"
                        title="{{item.suratperjanjian.id ? 'Lihat Surat' : 'Create Surat'}}" data-toggle="tooltip"
                        data-placement="top" tooltip
                        ng-class="{'btn btn-secondary btn-sm': !item.suratperjanjian, 'btn btn-primary btn-sm': item.suratperjanjian}"
                        ng-click="showModal('createSuratPerjanjian', item)"><i
                          ng-class="{'fas fa-search-plus': item.suratperjanjian, 'fas fa-pencil-alt': !item.suratperjanjian}"></i></button>
                      <!-- <a href="<?=base_url()?>rabl/content?url=update&param={{item.id}}" ng-show="user.role=='OPD'"
                        type="button" style="margin-right: 5px" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                          class="fas fa-edit"></i></a> -->
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-ditolak" role="tabpanel"
            aria-labelledby="custom-tabs-one-ditolak-tab">
            <div class="table-responsive p-0">
              <table datatable="ng" class="table table-sm table-bordered table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th class="align-middle text-center">No</th>
                    <th class="align-middle text-center">Tanggal<br>Pengajuan</th>
                    <th class="align-middle text-center">OPD</th>
                    <th class="align-middle text-center">Pelaksana</th>
                    <th class="align-middle text-center"><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in ditolak">
                    <td>{{$index+1}}</td>
                    <td>{{item.tanggal | date:'EEEE, dd MMMM y'}}</td>
                    <td>{{item.opd}}</td>
                    <td>{{item.pelaksana.nama}}</td>
                    <td class="d-flex justify-content-center">
                      <button type="button" style="margin-right: 5px"
                        title="{{item.suratperjanjian.id ? 'Lihat Surat' : 'Create Surat'}}" data-toggle="tooltip"
                        data-placement="top" tooltip
                        ng-class="{'btn btn-secondary btn-sm': !item.suratperjanjian, 'btn btn-primary btn-sm': item.suratperjanjian}"
                        ng-click="showModal('createSuratPerjanjian', item)"><i
                          ng-class="{'fas fa-search-plus': item.suratperjanjian, 'fas fa-pencil-alt': !item.suratperjanjian}"></i></button>
                      <a href="<?=base_url()?>rabl/content?url=update&param={{item.id}}" ng-show="user.role=='OPD'"
                        type="button" style="margin-right: 5px" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                          class="fas fa-edit"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="createSuratPerjanjian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h5 class="modal-title">Buat Surat Perjanjian</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" name="form" ng-submit="saveSurat()">
              <div class="modal-body">
                <div ng-class="{'col-md-12': !edit}">
                  <div class="row">
                    <div ng-class="{'col-md-6': !edit, 'col-md-12': edit}">
                      <div class="card card-warning">
                        <div class="card-header">
                          <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Surat Perjanjian
                          </h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="nomor"
                              ng-class="{'col-sm-4 col-form-label col-form-label-sm': edit, 'col-sm-5 col-form-label col-form-label-sm': !edit}">Nomor</label>
                            <label class="col-sm-1 col-form-label col-form-label-sm pull-right"
                              ng-show="!edit">:</label>
                            <div ng-class="{'col-sm-8': edit, 'col-sm-6': !edit}">
                              <input type="text"
                                ng-class="{'form-control  form-control-sm': edit, 'form-control-plaintext  form-control-sm': !edit}"
                                id="nomor" ng-model="model.suratperjanjian.nomor" placeholder="No. Surat" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="tanggal"
                              ng-class="{'col-sm-4 col-form-label col-form-label-sm': edit, 'col-sm-5 col-form-label col-form-label-sm': !edit}">tanggal</label>
                            <label class="col-sm-1 col-form-label col-form-label-sm pull-right"
                              ng-show="!edit">:</label>
                            <div ng-class="{'col-sm-8': edit, 'col-sm-6': !edit}">
                              <input type="date"
                                ng-class="{'form-control  form-control-sm': edit, 'form-control-plaintext  form-control-sm': !edit}"
                                id="tanggal" ng-model="model.suratperjanjian.tanggal" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="pekerjaan"
                              ng-class="{'col-sm-4 col-form-label col-form-label-sm': edit, 'col-sm-5 col-form-label col-form-label-sm': !edit}">Pekerjaan</label>
                            <label class="col-sm-1 col-form-label col-form-label-sm pull-right"
                              ng-show="!edit">:</label>
                            <div ng-class="{'col-sm-8': edit, 'col-sm-6': !edit}">
                              <input
                                ng-class="{'form-control  form-control-sm': edit, 'form-control-plaintext  form-control-sm': !edit}"
                                id="pekerjaan" ng-model="model.suratperjanjian.pekerjaan"
                                placeholder="pekerjaan Petugas" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="nilaipekerjaan"
                              ng-class="{'col-sm-4 col-form-label col-form-label-sm': edit, 'col-sm-5 col-form-label col-form-label-sm': !edit}">Nilai
                              Pekerjaan</label>
                            <label class="col-sm-1 col-form-label col-form-label-sm pull-right"
                              ng-show="!edit">:</label>
                            <div ng-class="{'col-sm-8': edit, 'col-sm-6': !edit}">
                              <input type="text" readonly class="form-control-plaintext  form-control-sm"
                                id="nilaipekerjaan" ui-money-mask="0" ng-model="model.suratperjanjian.nilaipekerjaan"
                                placeholder="Nilai Pekerjaan" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="sumberdana"
                              ng-class="{'col-sm-4 col-form-label col-form-label-sm': edit, 'col-sm-5 col-form-label col-form-label-sm': !edit}">Sumber
                              Dana</label>
                            <label class="col-sm-1 col-form-label col-form-label-sm pull-right"
                              ng-show="!edit">:</label>
                            <div ng-class="{'col-sm-8': edit, 'col-sm-6': !edit}">
                              <input type="text"
                                ng-class="{'form-control  form-control-sm': edit, 'form-control-plaintext  form-control-sm': !edit}"
                                id="sumberdana" ng-model="model.suratperjanjian.sumberdana" placeholder="Sumber Dana"
                                required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="lokasi"
                              ng-class="{'col-sm-4 col-form-label col-form-label-sm': edit, 'col-sm-5 col-form-label col-form-label-sm': !edit}">Lokasi</label>
                            <label class="col-sm-1 col-form-label col-form-label-sm pull-right"
                              ng-show="!edit">:</label>
                            <div ng-class="{'col-sm-8': edit, 'col-sm-6': !edit}">
                              <input type="lokasi"
                                ng-class="{'form-control  form-control-sm': edit, 'form-control-plaintext  form-control-sm': !edit}"
                                id="lokasi" ng-model="model.suratperjanjian.lokasi" placeholder="Lokasi" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="waktupelaksanaan"
                              ng-class="{'col-sm-4 col-form-label col-form-label-sm': edit, 'col-sm-5 col-form-label col-form-label-sm': !edit}">Waktu
                              Pelaksanaan</label>
                            <label class="col-sm-1 col-form-label col-form-label-sm pull-right"
                              ng-show="!edit">:</label>
                            <div ng-class="{'col-sm-8': edit, 'col-sm-6': !edit}">
                              <input type="text"
                                ng-class="{'form-control  form-control-sm': edit, 'form-control-plaintext  form-control-sm': !edit}"
                                id="waktupelaksanaan" ng-model="model.suratperjanjian.waktupelaksanaan"
                                placeholder="Waktu Pelaksanaan Pekerjaan" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="tahunanggaran"
                              ng-class="{'col-sm-4 col-form-label col-form-label-sm': edit, 'col-sm-5 col-form-label col-form-label-sm': !edit}">Tahun
                              Anggaran</label>
                            <label class="col-sm-1 col-form-label col-form-label-sm pull-right"
                              ng-show="!edit">:</label>
                            <div ng-class="{'col-sm-8': edit, 'col-sm-6': !edit}">
                              <input type="text"
                                ng-class="{'form-control  form-control-sm': edit, 'form-control-plaintext  form-control-sm': !edit}"
                                id="tahunanggaran" ng-model="model.suratperjanjian.tahunanggaran"
                                placeholder="Tahun Anggaran" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div ng-class="{'col-md-6': !edit, 'col-md-12': edit}">
                      <div class="card card-warning">
                        <div class="card-header">
                          <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp;
                            {{model.suratperjanjian.id && edit ? 'Ubah Berkas' : model.suratperjanjian.id && !edit ?
                            'Download Berkas' : 'Upload Berkas'}}</h3>

                        </div>
                        <div class="card-body">
                          <span style="color: red" class="text-center" ng-show="edit && model.suratperjanjian.id">nb.
                            {{'Kosongkan File jika tidak ingin mengganti'}}</span><br>
                          <div class="col-12 col-md-12" ng-show="edit">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">Surat Pesan Kendaraan</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm" id="suratpesankendaraan"
                                    name="suratpesankendaraan" id="suratpesankendaraan"
                                    ng-model="model.suratperjanjian.suratpesankendaraan" accept=".pdf" maxsize="5000"
                                    base-sixty-four-input ng-change="logFile(model.suratpesankendaraan)">
                                  <label class="custom-file-label col-form-label-sm"
                                    for="suratpesankendaraan">{{model.suratperjanjian.suratpesankendaraan ?
                                    model.suratperjanjian.suratpesankendaraan.filename :
                                    'Pilih File'}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.suratpesankendaraan.$error.maxsize">Files must
                                  not exceed
                                  5000 KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">BA Serah Terima</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm" id="baserahterima"
                                    name="baserahterima" id="baserahterima"
                                    ng-model="model.suratperjanjian.baserahterima" accept=".pdf" maxsize="5000"
                                    base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="baserahterima">{{model.suratperjanjian.baserahterima ?
                                    model.suratperjanjian.baserahterima.filename : 'Pilih File'}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.baserahterima.$error.maxsize">Files must not
                                  exceed 5000
                                  KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">BA Pembayaran</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm" id="bapembayaran"
                                    name="bapembayaran" id="bapembayaran" ng-model="model.suratperjanjian.bapembayaran"
                                    accept=".pdf" maxsize="5000" base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="bapembayaran">{{model.suratperjanjian.bapembayaran ?
                                    model.suratperjanjian.bapembayaran.filename : ' Pilih File'}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.bapembayaran.$error.maxsize">Files must not
                                  exceed 5000
                                  KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">BA Pemeriksaan Pekerjaan</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm" id="bapemeriksaanpek"
                                    name="bapemeriksaanpek" id="bapemeriksaanpek"
                                    ng-model="model.suratperjanjian.bapemeriksaanpek" accept=".pdf" maxsize="5000"
                                    base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="bapemeriksaanpek">{{model.suratperjanjian.bapemeriksaanpek ?
                                    model.suratperjanjian.bapemeriksaanpek.filename : "Pilih
                                    File"}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.bapemeriksaanpek.$error.maxsize">Files must not
                                  exceed 5000
                                  KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">BA Pemeriksaan Adm. Pek.</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm"
                                    id="bapemeriksaanadmnhslpek" name="bapemeriksaanadmnhslpek"
                                    id="bapemeriksaanadmnhslpek"
                                    ng-model="model.suratperjanjian.bapemeriksaanadmnhslpek" accept=".pdf"
                                    maxsize="5000" base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="bapemeriksaanadmnhslpek">{{model.suratperjanjian.bapemeriksaanadmnhslpek ?
                                    model.suratperjanjian.bapemeriksaanadmnhslpek.filename : "Pilih File"}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.bapemeriksaanadmnhslpek.$error.maxsize">Files
                                  must not
                                  exceed 5000 KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">Surat Penawaran Harga</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm" id="srtpenawaranhrg"
                                    name="srtpenawaranhrg" id="srtpenawaranhrg"
                                    ng-model="model.suratperjanjian.srtpenawaranhrg" accept=".pdf" maxsize="5000"
                                    base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="srtpenawaranhrg">{{model.suratperjanjian.srtpenawaranhrg
                                    ? model.suratperjanjian.srtpenawaranhrg.filename : "Pilih File"}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.srtpenawaranhrg.$error.maxsize">Files must not
                                  exceed 5000
                                  KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">Surat Persetujuan Harga</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm" id="srtpersetujuanhrg"
                                    name="srtpersetujuanhrg" id="srtpersetujuanhrg"
                                    ng-model="model.suratperjanjian.srtpersetujuanhrg" accept=".pdf" maxsize="5000"
                                    base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="srtpersetujuanhrg">{{model.suratperjanjian.srtpersetujuanhrg ?
                                    model.suratperjanjian.srtpersetujuanhrg.filename : "Pilih
                                    File"}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.srtpersetujuanhrg.$error.maxsize">Files must not
                                  exceed
                                  5000 KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">Surat Penunjukan Langsung</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm"
                                    id="srtpenunjukanlangsung" name="srtpenunjukanlangsung" id="srtpenunjukanlangsung"
                                    ng-model="model.suratperjanjian.srtpenunjukanlangsung" accept=".pdf" maxsize="5000"
                                    base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="srtpenunjukanlangsung">{{model.suratperjanjian.srtpenunjukanlangsung ?
                                    model.suratperjanjian.srtpenunjukanlangsung.filename : "Pilih File"}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.srtpenunjukanlangsung.$error.maxsize">Files must
                                  not exceed
                                  5000 KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">Surat Penunjukan Penyeda
                                Barang</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm"
                                    id="srtpenunjukanpenyediabrg" name="srtpenunjukanpenyediabrg"
                                    id="srtpenunjukanpenyediabrg"
                                    ng-model="model.suratperjanjian.srtpenunjukanpenyediabrg" accept=".pdf"
                                    maxsize="5000" base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="srtpenunjukanpenyediabrg">{{model.suratperjanjian.srtpenunjukanpenyediabrg ?
                                    model.suratperjanjian.srtpenunjukanpenyediabrg.filename : "Pilih File"}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.srtpenunjukanpenyediabrg.$error.maxsize">Files
                                  must not
                                  exceed 5000 KB</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label col-form-label-sm">Surat Perjanjian
                                Pengadaan</label>
                              <div class="col-sm-8">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input form-control-sm"
                                    id="srtperjanjianpengadaan" name="srtperjanjianpengadaan"
                                    id="srtperjanjianpengadaan" ng-model="model.suratperjanjian.srtperjanjianpengadaan"
                                    accept=".pdf" maxsize="5000" base-sixty-four-input>
                                  <label class="custom-file-label col-form-label-sm"
                                    for="srtpenunjukanpenyediabrg">{{model.suratperjanjian.srtperjanjianpengadaan ?
                                    model.suratperjanjian.srtperjanjianpengadaan.filename : "Pilih File"}}</label>
                                </div>
                                <span style="color:red;" ng-show="form.srtperjanjianpengadaan.$error.maxsize">Files must
                                  not
                                  exceed 5000 KB
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-md-12" ng-show="!edit">
                            <ul>
                              <li ng-repeat="itemberkas in model.berkas">
                                <a ng-if="itemberkas.berkas !== ''" href="{{itemberkas.berkas}}"
                                  target="_blank">{{itemberkas.nama}}</a>
                                <a ng-if="itemberkas.berkas == ''" disabled>{{itemberkas.nama}}&nbsp;(empty)</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm"
                  ng-click="model.suratperjanjian.id && edit ? edit=false : closeModal('createSuratPerjanjian')">{{model.suratperjanjian.id
                  && edit ? 'Back' : 'Close'}}</button>
                <button ng-show="!edit && user.role=='OPD' && model.suratperjanjian.status != 'Y'" type="button" ng-click="edit=true"
                  ng-class="{'btn btn-warning btn-sm': !edit}" title="Ubah Surat Perjanjiann" data-toggle="tooltip"
                  data-placement="top" tooltip>Edit</button>
                <button ng-show="edit && user.role=='OPD'" type="submit" ng-class="{'btn btn-primary btn-sm': edit}"
                  title="Simpan Surat Perjanjian" data-toggle="tooltip" data-placement="top" tooltip>Simpan</button>
                <button ng-show="user.role=='Admin' && model.suratperjanjian.status == 'P'" type="button"
                  class="btn btn-primary btn-sm" ng-click="persetujuanSurat(model.suratperjanjian.id,'Y')"
                  title="Setujui RABL" data-toggle="tooltip" data-placement="top" tooltip>Persetujuan</button>
                <button ng-show="user.role=='Admin' && model.suratperjanjian.status == 'P'" type="button"
                  class="btn btn-warning btn-sm" ng-click="modalCatatan(model.suratperjanjian.id)" title="Tolak RABL"
                  data-toggle="tooltip" data-placement="top" tooltip>Tolak</button>
                <button ng-show="model.suratperjanjian.id" type="button" style="margin-right: 5px"
                  class="btn btn-info btn-sm" ng-click="download(model.id, model.pelaksanaid)"><i
                    class="fas fa-download"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="showCatatan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content" role="document">
            <div class="modal-header">
              <h5 class="modal-title">Catatan Penolakan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form ng-submit="persetujuanSurat(model.id, 'N', model.catatan)" role="form">
                <div class="form-group">
                  <label for="input">Catatan</label>
                  <textarea id="input" class="form-control" rows="3" required="required"
                    ng-model="model.catatan">Tinggalkan catatan penolakan disini</textarea>
                </div>
                <button type="submit" class="btn btn-warning">Tolak</button>
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>