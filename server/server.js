var loopback = require('loopback');
var boot = require('loopback-boot');
var session = require('cookie-session');

var app = module.exports = loopback();
app.set('trust proxy', 1) // trust first proxy

app.get('/login', function (req, res) {
    res.send('hello')
    req.session.user = {id:'Napoleon'};
    console.log(req.session.user)
});



app.start = function () {
    // start the web server
    return app.listen(function () {
        app.emit('started');
        console.log('Web server listening at: %s', app.get('url'));
    });
};

// Bootstrap the application, configure models, datasources and middleware.
// Sub-apps like REST API are mounted via boot scripts.
boot(app, __dirname, function (err) {
    if (err)
        throw err;
    app.use('/express-status', function (req, res, next) {
        res.json({running: true});
    });
    // start the server if `$ node server.js`
    if (require.main === module)
        app.start();
});
