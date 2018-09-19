<?php
    $dbhandle = new PDO("sqlite:dictionary.db") or die("Failed to open DB");
    if (!$dbhandle) die ($error);
    
    $raw = file_get_contents("dictionary.txt");
    $words = explode("\n", $raw);
    
    $salt = "26b00c62a6945f7c00b6778e4ab0427cf1df7fbe3a782f485d01facb3b974fdd4bfbe08c135104d6";
    
    foreach($words as $word){
        $hash = hash("sha256", "$word");
        $saltedhash = $hash + $salt;
        $query = "INSERT INTO dictionary (hash, word) values (?, ?)";
        $statement = $dbhandle->prepare($query);
        $statement-> execute([$saltedhash, $word]);
    }
    
?>    