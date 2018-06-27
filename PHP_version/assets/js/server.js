var http = require('http');
http.createServer(function (request, response) {

    response.writeHead(200, { 
        'Content-Type': 'text/plain',
        'Access-Control-Allow-Origin': '*' // implementation of CORS
    });

    request.on('data', function (chunk) {
        //var jsonParser = bodyParser.json(); // для получения данных в формате json необходимо создать парсер
        var d = JSON.parse(chunk);
        console.log(d.data);
        //response.json(data);
        var otv = d.data;
        otv = eval(otv);
        console.log('otv = ' + otv);
        response.write(JSON.stringify({'data': otv}));
        response.end();
    });

}).listen(3000, '127.0.0.1');
console.log('Server running at http://127.0.0.1:3000/');
console.log('...');