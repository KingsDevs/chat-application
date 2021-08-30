const socket = require( 'socket.io' );
const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = socket.listen( server );
const port = process.env.PORT || 3000;

server.listen(port, function () {
    console.log('Server listening at port %d', port);
});

io.on('connection', function (socket) {
    // socket.on( 'new_message', function( data ) {
    //     io.sockets.emit( 'new_message', {
    //         message: data.message,
    //         date: data.date,
    //         msgcount: data.msgcount
    //     });
    // });
});