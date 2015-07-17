angular
    .module('app')
    .controller('MapController', ['$scope', '$state', '$rootScope',
        function ($scope,  $state, $rootScope) {
//            var MyUser = loopback.User.extend('user');
            console.log($rootScope.currentUser)

//            $scope.login = function () {
//                AuthService.login($scope.user.email, $scope.user.password)
//                        .then(function () {
//                            $state.go('map');
//                        });
//            };

        }]);