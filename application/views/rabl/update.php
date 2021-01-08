<div class="row" ng-controller="rablController">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; {{title}}</h3>
        <div class="card-tools">
            <a href="<?= base_url()?>rabl" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group row">
            <label for="nip"  class="col-sm-2 col-form-label col-form-label-sm">NIP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control  form-control-sm" id="nip" ng-model="model.nip" placeholder="No. NIP">
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control  form-control-sm" id="nama" ng-model="model.nama" placeholder="Nama Petugas">
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control  form-control-sm" id="alamat" ng-model="model.alamat" placeholder="Alamat Petugas" row="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="kontak" class="col-sm-2 col-form-label col-form-label-sm">Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control  form-control-sm" id="kontak" ng-model="model.kontak" placeholder="No. Telepon">
            </div>
          </div>
          <div class="form-group row">
            <label for="jabatan" class="col-sm-2 col-form-label col-form-label-sm">Jabatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control  form-control-sm" id="jabatan" ng-model="model.jabatan" placeholder="Jabatan">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control  form-control-sm" id="email" ng-model="model.email" placeholder="Email Petugas">
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control  form-control-sm" id="username" ng-model="model.username" placeholder="username Petugas">
            </div>
          </div>
          <div class="form-group row" ng-show = "simpan">
            <label for="password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control  form-control-sm" id="password" ng-model="model.password" placeholder="Password">
            </div>
          </div>
          <div class="form-group row" ng-show = "simpan">
            <label for="roles" class="col-sm-2 col-form-label col-form-label-sm">User Akses</label>
            <div class="col-sm-10">
                <select id="roles" class="form-control  form-control-sm" ng-options="item as item.role for item in roles" ng-model="itemRoles" ng-change="model.rolesid=itemRoles.id"></select>
            </div>
          </div>
          <div class="form-group row d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>