<div class="row" ng-controller="rablController">
  <div class="col-md-12">
    <form role="form" ng-submit="save()">
      <!-- Surat -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Surat Perjanjian</h3>
          <div class="card-tools">
            <a href="<?=base_url()?>rabl" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label for="nomor" class="col-sm-2 col-form-label col-form-label-sm">Nomor</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="nomor" ng-model="model.nomor"
                placeholder="No. Surat">
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal" class="col-sm-2 col-form-label col-form-label-sm">tanggal</label>
            <div class="col-sm-3">
              <input type="date" class="form-control  form-control-sm" id="tanggal" ng-model="model.tanggal">
            </div>
          </div>
          <div class="form-group row">
            <label for="pekerjaan" class="col-sm-2 col-form-label col-form-label-sm">Pekerjaan</label>
            <div class="col-sm-10">
              <textarea class="form-control  form-control-sm" id="pekerjaan" ng-model="model.pekerjaan"
                placeholder="pekerjaan Petugas" row="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="nilaipekerjaan" class="col-sm-2 col-form-label col-form-label-sm">Nilai Pekerjaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="nilaipekerjaan"
                ng-model="model.nilaipekerjaan" placeholder="Nilai Pekerjaan">
            </div>
          </div>
          <div class="form-group row">
            <label for="sumberdana" class="col-sm-2 col-form-label col-form-label-sm">Sumber Dana</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="sumberdana" ng-model="model.sumberdana"
                placeholder="Sumber Dana">
            </div>
          </div>
          <div class="form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label col-form-label-sm">Lokasi</label>
            <div class="col-sm-10">
              <input type="lokasi" class="form-control  form-control-sm" id="lokasi" ng-model="model.lokasi"
                placeholder="Lokasi">
            </div>
          </div>
          <div class="form-group row">
            <label for="waktupelaksanaan" class="col-sm-2 col-form-label col-form-label-sm">Waktu Pelaksanaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="waktupelaksanaan"
                ng-model="model.waktupelaksanaan" placeholder="Waktu Pelaksanaan Pekerjaan">
            </div>
          </div>
          <div class="form-group row">
            <label for="tahunanggaran" class="col-sm-2 col-form-label col-form-label-sm">Tahun Anggaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="tahunanggaran" ng-model="model.tahunanggaran"
                placeholder="Tahun Anggaran">
            </div>
          </div>
          <div class="form-group row">
            <label for="pelaksana" class="col-sm-2 col-form-label col-form-label-sm">Pelaksana</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="pelaksana" ng-model="model.pelaksana"
                placeholder="Pelaksana Pekerjaan">
            </div>
          </div>
        </div>
      </div>
      <!-- Upload Berkas -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Upload Berkas</h3>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label for="nomor" class="col-sm-2 col-form-label col-form-label-sm">Surat Pesan Kendaraan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="nomor" ng-model="model.nomor"
                placeholder="No. Surat">
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal" class="col-sm-2 col-form-label col-form-label-sm">tanggal</label>
            <div class="col-sm-10">
              <input type="date" class="form-control  form-control-sm" id="tanggal" ng-model="model.tanggal">
            </div>
          </div>
          <div class="form-group row">
            <label for="pekerjaan" class="col-sm-2 col-form-label col-form-label-sm">Pekerjaan</label>
            <div class="col-sm-10">
              <textarea class="form-control  form-control-sm" id="pekerjaan" ng-model="model.pekerjaan"
                placeholder="pekerjaan Petugas" row="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="nilaipekerjaan" class="col-sm-2 col-form-label col-form-label-sm">Nilai Pekerjaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="nilaipekerjaan"
                ng-model="model.nilaipekerjaan" placeholder="Nilai Pekerjaan">
            </div>
          </div>
          <div class="form-group row">
            <label for="sumberdana" class="col-sm-2 col-form-label col-form-label-sm">Sumber Dana</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="sumberdana" ng-model="model.sumberdana"
                placeholder="Sumber Dana">
            </div>
          </div>
          <div class="form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label col-form-label-sm">Lokasi</label>
            <div class="col-sm-10">
              <input type="lokasi" class="form-control  form-control-sm" id="lokasi" ng-model="model.lokasi"
                placeholder="Lokasi">
            </div>
          </div>
          <div class="form-group row">
            <label for="waktupelaksanaan" class="col-sm-2 col-form-label col-form-label-sm">Waktu Pelaksanaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="waktupelaksanaan"
                ng-model="model.waktupelaksanaan" placeholder="Waktu Pelaksanaan Pekerjaan">
            </div>
          </div>
          <div class="form-group row">
            <label for="tahunanggaran" class="col-sm-2 col-form-label col-form-label-sm">Tahun Anggaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="tahunanggaran" ng-model="model.tahunanggaran"
                placeholder="Tahun Anggaran">
            </div>
          </div>
          <div class="form-group row">
            <label for="pelaksana" class="col-sm-2 col-form-label col-form-label-sm">Pelaksana</label>
            <div class="col-sm-10">
              <input type="text" class="form-control  form-control-sm" id="pelaksana" ng-model="model.pelaksana"
                placeholder="Pelaksana Pekerjaan">
            </div>
          </div>
        </div>
      </div>
      <!-- Detail Kendaraan -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Item RABL</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive p-0">
            <table class="table table-sm table-bordered table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th style="width:15%" class="align-middle text-center">Jenis<br>Kendaraan</th>
                  <th class="align-middle text-center">Nomor<br>Rangka</th>
                  <th class="align-middle text-center">No Plat</th>
                  <th style="width:10%" class="align-middle text-center">Tahun<br>Perolehan</th>
                  <th class="align-middle text-center">Keterangan</th>
                  <th class="align-middle text-center">QTY</th>
                  <th class="align-middle text-center">Harga<br>Satuan</th>
                  <th class="align-middle text-center">PPN</th>
                  <th class="align-middle text-center">Total Harga</th>
                  <th class="align-middle text-center"><i class="fas fa-cog"></i></th>
                </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="param in testing.detail">
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
                      <!-- <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-plus-circle"></i></button> -->
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
                      <button type="submit" class="btn btn-info btn-sm" ng-click="addItem(detailRabl)"><i class="fas fa-plus-circle"></i></button>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>