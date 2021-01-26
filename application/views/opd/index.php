<div class="row" ng-controller="opdController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input Petugas</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="opd"  class="col-form-label col-form-label-sm">OPD</label>
            <input type="text" class="form-control  form-control-sm" id="opd" ng-model="model.opd" placeholder="Input OPD disini" required>
          </div>
          <div class="form-group">
            <label for="roles" class="col-form-label col-form-label-sm">Pengguna</label>
            <select id="roles" class="form-control  form-control-sm select2" ng-options="item as item.nama for item in penggunas track by item.id" ng-model="itemPengguna" ng-change="model.nama=itemPengguna.nama; model.username = itemPengguna.username; model.penggunaid = itemPengguna.id; model.nip = itemPengguna.nip" ng-required="true">
              <option></option>
            </select>
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
              <th>opd</th>
              <th>Pengguna</th>
              <th>NIP</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.opd}}</td>
              <td>{{item.nama}}</td>
              <td>{{item.nip}}</td>
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
