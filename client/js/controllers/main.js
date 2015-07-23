angular
        .module('app')
        .controller('mainCtrl', ['User','Messages','$scope', '$state', '$rootScope', function (User, Messages ,$scope, $rootScope, $location) {

                $scope.menu = [
                    {label: 'Home', route: '/'},
                    {label: 'About', route: '/about'},
                    {label: 'Contact', route: '/contact'}
                ]
                console.log(User.getCurrentId())
                Messages.find({'filter': {'include': 'user'}}, function(messages){
                    $scope.messages = messages;
                });
                if(User.isAuthenticated())
                {
                    $scope.currentUser = User.getCurrent();
                }else{
                    $scope.currentUser = false;
                }
                
            }])
        .controller('index', ['User', '$scope', '$state', '$rootScope', function (User, $scope, $rootScope, $location) {

                if(User.isAuthenticated())
                {
                    $scope.currentUser = User.getCurrent();
                }else{
                    $scope.currentUser = false;
                }
                
            }])