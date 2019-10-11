var express = require('express')
var app = express()
var server = require('http').Server(app)
// fecth data
var allowCrossDomain = function(req, res, next) {
    res.header('Access-Control-Allow-Origin', "*");
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
    res.header('Access-Control-Allow-Headers', 'Content-Type');
    next();
}
app.use(allowCrossDomain);
//Database
var mongoose = require('mongoose')
var DBurl =  require('./data/config')
mongoose.connect(DBurl.url)
//Body parser
var bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
//route 
var io = require('socket.io')(server);
//Soket.io 
io.on('connection',(socket)=>{
    socket.on('Change_state',()=>{
         io.sockets.emit('Change')
    })
    socket.on('Booting',()=>{
        io.sockets.emit('Booted')
    })
    socket.on('Cancel',()=>{
        io.sockets.emit('Canceled')
    })
    socket.on('Complete',()=>{
        io.sockets.emit('Completed')
    })
    socket.on('Client_Cancel',()=>{
        io.sockets.emit('Client_Canceled')
    })
   
})
var user = require('./route/user');
app.use('/',user);
server.listen(8080,console.log('Connecting....')) 