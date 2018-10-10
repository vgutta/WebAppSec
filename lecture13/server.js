var MongoClient = require('mongodb').MongoClient;
var express = require("express");
var http = require("http");
var bodyParser = require('body-parser');
console.log("Started server");

var router = express();
var server = http.createServer(router);
router.use(bodyParser.json());
router.use(bodyParser.urlencoded({ extended: true }));
//router.use(express.static(__dirname + "/public"));


router.get('/', function(req, res){
    
    MongoClient.connect('mongodb://localhost:27017', function(err, db){
     if(!err) {
        console.log("We are connected");
        console.log(req);
        //res.body(req.body);
        let topics = db.db('mean').collection('topics');
        console.log(topics.find());
        res.send(topics.find());
        
        //topics.insertOne(req);
      }
      //console.log("error");
    });
    
   //res.send(req.body);
});

server.listen(8080, '0.0.0.0');

