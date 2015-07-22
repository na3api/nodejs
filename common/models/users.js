Users = app.models.User;
module.exports = function (Users) {
    Users.add = function (cb) {
        Users.create({email: 'foo@bar.com', password: 'bar'}, function (err, user) {
            cb(null, user);
        });
    }
    Users.login = function (cb)
    {
        Users.login({username: 'foo', password: 'bar'}, function (err, accessToken) {
            console.log(accessToken);
        });
    }
    Users.logout = function (cb)
    {
        console.log(cb);
//        Users.login({username: 'foo', password: 'bar'}, function (err, accessToken) {
//            console.log(accessToken);
//        });
    }
    Users.remoteMethod(
            'add', {
                http: {path: '/add', verb: 'get'},
                returns: {arg: 'name', type: 'object'}
            }
    );
    Users.remoteMethod(
            'logout',
            {
                description: 'Logout a user with access token',
                accepts: [
                    {arg: 'access_token', type: 'string', required: true, http: function (ctx) {
                            var req = ctx && ctx.req;
                            var accessToken = req && req.accessToken;
                            var tokenID = accessToken && accessToken.id;

                            return tokenID;
                        }, description: 'Do not supply this argument, it is automatically extracted ' +
                                'from request headers.'
                    }
                ],
                http: {verb: 'all'}
            }
    );
    //Users.add();
};
