angular
  .module('app')
  .factory('AuthService', ['User', '$q', '$rootScope', function(User, $q,
      $rootScope) {
    function login(email, password) {
      return User
        .login({email: email, password: password})
        .$promise
        .then(function(response) {
          $rootScope.currentUser = {
            id: response.user.id,
            tokenId: response.id,
            email: email
          };
        });
    } 

    function logout() {
      return User
       .logout()
       .$promise
       .then(function() {
         $rootScope.currentUser = null;
       });
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
