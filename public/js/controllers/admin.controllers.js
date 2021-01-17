angular.module('adminctrl', [])
    .controller('homeController', homeController)
    .controller('loginController', loginController)
    .controller('penggunaController', penggunaController)
    .controller('kendaraanController', kendaraanController)
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
function kendaraanController($scope, helperServices, KendaraanServices) {
    $scope.itemHeader = { title: "Data Kendaraan", breadcrumb: "Kendaraan", header: "Data Kendaraan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    KendaraanServices.get().then(x => {
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
            KendaraanServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.clear();
                $.LoadingOverlay("hide");
            })
        } else {
            KendaraanServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.clear();
                $.LoadingOverlay("hide");
            })
        }
    }
    $scope.clear = () => {
        $scope.model = {};
        $scope.simpan = true;
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
        PenggunaServices.get().then(pengguna => {
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
function rablController($scope, helperServices, OpdServices, RablServices, KendaraanServices, PelaksanaServices) {
    $scope.itemHeader = { title: "Manajemen RABL", breadcrumb: "RABL", header: "Manajemen RABL" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.model.detail = [];
    $scope.kendaraan = {};
    $scope.penggunas = [];
    $scope.simpan = true;
    $scope.title = "";
    $scope.kendaraans = [];
    $scope.pelaksanas = [];
    $scope.pelaksana = {};
    $scope.detailRabl = {};
    // $scope.testing = {"detail":[{"merk":"Daihatsu","type":"Gran Max MB","jeniskendaraanid":"1","nomorrangka":"121231","nomorplat":"21212","tahunperolehan":"2019","keterangan":"-","qty":1,"hargasatuan":30000000,"totalharga":27000000,"ppn":0.1,"kendaraan":{"id":"1","merk":"Daihatsu","type":"Gran Max MB"},"edit":false}]}
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('url') == 'add') {
        $scope.itemHeader = { title: "Tambah RABL", breadcrumb: "RABL", header: "Tambah RABL" };
        $scope.$emit("SendUp", $scope.itemHeader);
        $scope.title = "Tambah RABL";
        KendaraanServices.get().then(kendaraan => {
            $scope.kendaraans = kendaraan;
            PelaksanaServices.get().then(pelaksana => {
                $scope.pelaksanas = pelaksana;
                $scope.model.suratperjanjian = {};
                $.LoadingOverlay("hide");
            })
        })
    } else if (urlParams.get('url') == 'update') {
        $scope.itemHeader = { title: "Ubah RABL", breadcrumb: "RABL", header: "Ubah RABL" };
        $scope.$emit("SendUp", $scope.itemHeader);
        $scope.title = "Ubah RABL";
        KendaraanServices.get().then(kendaraan => {
            $scope.kendaraans = kendaraan;
            PelaksanaServices.get().then(pelaksana => {
                $scope.pelaksanas = pelaksana;
                $.LoadingOverlay("hide");
            })
        })
    } else {
        RablServices.get().then(x => {
            $scope.datas = x;

            $.LoadingOverlay("hide");
        })
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.addItem = (item) => {
        item.kendaraan = angular.copy($scope.kendaraan);
        item.edit = false;
        $scope.model.detail.push(angular.copy(item));
        $scope.kendaraan = {};
        $scope.detailRabl = {};
        console.log(JSON.stringify($scope.model));
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        var data = angular.copy($scope.model);
        if ($scope.model.suratperjanjian.id) {
            RablServices.put($scope.model).then(x => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                });
                $scope.model = {};
                $scope.model.detail = [];
                $.LoadingOverlay("hide");
            })
        } else {
            data.suratperjanjian.tanggal = data.suratperjanjian.tanggal.getFullYear() + "-" + (data.suratperjanjian.tanggal.getMonth() + 1) + "-" + data.suratperjanjian.tanggal.getDate();
            console.log(data);
            RablServices.postSurat($scope.model).then(x => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                });
                // $scope.model = {};
                // $scope.model.detail = [];
                $.LoadingOverlay("hide");
            })
        }
    }
    $scope.sumTotal = (item) => {
        if (item.qty && item.hargasatuan) {
            if (item.ppn) {
                var jumlah = parseFloat(item.qty) * parseFloat(item.hargasatuan)
                var ppn = jumlah * parseFloat(item.ppn);
                item.totalharga = jumlah - ppn
            } else {
                item.totalharga = parseFloat(item.qty) * parseFloat(item.hargasatuan)
            }
        }
    }
    $scope.showModal = (idmodal, item) => {
        $("#" + idmodal).modal('show');
        $scope.model = angular.copy(item);
        if ($scope.model.suratperjanjian) {
            $scope.model.suratperjanjian.tanggal = new Date($scope.model.suratperjanjian.tanggal);
            $scope.edit = false;
            $scope.model.berkas = [];
            var nilai = {nama: 'Surat Pesan Kendaraan', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.suratpesankendaraan};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Berita Acara Serah Terima', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.baserahterima};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Berita Acara Pembayaran', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.bapembayaran};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Berita Acara Pemeriksaan Pekerjaan', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.bapemeriksaanpek};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Berita Acara Pemeriksaan Admin Hasil Pekerjaan', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.bapemeriksaanadmnhslpek};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Surat Penawaran Harga', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.srtpenawaranhrg};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Surat Persetujuan Harga', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.srtpersetujuanhrg};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Surat Penunjukan Langsung', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.srtpenunjukanlangsung};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Surat Penunjukan Penydia barang', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.srtpenunjukanpenyediabrg};
            $scope.model.berkas.push(angular.copy(nilai));
            var nilai = {nama: 'Surat Perjanjian Pengadaan', berkas: helperServices.url + "/public/berkas/"+$scope.model.suratperjanjian.srtperjanjianpengadaan};
            $scope.model.berkas.push(angular.copy(nilai));
        } else {
            $scope.edit = true;
            $scope.model.suratperjanjian = $scope.model.suratperjanjian ? $scope.model.suratperjanjian : {};
            $scope.model.suratperjanjian.nilaipekerjaan = $scope.model.detail.reduce((x, y) => {
                return parseFloat(x) + (parseFloat(y.hargasatuan) * parseFloat(y.qty));
            }, 0);
        }
        console.log($scope.model.id);
    }
    $scope.closeModal = (idmodal) => {
        $("#" + idmodal).modal('hide');
        $scope.model = {};
    }
    $scope.converbase64 = (item) => {
        var data = [];
        
    }
    $scope.savePelaksana = (item) => {
        $.LoadingOverlay("show");
        PelaksanaServices.post(item).then(x => {
            $scope.pelaksana = x;
            $("#addpelaksana").modal('hide');
            $.LoadingOverlay("hide");
        })
    }
    $scope.download = (id, pelaksana) => {
        window.open(helperServices.url + "/rabl/downloadsurat/"+id+"/"+pelaksana);
    }
}