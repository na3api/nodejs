angular
        .module('app')
        .controller('mainCtrl', ['User', '$scope', '$state', '$rootScope', function (User, $scope, $rootScope, $location) {

                $scope.menu = [
                    {label: 'Home', route: '/'},
                    {label: 'About', route: '/about'},
                    {label: 'Contact', route: '/contact'}
                ]

                $scope.currentUser = User.getCurrent()
                console.log($rootScope.currentUser)
            }])