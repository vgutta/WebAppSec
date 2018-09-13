<?php

    $dbhandle = new PDO("sqlite:chatroom.db") or die("Failed to open DB");
    if (!$dbhandle) die ($error);
   
    $verb = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['PATH_INFO'];
    $routes = explode("/", $uri);
    if ($verb == "GET"){
        $query = "SELECT * FROM messages";
        $statement = $dbhandle->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');
        echo json_encode($results);
    } else if ($verb == "POST") {
        $author = $_POST["author"];
        $msg = $_POST["msg"];
        $query = "INSERT INTO messages(author, msg) VALUES(?, ?)";
        $statement = $dbhandle->prepare($query);
        $statement-> execute([$author, $msg]);
        echo "$msg by $author";
        $query = "SELECT * FROM messages";
        $statement = $dbhandle->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');
    } else {
        echo "Use GET for fetching data and POST to send data";
    }
?>