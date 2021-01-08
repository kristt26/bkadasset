<div class="row" ng-controller="rablController">
  <div class="col-md-12">
    <form role="form" ng-submit="save()">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Surat Perjanjian</h3>
          <div class="card-tools">
            <a href="<?= base_url()?>rabl" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
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

      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Upload Berkas</h3>
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
    </form>
  </div>
</div>