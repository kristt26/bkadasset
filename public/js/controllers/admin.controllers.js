angular.module('adminctrl', [])
    .controller('homeController', homeController)
    .controller('loginController', loginController)
    .controller('penggunaController', penggunaController)
    .controller('opdController', opdController)
    .controller('rablController', rablController)
    ;
function homeController($scope) {
    $scope.itemHeader = { title: "Home", breadcrumb: "Home", header: "Home" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.datass = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.hasilAkhir = {};
    $scope.hasilAkhir.hasil = 0;
    $scope.periode = {};
    $scope.setValue;
    $.LoadingOverlay("hide");
    
}
function loginController($scope, AuthService, helperServices) {
    $scope.model = {};

    AuthService.login($scope.modal).then(x => {
        $.LoadingOverlay("hide");
        location.href = helperServices.url + "/home";
    })

}
function penggunaController($scope, helperServices, PenggunaServices) {
    $scope.itemHeader = { title: "Manajemen User", breadcrumb: "Manajemen User", header: "Manajemen User" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.status = helperServices.status
    $scope.roles = helperServices.roles
    $scope.model = {};
    $scope.simpan = true;
    PenggunaServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        if ($scope.model.id) {
            PenggunaServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        } else {
            PenggunaServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }
}
function opdController($scope, helperServices, OpdServices, PenggunaServices) {
    $scope.itemHeader = { title: "Manajemen OPD", breadcrumb: "OPD", header: "Manajemen OPD" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.penggunas = [];
    // $scope.status = helperServices.status
    $scope.model = {};
    $scope.simpan = true;
    OpdServices.get().then(x => {
        $scope.datas = x;
        PenggunaServices.get().then(pengguna=>{
            $scope.penggunas = pengguna;
            $.LoadingOverlay("hide");
        })
    })
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        if ($scope.model.id) {
            OpdServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.simpan = true;
                $.LoadingOverlay("hide");
            })
        } else {
            OpdServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.simpan = true;
                $.LoadingOverlay("hide");
            })
        }
    }
}
function rablController($scope, helperServices, OpdServices, RablServices) {
    $scope.itemHeader = { title: "Manajemen OPD", breadcrumb: "RABL", header: "Manajemen OPD" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.penggunas = [];
    $scope.simpan = true;
    $scope.title = "";
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('url')=='add'){
        $scope.itemHeader = { title: "Tambah RABL", breadcrumb: "RABL", header: "Tambah RABL" };
        $scope.$emit("SendUp", $scope.itemHeader);
        $scope.title = "Tambah RABL";
        $.LoadingOverlay("hide");
    }else if(urlParams.get('url')=='update'){
        $scope.itemHeader = { title: "Ubah RABL", breadcrumb: "RABL", header: "Ubah RABL" };
        $scope.$emit("SendUp", $scope.itemHeader);
        $scope.title = "Ubah RABL";
        console.log(urlParams.get('url'));
        $.LoadingOverlay("hide");
    }else{
        RablServices.get().then(x => {
            $scope.datas = x;
            $.LoadingOverlay("hide");
        })
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
}