<div class="row" ng-controller="kendaraanController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input Kendaraan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="merk" class="col-form-label col-form-label-sm">Merk Kendaraan</label>
            <input type="text" class="form-control  form-control-sm" id="merk" ng-model="model.merk" placeholder="inputkan merk kendaraan" required>
          </div>
          <div class="form-group">
            <label for="type"  class="col-form-label col-form-label-sm">Type Kendaraan</label>
            <input type="text" class="form-control  form-control-sm" id="type" ng-model="model.type" placeholder="inputkan type kendaraan" required>
          </div>
          <div class="form-group d-flex justify-content-between">
            <button type="button" class="btn btn-warning btn-sm" ng-show="!simpan" ng-click="clear()">Clear</button>
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
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Kendaraan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-sm table-hover table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Merek Kendaraan</th>
              <th>Nama Kendaraan</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.merk}}</td>
              <td>{{item.type}}</td>
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
