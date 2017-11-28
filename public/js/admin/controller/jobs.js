// JOB CONTROLLER
var Job = Admin.controller('Job', function($scope, filterFilter, $http) {
    $scope.selected = null;

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
        $scope.pager = new Paginator(function () {
            window.scrollTo(0, 0);
            var $this = this;

            http_config.url = '/admin/job/' + $this.index;
            http_config.method = 'GET';

            $http(http_config).then(function (response) {
                $this.setData(response.data.data, response.data.total, response.data.limit);
            }, function (error) {
                errorHandler(error);
            });
        });
    };

    $scope.edit = function (job) {
        if (job == undefined) $scope.selected = { id: 0 };
        else $scope.selected = angular.copy(job);
    };

    $scope.cancel = function () {
        $scope.selected = null;
    };

    $scope.save = function () {
        http_config.url = '/admin/job';
        http_config.method = $scope.selected.id ? 'PUT' : 'POST';
        http_config.data = $scope.selected;
        $http(http_config).then(function (response) {
            BootstrapDialog.close();
            BootstrapDialog.alert({
                title: 'Save',
                body: 'A(z) ' + $scope.selected.name + ' munkakör mentésre került.',
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

    $scope.remove = function (job) {
        BootstrapDialog.confirm({
            title: 'Törlés',
            body: 'Biztos, hogy törölni akarod ezt a munkakört?<br /><br /><b>' + job.name + '</b>',
            yesClick: function () {
                BootstrapDialog.close();
                http_config.url = '/admin/job/' + job.id;
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