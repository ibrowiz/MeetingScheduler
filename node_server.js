
const net = require('net');
const io = require('socket.io').listen(8001);
const ioClients = [];

const server = net.createServer((socket) => {
    socket.on('data', (msg) => {
        msgData = JSON.parse(msg.toString('utf8'));

        ioClients.forEach((ioClient) => {

            // ioClient.emit(msgData.channel, {msg:msgData.message} );

        });


        io.sockets.emit(msgData.channel, {msg:msgData.message});
        console.log(msgData.channel);

    });

}).listen(8012);

// io.sockets.on('connection', function (socketIo) {
//     //ioClients.push(socketIo);
//     //console.log(socketIo);
// });

io.on('connection', function (socket) {

      
});
