module.exports = function (app) {
    app.dataSources.db.automigrate('locations', function (err) {
        if (err)
            throw err;

        app.models.locations.create([
            {id: '2', location: 'Lviv'},
            {id: '3', location: 'Kyiv'}
        ], function (err, locations) {
            if (err)
                throw err;

            console.log('Models created: \n', locations);
        });
    });
    /* create service tables */
    app.dataSources.db.automigrate(['AccessToken', 'ACL', 'RoleMapping', 'Role'], function (err) {
        if (err)
            throw err;
        else console.log('Tables: AccessToken, ACL, RoleMapping, Role were created');
            
    });
    /* create User table with admin */
    app.dataSources.db.autoupdate('User', function (err) {
        if (err)
            throw err;
        var admin_data =  {
                        id:1,
                        email: 'admin@admin.com',
                        password: '123456',
                        username:'Admin',
                    }
        app.models.User.findById(1, function(err, admin){
            if(admin !== null)
            {
                admin.updateAttributes(admin_data, function (err, user) {
                    if (err)
                        throw err;

                    console.log('Admin data updated: '+ user.username);
                });               
            }else{
                app.models.User.create( admin_data , function (err, user) {
                    if (err)
                        throw err;

                    console.log('Admin created: '+user.username);
                }); 
            }
            
        })
    });
};
