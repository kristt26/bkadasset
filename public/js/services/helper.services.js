angular.module('helper.service', []).factory('helperServices', helperServices);

function helperServices($location, $q) {
    var service = { IsBusy: false, absUrl: $location.$$absUrl };
    service.url = $location.$$protocol + '://' + $location.$$host;
    if ($location.$$port) {
        // service.url = service.url + ':' + $location.$$port;
        service.url = service.url + ':' + $location.$$port + '/bkadasset';
    }

    // '    http://localhost:5000';

    service.groupBy = (list, keyGetter) => {
        const map = new Map();
        list.forEach((item) => {
            const key = keyGetter(item);
            const collection = map.get(key);
            if (!collection) {
                map.set(key, [item]);
            } else {
                collection.push(item);
            }
        });
        return map;
    };
    service.getParam = () => {
        id = $location.$$absUrl.split('/');
        return id[id.length - 1];
    }
    service.romanize = (num) => {
        if (isNaN(num))
            return NaN;
        var digits = String(+num).split(""),
            key = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM",
                "", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC",
                "", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
            roman = "",
            i = 3;
        while (i--)
            roman = (key[+digits.pop() + (i * 10)] || "") + roman;
        return Array(+digits.join("") + 1).join("M") + roman;
    }
    service.randid = () => {
        var result = '';
        var characters = '0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < 6; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        var d = new Date();
        return result + '-' + (d.getFullYear().toString().substring(2, 4)) + (d.getMonth() + 1).toString() + (d.getDate()).toString();
    }
    service.roles = [{ id: 1, role: 'Admin' }, { id: 2, role: "OPD" }];
    service.sex = ['Pria', 'Wanita'];
    service.kategorikriteria = ['Benefit', 'Cost'];
    service.status = ['Aktif', 'Tidak Aktif'];
    service.convertUrltoBase64 = (url) => {
        var def = $q.defer();
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
            console.log(this.response);
            var reader = new FileReader();
            reader.onload = function (event) {
                var res = event.target.result;
                def.resolve(res);
                console.log(res)
            }
            var file = this.response;
            reader.readAsDataURL(file)
        };
        xhr.send()
        return def.promise;
    }
    return service;
}