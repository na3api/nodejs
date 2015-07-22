angular
        .module('app')
        .controller('MapController', ['User', '$scope', '$state', '$rootScope',
            function (User, $scope, $state, $rootScope) {
                $scope.currentUser = User.getCurrent()

            }]);