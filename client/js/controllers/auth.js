angular
        .module('app')
        .controller('AuthLoginController', ['User', '$scope', 'AuthService', '$state',
            function (User, $scope, AuthService, $state) {
                $scope.user = {
                    email: 'admin@admin.com',
                    password: '123456'
                };
                if(!User.isAuthenticated())
                {
                    $scope.login = function () {
                        AuthService.login($scope.user.email, $scope.user.password)
                                .then(function () {
                                    $state.go('index');
                                }); 
                    };
                    
                }else{
                    $state.go('index');
                }
            }])
        .controller('AuthLogoutController', ['User', '$scope', 'AuthService', '$state',
            function (User, $scope, AuthService, $state) {
                var currentUser = User.getCurrent(function(user){
                    User.logout({access_token:user.verificationToken}, function(req){
                        console.log(req)
                    })
                    
                })
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
