<?php
   $username = $_REQUEST["username"];
   $pwd = $_REQUEST["password"];
   if ($username == "andy" && $pwd == "rules") {
      $_SESSION["logged_in"] = true;
      echo "You logged in!";
   } else {
      $_SESSION["logged_in"] = false;
      header("Location: index.html"); /* Redirect browser */
      exit();
   }
   
   $salt = openssl_random_pseudo_bytes(40, $was_strong);
   if (!$was_strong){
     die("Oh no...");
   }
   
   $hash = hash("sha256", "$word");
   
   $salt = "salt";
   $temp = "0";
   $r = 2;
   
   superhash($pwd, $salt, $temp, $r){
       
       $temp = hash()
       
   }
?>