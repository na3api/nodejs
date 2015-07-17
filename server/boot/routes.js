module.exports = function (app) {
    var router = app.loopback.Router();
    router.get('/login', function (req, res) {
        req.session.skills.push('Baking');
        console.log(req)
        //app.use(app.session({ secret: 'keyboard cat', cookie: { maxAge: 60000 }}))
    });
    router.get('/test', function (req, res) {
        res.send('hello')
    });
    app.use(router);
}
