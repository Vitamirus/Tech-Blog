// var io = require('socket.io')(6001);
// io.on('connection', function (socket) {
//
//     console.log('New connection');
//
// });
var app = require('express')();
var http = require('http').createServer(app);


http.listen(3000, () => {
    console.log('listening on *:3000');
});
app.on('connection', function (socket) {

    console.log('New connection', socket.id);

    socket.send('Messange from server')
});
