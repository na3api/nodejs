angular
  .module('app')
  .factory('AuthService', ['User', '$q', '$rootScope', function(User, $q,
      $rootScope) {
    function login(email, password) {
        console.log(session);
        return User
        .login({email: email, password: password})
        .$promise
        .then(function(response) {
          $rootScope.currentUser = {
            id: response.user.id,
            tokenId: response.id,
            username: response.user.username,
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
