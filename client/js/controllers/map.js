angular
        .module('app')
        .controller('MapController', ['User', '$scope', '$state', '$rootScope',
            function (User, $scope, $state, $rootScope) {
//            var MyUser = loopback.User.extend('user');
                console.log(User.getCurrentId())

                $scope.currentUser = User.getCurrent()
//            $scope.login = function () {
//                AuthService.login($scope.user.email, $scope.user.password)
//                        .then(function () {
//                            $state.go('map');
//                        });
//            };

            }]);