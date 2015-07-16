angular
    .module('app')
    .controller('MapController', ['$scope', 'MapService', '$state',
        function ($scope, MapService, $state) {
            console.log(currentUser)

//            $scope.login = function () {
//                AuthService.login($scope.user.email, $scope.user.password)
//                        .then(function () {
//                            $state.go('map');
//                        });
//            };

        }]);