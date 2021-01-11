angular.module('apps', [
    'adminctrl',
    'helper.service',
    'auth.service',
    'services',
    'datatables',
    'ngLocale',
    'ui.utils.masks',
    'naif.base64'
])
    .directive('tooltip', function () {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                element.hover(function () {
                    // on mouseenter
                    element.tooltip('show');
                }, function () {
                    // on mouseleave
                    element.tooltip('hide');
                });
            }
        };
    })
    .controller('indexController', function ($scope) {
        $scope.titleHeader = "BKAD Asset";
        $scope.header = "";
        $scope.breadcrumb = "";

        $scope.$on("SendUp", function (evt, data) {
            $scope.header = data.title;
            $scope.header = data.header;
            $scope.breadcrumb = data.breadcrumb;
        });
        $.LoadingOverlay("show");
    });
