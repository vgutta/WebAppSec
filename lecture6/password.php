<?php
    $dictionary = file_get_contents("dictionary.txt");
    $words = explode("\n", $dictionary);
    $random_word = $words[array_rand($words)];
    //echo $random_word;
    $hashed_word = hash("sha256", "$random_word");
    //echo $hashed_word;
    $hash = "eb0f7a3002c9713e1119c7697e36d95b4307f0df9bcb224a335532a72b6f25f2";
    foreach ($words as &$chosen_word){
        $chosen_hash = hash("sha256", "$chosen_word");
        if ($hash == $chosen_hash){
            echo $chosen_word;
        }
    }
?>