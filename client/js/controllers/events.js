angular.module('app').
        controller('EventController', ['Messages', 'User', 'Positions', '$scope', '$compile', function (Messages, User, Positions, $scope, $compile) {
                /*
                 * expose the event object to the scope
                 */
                var canvas = document.getElementById("myCanvas");
                var ctx = canvas.getContext("2d");


                Positions.count({where: {userId: User.getCurrentId()}}, function (position) {
                    $scope.position = {userId: User.getCurrentId(), posX: 1, posY: 1};
                    if (!position.count)
                    {
                        Positions.create($scope.position)
                        $scope.setPosition();
                    } else {
                        Positions.findOne({where: {userId: User.getCurrentId()}}, function (position) {
                            $scope.position = position;
                            $scope.setPosition();
                        })
                    }
                })
                $scope.savePosition = function()
                {
                    Positions.updateAll(
                            {where: {userId: User.getCurrentId()}},
                            {posX: $scope.position.posX, posY: $scope.position.posY}, 
                            function(err, info) {
                    }); 
                }
                $scope.setPosition = function (posX, posY) {
                    var radius = 8;
                    ctx.fillStyle = 'rgba(255, 35, 55, 1.0)';
                    ctx.beginPath();
                    ctx.arc(posX === 'undefined' ? $scope.position.posX : posX, posY === 'undefined' ? $scope.position.posY : posY, radius, 0, Math.PI * 2, true);
                    ctx.closePath();
                    ctx.fill();
                    
                }
                $scope.clear = function (event){ // функция очищает canvas
                    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
                }

                $scope.moveUser = function (event)
                {
                        var offsetX = event.offsetX;
                        var offsetY = event.offsetY;
                        $scope.position  = { posX: offsetX, posY: offsetY};
                        this.savePosition();
                        this.clear();
                        this.setPosition();
                        socket.emit('change position', $scope.position)
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
                socket.on('change position', function (position) {
                    //console.log(position);
                    $scope.setPosition(position.posX, position.posY);
                    //angular
                   //     .element(document.getElementById('messages'))
                   //     .append($compile('<li><b>' + msg.user['username'] + '</b>: ' + msg.message + '</li>')($scope));
                });
            }])
       