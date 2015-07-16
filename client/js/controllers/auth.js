angular
        .module('app')
        .controller('AuthLoginController', ['$scope', 'AuthService', '$state',
            function ($scope, AuthService, $state) {
                $scope.user = {
                    email: 'admin@admin.com',
                    password: '123456'
                };

                $scope.login = function () {
                    AuthService.login($scope.user.email, $scope.user.password)
                            .then(function () {
                                $state.go('map');
                            });
                };
            }])
        .controller('AuthLogoutController', ['$scope', 'AuthService', '$state',
            function ($scope, AuthService, $state) {
                AuthService.logout()
                        .then(function () {
                            $state.go('login');
                        });
            }])
        .controller('SignUpController', ['$scope', 'AuthService', '$state',
            function ($scope, AuthService, $state) {
                $scope.register = function () {
                    console.log($scope.user)
                    AuthService.register($scope.user)
                            .then(function () {
                                $state.transitionTo('map');
                            });
                };
            }]);
