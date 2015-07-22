angular
        .module('app')
        .factory('AuthService', ['User', '$q', '$rootScope', function (User, $q,
                    $rootScope) {
                function login(email, password) {

                    return User
                            .login({email: email, password: password})
                            .$promise
                            .then(function (response) {
                                User.update({where: {id: response.user.id}}, {verificationToken: response.id})
                                $rootScope.currentUser = {
                                    id: response.user.id,
                                    tokenId: response.id,
                                    username: response.user.username,
                                    email: email
                                };
                            });
                }

                function logout(access_token) {
                    return User.logout(access_token, function(req){
                        console.log(req)
                    })
//                            .$promise
//                            .then(function () {
//                                $rootScope.currentUser = null;
//                            });
                }

                function register(userdata) {
                    return User
                            .create(userdata)
                            .$promise;
                }

                return {
                    login: login,
                    logout: logout,
                    register: register
                };
            }]);
