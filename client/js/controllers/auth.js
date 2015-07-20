angular
        .module('app')
        .controller('AuthLoginController', ['User', '$scope', 'AuthService', '$state',
            function (User, $scope, AuthService, $state) {
                $scope.user = {
                    email: 'admin@admin.com',
                    password: '123456'
                };
                if(!User.isAuthenticated)
                {
                    $scope.login = function () {
                        AuthService.login($scope.user.email, $scope.user.password)
                                .then(function () {
                                    $state.go('map');
                                }); 
                    };
                    
                }else{
                    $state.go('map');
                    //window.location.href = window.location.origin + "#/map"; 
                }
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
                    AuthService.register($scope.user)
                            .then(function () {
                                $state.transitionTo('map');
                            });
                };
            }]);
