<div class="row" ng-controller="rablController">
  <div class="col-12 d-flex justify-content-start" style="margin-bottom: 12px">
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
              aria-selected="true">Pengajuan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-disetujui-tab" data-toggle="pill" href="javascript.void();"
              data-target="#custom-tabs-one-disetujui" role="tab" aria-controls="custom-tabs-one-disetujui"
              aria-selected="false">Disetujui</a>
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
                    <!-- <th class="align-middle text-center">Nomor</th>
                    <th class="align-middle text-center">Tanggal</th>
                    <th class="align-middle text-center">Pekerjaan</th>
                    <th class="align-middle text-center">Nilai<br>Pekerjaan</th>
                    <th class="align-middle text-center">Sumber Dana</th>
                    <th class="align-middle text-center">Lokasi</th>
                    <th class="align-middle text-center">Waktu<br>Pelaksanaan</th>
                    <th class="align-middle text-center">Tahun<br>Anggaran</th> -->
                    <th class="align-middle text-center"><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in datas">
                    <td>{{$index+1}}</td>
                    <td>{{item.tanggal | date:'EEEE, dd MMMM y'}}</td>
                    <td>{{item.opd}}</td>
                    <td>{{item.pelaksana.nama}}</td>
                    <!-- <td>{{item.nomor}}</td>
                    <td>{{item.tanggal}}</td>
                    <td>{{item.pekerjaan}}</td>
                    <td>{{item.nilaipekerjaan}}</td>
                    <td>{{item.sumberdana}}</td>
                    <td>{{item.lokasi}}</td>
                    <td>{{item.waktupelaksanaan}}</td>
                    <td>{{item.tahunanggaran}}</td> -->
                    <td class="d-flex justify-content-center">
                      <button type="button" style="margin-right: 5px" title="{{item.suratperjanjian.id ? 'Lihat Surat' : 'Create Surat'}}" data-toggle="tooltip" data-placement="top" tooltip ng-class="{'btn btn-secondary btn-sm': !item.suratperjanjian, 'btn btn-primary btn-sm': item.suratperjanjian}"
                        ng-click="showModal('createSuratPerjanjian', item)"><i ng-class="{'fas fa-search-plus': item.suratperjanjian, 'fas fa-pencil-alt': !item.suratperjanjian}"></i></button>
                      <button type="button" style="margin-right: 5px" class="btn btn-warning btn-sm"
                        ng-click="edit(item)"><i class="fas fa-edit"></i></button>
                      <button type="button" style="margin-right: 5px" class="btn btn-info btn-sm"
                        ng-click="export()"><i class="fas fa-print"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
          <div class="tab-pane fade" id="custom-tabs-one-disetujui" role="tabpanel"
            aria-labelledby="custom-tabs-one-disetujui-tab">
            <div class="table-responsive p-0">
              <!-- <table class="table table-sm table-hover table-head-fixed text-nowrap">
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
              </table> -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
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
        <form role="form" name="form" ng-submit="save()">
          <div class="modal-body">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Surat Perjanjian</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nomor" class="col-sm-4 col-form-label col-form-label-sm">Nomor</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control  form-control-sm" id="nomor" ng-model="model.suratperjanjian.nomor"
                        placeholder="No. Surat">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tanggal" class="col-sm-4 col-form-label col-form-label-sm">tanggal</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control  form-control-sm" id="tanggal" ng-model="model.suratperjanjian.tanggal">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-4 col-form-label col-form-label-sm">Pekerjaan</label>
                    <div class="col-sm-8">
                      <input class="form-control  form-control-sm" id="pekerjaan" ng-model="model.suratperjanjian.pekerjaan"
                        placeholder="pekerjaan Petugas">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nilaipekerjaan" class="col-sm-4 col-form-label col-form-label-sm">Nilai Pekerjaan</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control-plaintext  form-control-sm" id="nilaipekerjaan" ui-money-mask="0"
                        ng-model="model.suratperjanjian.nilaipekerjaan" placeholder="Nilai Pekerjaan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sumberdana" class="col-sm-4 col-form-label col-form-label-sm">Sumber Dana</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control  form-control-sm" id="sumberdana" ng-model="model.suratperjanjian.sumberdana"
                        placeholder="Sumber Dana">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="lokasi" class="col-sm-4 col-form-label col-form-label-sm">Lokasi</label>
                    <div class="col-sm-8">
                      <input type="lokasi" class="form-control  form-control-sm" id="lokasi" ng-model="model.suratperjanjian.lokasi"
                        placeholder="Lokasi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="waktupelaksanaan" class="col-sm-4 col-form-label col-form-label-sm">Waktu
                      Pelaksanaan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control  form-control-sm" id="waktupelaksanaan"
                        ng-model="model.suratperjanjian.waktupelaksanaan" placeholder="Waktu Pelaksanaan Pekerjaan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tahunanggaran" class="col-sm-4 col-form-label col-form-label-sm">Tahun Anggaran</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control  form-control-sm" id="tahunanggaran"
                        ng-model="model.suratperjanjian.tahunanggaran" placeholder="Tahun Anggaran">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Upload Berkas</h3>
                </div>
                <div class="card-body">
                  <div class="col-12 col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">Surat Pesan Kendaraan</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="suratpesankendaraan"
                            name="suratpesankendaraan" id="suratpesankendaraan" ng-model="model.suratperjanjian.suratpesankendaraan"
                            accept=".pdf" maxsize="5000" required base-sixty-four-input
                            ng-change="logFile(model.suratpesankendaraan)">
                          <label class="custom-file-label col-form-label-sm"
                            for="suratpesankendaraan">{{model.suratperjanjian.suratpesankendaraan ? model.suratperjanjian.suratpesankendaraan.filename :
                            'Pilih File'}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.suratpesankendaraan.$error.maxsize">Files must not exceed
                          5000 KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">BA Serah Terima</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="baserahterima"
                            name="baserahterima" id="baserahterima" ng-model="model.suratperjanjian.baserahterima" accept=".pdf"
                            maxsize="5000" required base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm" for="baserahterima">{{model.suratperjanjian.baserahterima ?
                            model.suratperjanjian.baserahterima.filename : 'Pilih File'}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.baserahterima.$error.maxsize">Files must not exceed 5000
                          KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">BA Pembayaran</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="bapembayaran"
                            name="bapembayaran" id="bapembayaran" ng-model="model.suratperjanjian.bapembayaran" accept=".pdf"
                            maxsize="5000" required base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm" for="bapembayaran">{{model.suratperjanjian.bapembayaran ?
                            model.suratperjanjian.bapembayaran.filename : ' Pilih File'}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.bapembayaran.$error.maxsize">Files must not exceed 5000
                          KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">BA Pemeriksaan Pekerjaan</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="bapemeriksaanpek"
                            name="bapemeriksaanpek" id="bapemeriksaanpek" ng-model="model.suratperjanjian.bapemeriksaanpek" accept=".pdf"
                            maxsize="5000" required base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm"
                            for="bapemeriksaanpek">{{model.suratperjanjian.bapemeriksaanpek ? model.suratperjanjian.bapemeriksaanpek.filename : "Pilih
                            File"}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.bapemeriksaanpek.$error.maxsize">Files must not exceed 5000
                          KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">BA Pemeriksaan Adm. Pek.</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="bapemeriksaanadmnhslpek"
                            name="bapemeriksaanadmnhslpek" id="bapemeriksaanadmnhslpek"
                            ng-model="model.suratperjanjian.bapemeriksaanadmnhslpek" accept=".pdf" maxsize="5000" required
                            base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm"
                            for="bapemeriksaanadmnhslpek">{{model.suratperjanjian.bapemeriksaanadmnhslpek ?
                            model.suratperjanjian.bapemeriksaanadmnhslpek.filename : "Pilih File"}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.bapemeriksaanadmnhslpek.$error.maxsize">Files must not
                          exceed 5000 KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">Surat Penawaran Harga</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="srtpenawaranhrg"
                            name="srtpenawaranhrg" id="srtpenawaranhrg" ng-model="model.suratperjanjian.srtpenawaranhrg" accept=".pdf"
                            maxsize="5000" required base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm" for="srtpenawaranhrg">{{model.suratperjanjian.srtpenawaranhrg
                            ? model.suratperjanjian.srtpenawaranhrg.filename : "Pilih File"}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.srtpenawaranhrg.$error.maxsize">Files must not exceed 5000
                          KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">Surat Persetujuan Harga</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="srtpersetujuanhrg"
                            name="srtpersetujuanhrg" id="srtpersetujuanhrg" ng-model="model.suratperjanjian.srtpersetujuanhrg"
                            accept=".pdf" maxsize="5000" required base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm"
                            for="srtpersetujuanhrg">{{model.suratperjanjian.srtpersetujuanhrg ? model.suratperjanjian.srtpersetujuanhrg.filename : "Pilih
                            File"}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.srtpersetujuanhrg.$error.maxsize">Files must not exceed
                          5000 KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">Surat Penunjukan Langsung</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="srtpenunjukanlangsung"
                            name="srtpenunjukanlangsung" id="srtpenunjukanlangsung" ng-model="model.suratperjanjian.srtpenunjukanlangsung"
                            accept=".pdf" maxsize="5000" required base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm"
                            for="srtpenunjukanlangsung">{{model.suratperjanjian.srtpenunjukanlangsung ?
                            model.suratperjanjian.srtpenunjukanlangsung.filename : "Pilih File"}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.srtpenunjukanlangsung.$error.maxsize">Files must not exceed
                          5000 KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">Surat Penunjukan Penyeda Barang</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="srtpenunjukanpenyediabrg"
                            name="srtpenunjukanpenyediabrg" id="srtpenunjukanpenyediabrg"
                            ng-model="model.suratperjanjian.srtpenunjukanpenyediabrg" accept=".pdf" maxsize="5000" required
                            base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm"
                            for="srtpenunjukanpenyediabrg">{{model.suratperjanjian.srtpenunjukanpenyediabrg ?
                            model.suratperjanjian.srtpenunjukanpenyediabrg.filename : "Pilih File"}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.srtpenunjukanpenyediabrg.$error.maxsize">Files must not
                          exceed 5000 KB</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label col-form-label-sm">Surat Perjanjian Pengadaan</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input form-control-sm" id="srtperjanjianpengadaan"
                            name="srtperjanjianpengadaan" id="srtperjanjianpengadaan"
                            ng-model="model.suratperjanjian.srtperjanjianpengadaan" accept=".pdf" maxsize="5000" required
                            base-sixty-four-input>
                          <label class="custom-file-label col-form-label-sm"
                            for="srtpenunjukanpenyediabrg">{{model.suratperjanjian.srtperjanjianpengadaan ?
                            model.suratperjanjian.srtperjanjianpengadaan.filename : "Pilih File"}}</label>
                        </div>
                        <span style="color:red;" ng-show="form.srtperjanjianpengadaan.$error.maxsize">Files must not
                          exceed 5000 KB</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" ng-click="closeModal('createSuratPerjanjian')">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>