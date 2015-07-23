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
    /* create Messages table */
//    app.dataSources.db.automigrate('messages', function (err) {
//        if (err)
//            throw err;
//        console.log('Models messages created');
//       
//    });
    /* create positions table */
    app.dataSources.db.automigrate('positions', function (err) {
        if (err)
            throw err;
        console.log('Models positions created');
       
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
    /* create service tables */
    app.dataSources.db.automigrate(['AccessToken', 'ACL', 'RoleMapping', 'Role'], function (err) {
        if (err)
            throw err;
        else{
            console.log('Tables: AccessToken, ACL, RoleMapping, Role were created');    
            app.models.Role.create([
                {id: '1', name: 'Admin', description:'Super admin'},
                {id: '2', name: 'Moderator'},
                {id: '3', name: 'User'}
            ], function (err, role) {
                if (err)
                    throw err;
                else
                {
                    console.log('Roles created: \n', role);
                    app.models.RoleMapping.create({
                        principalType: role.OWNER,
                        principalId: 1,
                        roleId:role[0].id
                        }, function(err, principal) {
                            if (err)
                                throw err;
                    });
                }
                
            });
        }          
    });
};
