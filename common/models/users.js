module.exports = function (Users) { 
    Users.add = function (cb) {
        Users.create({id:2, email: 'foo@bar.com', password: 'bar'}, function (err, user) {
            console.log(user);
            cb(null, user);
        });
    }
    Users.login = function (cb)
    {
        Users.login({username: 'foo', password: 'bar'}, function (err, accessToken) {
            console.log(accessToken);
        });
    }
    Users.remoteMethod( 
        'add', {
            http: {path: '/add', verb: 'get'},
            returns: {arg: 'name', type: 'object'}
        }
    );
    //Users.add();
};
