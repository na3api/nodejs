module.exports = function(app) {
  var router = app.loopback.Router();
  router.get('/ping', function(req, res) {
    res.send('pongaroo');
  });
 router.get('/test', function(req, res){
	res.send('hello')	
});
  app.use(router);
}
