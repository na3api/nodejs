module.exports = function (Locations) {
    Locations.status = function (cb) {
        var currentDate = new Date();
        var currentHour = currentDate.getHours();
        var OPEN_HOUR = 6;
        var CLOSE_HOUR = 20;
        console.log('Current hour is ' + currentHour);
        var response;
        if (currentHour > OPEN_HOUR && currentHour < CLOSE_HOUR) {
            response = 'We are o pen for business.';
        } else {
            response = 'Sorry, we are closed. Open daily from 6am to 8pm.';
        }  
        cb(null, response);
    };
    Locations.getLoc = function (id, cb) 
    {
        Locations.findById(id, function (err, intance) {
            console.log(intance)
            cb(null, intance);
        }) 
    };
//    Locations.remoteMethod( 
//        'status', 
//        {
//            http: {path: '/status', verb: 'get'},
//            returns: {arg: 'status', type: 'string'}
//        };
//    );
    Locations.remoteMethod( 
        'getLoc', {
            http: {path: '/getloc', verb: 'get'},
            accepts: {arg: 'id', type: 'number', http: {source: 'query'}},
            returns: {arg: 'name', type: 'string'}
        }
    );

};
