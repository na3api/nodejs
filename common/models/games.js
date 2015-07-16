module.exports = function(Games) {
    Games.getGame = function(id, cb)
    {
        Games.findById(id, function(err, instance){
            console.log(instance)
            cb(null, instance.location);
        })
    }
    Games.remoteMethod( 
        'getGame', {
            http: {path: '/getgame', verb: 'get'},
            accepts: {arg: 'id', type: 'number', http: {source: 'query'}},
            returns: {arg: 'name', type: 'Object'}
        }
    );
    Games.beforeRemote('create', function(context, user, next) {
        var req = context.req;
        req.body.date = Date.now();
        req.body.publisherId = req.accessToken.userId;
        next();
    });
};
