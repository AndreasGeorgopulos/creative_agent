// EMPLOYEE CONTROLLER
var User = Admin.controller('User', function($scope, filterFilter, $http) {
    $scope.selected = null;
    $scope.jobs = null;
    $scope.password_is_visible = 0;
    $scope.password_strength = 0;
    $scope.searchText = '';

    var errorHandler = function (error) {
        var statusText = 'Status: ' + error.status + '<br />Response: <br />';

        if (error.data.messages) {
            var ul = '<ul>';
            angular.forEach(error.data.messages, function (v, k) {
                ul += '<li>' + k + ': ' + v + '</li>';
            });
            ul += '</ul>';
            statusText += ul;
        }
        else {
            statusText += JSON.stringify(error.data);
        }

        BootstrapDialog.alert({
            title: 'Http response error',
            body: statusText
        });
    };

    $scope.init = function () {
        $http.get('/admin/job/-1').then(function (response) {
            $scope.jobs = angular.copy(response.data.data);
        });

        $scope.pager = new Paginator(function () {
            window.scrollTo(0, 0);
            var $this = this;

            http_config.url = '/admin/user/' + $this.index + ($scope.searchText != '' ? '/' + $scope.searchText : '');
            http_config.method = 'GET';

            $http(http_config).then(function (response) {
                $this.setData(response.data.data, response.data.total, response.data.limit);
            }, function (error) {
                errorHandler(error);
            });
        });
    };

    $scope.search = function () {
        $scope.pager.index = 0;
        $scope.pager.load();
    };

    $scope.skipSearch = function () {
        if ($scope.searchText == '') $scope.search();
    };

    $scope.password_visible = function (value) {
        $scope.password_is_visible = value;
    };

    $scope.$watch('selected.password', function () {
        $scope.password_strength = $scope.selected !== null && $scope.selected.password ? FormValidator.passwordStrength($scope.selected.password) : 0;
    });

    $scope.setJob = function (job_id) {
        var index = $scope.selected.job_ids.indexOf(job_id);
        if (index == -1) $scope.selected.job_ids.push(job_id);
        else $scope.selected.job_ids.splice(index, 1);
    };

    $scope.edit = function (user) {
        if (user == undefined) {
            $scope.selected = { id: 0, password: '', password_confirmation: '', job_ids: [] };
        }
        else {
            $scope.selected = angular.copy(user);
            $scope.selected.password = '';
            $scope.selected.password_confirmation = '';
            $scope.selected.job_ids = [];
            angular.forEach($scope.selected.jobs_ids.split(','), function (d) {
                if (!isNaN(parseInt(d))) $scope.selected.job_ids.push(parseInt(d));
            });
        }
    };

    $scope.cancel = function () {
        $scope.selected = null;
    };

    $scope.save = function () {
        http_config.url = '/admin/user';
        http_config.method = $scope.selected.id ? 'PUT' : 'POST';
        http_config.data = $scope.selected;
        $http(http_config).then(function (response) {
            BootstrapDialog.close();
            BootstrapDialog.alert({
                title: 'Mentés',
                body: 'A(z) ' + $scope.selected.name + ' felhasználó mentésre került.',
                click: function () {
                    BootstrapDialog.close();
                    $scope.pager.load();
                    $scope.selected = null;
                }
            });
        }, function (error) {
            errorHandler(error);
        });
    };

    $scope.remove = function (user) {
        BootstrapDialog.confirm({
            title: 'Törlés',
            body: 'Biztos, hogy törölni akarod ezt a felhasználót?<br /><br /><b>' + user.name + '</b>',
            yesClick: function () {
                BootstrapDialog.close();
                http_config.url = '/admin/user/' + user.id;
                http_config.method = 'DELETE';
                $http(http_config).then(function (response) {
                    $scope.pager.load();
                }, function (error) {
                    errorHandler(error);
                });
            }
        });
    };
});

Admin.directive('pressEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.pressEnter);
                });

                event.preventDefault();
            }
        });
    };
});