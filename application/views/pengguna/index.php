<div class="row" ng-controller="penggunaController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input Petugas</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="nip"  class="col-form-label col-form-label-sm">NIP</label>
            <input type="text" class="form-control  form-control-sm" id="nip" ng-model="model.nip" placeholder="No. NIP">
          </div>
          <div class="form-group">
            <label for="nama" class="col-form-label col-form-label-sm">Nama</label>
            <input type="text" class="form-control  form-control-sm" id="nama" ng-model="model.nama" placeholder="Nama Petugas">
          </div>
          <div class="form-group">
            <label for="alamat" class="col-form-label col-form-label-sm">Alamat</label>
            <textarea class="form-control  form-control-sm" id="alamat" ng-model="model.alamat" placeholder="Alamat Petugas" row="3"></textarea>
          </div>
          <div class="form-group">
            <label for="kontak" class="col-form-label col-form-label-sm">Telepon</label>
            <input type="text" class="form-control  form-control-sm" id="kontak" ng-model="model.kontak" placeholder="No. Telepon">
          </div>
          <div class="form-group">
            <label for="jabatan" class="col-form-label col-form-label-sm">Jabatan</label>
            <input type="text" class="form-control  form-control-sm" id="jabatan" ng-model="model.jabatan" placeholder="Jabatan">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label col-form-label-sm">Email</label>
            <input type="email" class="form-control  form-control-sm" id="email" ng-model="model.email" placeholder="Email Petugas">
          </div>
          <div class="form-group">
            <label for="username" class="col-form-label col-form-label-sm">Username</label>
            <input type="text" class="form-control  form-control-sm" id="username" ng-model="model.username" placeholder="username Petugas">
          </div>
          <div class="form-group" ng-show = "simpan">
            <label for="password" class="col-form-label col-form-label-sm">Password</label>
            <input type="password" class="form-control  form-control-sm" id="password" ng-model="model.password" placeholder="Password">
          </div>
          <div class="form-group" ng-show = "simpan">
            <label for="roles" class="col-form-label col-form-label-sm">User Akses</label>
            <select id="roles" class="form-control  form-control-sm" ng-options="item as item.role for item in roles" ng-model="itemRoles" ng-change="model.rolesid=itemRoles.id"></select>
          </div>
          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Petugas</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Username</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.nip}}</td>
              <td>{{item.nama}}</td>
              <td><span class="tag tag-success">{{item.alamat}}</span></td>
              <td>{{item.kontak}}</td>
              <td>{{item.email}}</td>
              <td>{{item.username}}</td>
              <td>
                <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>