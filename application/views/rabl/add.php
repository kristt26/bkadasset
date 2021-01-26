<div class="row" ng-controller="rablController"  ng-init="Init()">
  <div class="col-md-12">
    <form role="form" name="form" ng-submit="save()">
      <!-- Detail Kendaraan -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Item RABL</h3>
        </div>
        <div class="card-body">
          <div class="col-12 col-md-6">
              <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label col-form-label-sm">Tanggal</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control  form-control-sm" id="tanggal" ng-model="model.tanggal" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="pelaksana" class="col-sm-2 col-form-label col-form-label-sm">Pelaksana</label>
                <div class="col-sm-5">
                  <select class="form-control form-control-sm select2" ng-options="item as item.nama for item in pelaksanas track by item.id" ng-model="pelaksana" id="pelaksana" ng-change="model.pelaksanaid = pelaksana.id">
                    <option value=""></option>
                  </select>
                </div>
                <div class="col-sm-1 d-flex justify-content-end">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addpelaksana"><i class="fas fa-plus-circle"></i></button>
                </div>
              </div>
          </div>
          <div class="table-responsive p-0">
            <table class="table table-sm table-bordered table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th style="width:15%" class="align-middle text-center">Jenis<br>Kendaraan</th>
                  <th class="align-middle text-center">Nomor<br>Rangka</th>
                  <th class="align-middle text-center">No Plat</th>
                  <th style="width:10%" class="align-middle text-center">Tahun<br>Perolehan</th>
                  <th class="align-middle text-center">Pejabat</th>
                  <th class="align-middle text-center">Jabatan</th>
                  <th class="align-middle text-center">Keterangan</th>
                  <th class="align-middle text-center">QTY</th>
                  <th class="align-middle text-center">Harga<br>Satuan</th>
                  <th class="align-middle text-center">PPN</th>
                  <th class="align-middle text-center">Total Harga</th>
                  <th class="align-middle text-center"><i class="fas fa-cog"></i></th>
                </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="param in model.detail">
                    <td>
                        <select ng-class="{'form-control form-control-sm select2': param.edit, 'form-control-plaintext form-control-sm select2': !param.edit}" style="width:100% !important" ng-options="item as (item.merk+' | '+item.type) for item in kendaraans track by item.id" ng-model="param.kendaraan" ng-disabled="!param.edit" id="{{param.nomorrangka}}">
                        <option value=""></option>
                        </select>
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.nomorrangka" required>
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.nomorplat" required>
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.tahunperolehan" required>
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.pejabat" required>
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.jabatan" required>
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.keterangan" required>
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.qty" ui-number-mask="0" required ng-change="sumTotal(param)">
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.hargasatuan" ui-money-mask="0" required ng-change="sumTotal(param)">
                    </td>
                    <td>
                      <input type="text" ng-readonly="!param.edit" ng-class="{'form-control form-control-sm': param.edit, 'form-control-plaintext form-control-sm': !param.edit}" ng-model="param.ppn" ui-percentage-mask="0" required ng-change="sumTotal(param)">
                    </td>
                    <td>
                      <input type="text" readonly class="form-control form-control-sm form-control-plaintext" ng-model="param.totalharga" ui-money-mask="0" required>
                    </td>
                    <td>
                      <button type="button" ng-class="{'btn btn-warning btn-sm': !param.edit, 'btn btn-success btn-sm': param.edit}" ng-click = "param.edit ? param.edit=false : param.edit=true;"><i ng-class="{'fas fa-edit': !param.edit, 'far fa-save': param.edit}"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <select class="form-control form-control-sm select2" style="width:100% !important" ng-options="item as (item.merk+' | '+item.type) for item in kendaraans" ng-model="kendaraan" ng-change="detailRabl.merk=kendaraan.merk; detailRabl.type=kendaraan.type; detailRabl.jeniskendaraanid=kendaraan.id" required></select>
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm" ng-model="detailRabl.nomorrangka">
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm" ng-model="detailRabl.nomorplat">
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm" ng-model="detailRabl.tahunperolehan">
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm" ng-model="detailRabl.keterangan">
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm" ng-model="detailRabl.qty" ui-number-mask="0" ng-change="sumTotal(detailRabl)">
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm" ng-model="detailRabl.hargasatuan" ui-money-mask="0" ng-change="sumTotal(detailRabl)">
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm" ng-model="detailRabl.ppn" ui-percentage-mask="0" ng-change="sumTotal(detailRabl)">
                    </td>
                    <td>
                      <input type="text" readonly class="form-control-plaintext form-control-sm " ng-model="detailRabl.totalharga" ui-money-mask="0">
                    </td>
                    <td>
                      <button type="button" class="btn btn-info btn-sm" ng-click="addItem(detailRabl)"><i class="fas fa-plus-circle"></i></button>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
          </div>
    </form>
  </div>
  <div class="modal fade" id="addpelaksana" tabindex="-1" role="dialog" aria-labelledby="addpelaksana-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="addpelaksanaTitle">Add Pelaksana</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form ng-submit="savePelaksana(itemPelaksana)">
            <div class="modal-body">
                <div class="form-group">
                  <label for="namapelaksana" class="col-form-label col-form-label-sm">Nama</label>
                  <input type="text" class="form-control form-control-sm" id="namapelaksana" ng-model="itemPelaksana.nama">
                </div>
                <div class="form-group">
                  <label for="alamatpelaksana" class="col-form-label col-form-label-sm">Alamat</label>
                  <textarea class="form-control form-control-sm" id="alamatpelaksana" rows="3" ng-model="itemPelaksana.alamat"></textarea>
                </div>
                <div class="form-group">
                  <label for="kontakpelaksana" class="col-form-label col-form-label-sm">Kontak</label>
                  <input type="text" class="form-control form-control-sm" id="kontakpelaksana" ng-model="itemPelaksana.kontak">
                </div>
                <div class="form-group">
                  <label for="logo" class="col-form-label col-form-label-sm">Logo</label>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input form-control-sm form-control-sm" id="logo" name="logo" ng-model="itemPelaksana.logo" accept="image/*" maxsize="2000" required base-sixty-four-input>
                      <label class="custom-file-label col-form-label-sm" for="baserahterima">{{itemPelaksana.logo ? itemPelaksana.logo.filename : 'Pilih File'}}</label>
                  </div>
                  <span style="color:red;" ng-show="form.logo.$error.maxsize">Files must not exceed 5000 KB</span>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary  btn-sm">Save</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
