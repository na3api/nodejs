angular.module('app').
        controller('EventController', ['Messages', 'User', '$scope', '$compile', function (Messages, User, $scope, $compile) {
                /*
                 * expose the event object to the scope
                 */
                var canvas = document.getElementById("myCanvas");
                var ctx = canvas.getContext("2d");
                $scope.handleMouseMove = function (event)
                {
                    var e = window.event;
                    console.log(e.clientX)
                    console.log(e.clientY)
                    ctx.fillRect(50, 50, 100, 100);
                }
                $scope.sendMess = function () {
                    socket.emit('chat message', {message: $scope.message, user: {username: $scope.currentUser.username, user_id: $scope.currentUser.id}})
                    Messages.create({user_id: $scope.currentUser.id, message: $scope.message})
                    $scope.message = "";
                    return false;
                };
                socket.on('chat message', function (msg) {
                    angular
                            .element(document.getElementById('messages'))
                            .append($compile('<li><b>' + msg.user['username'] + '</b>: ' + msg.message + '</li>')($scope));
                });
            }])
       