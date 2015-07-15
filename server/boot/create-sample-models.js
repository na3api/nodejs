module.exports = function(app) {
  app.dataSources.db.automigrate('locations', function(err) {
    if (err) throw err;
 
    app.models.locations.create([
      {id:'2', location:'Lviv'},
        {id:'3', location:'Kyiv'}
    ], function(err, locations) {
      if (err) throw err;
 
      console.log('Models created: \n', locations);
    });
  });
};
