<?php
$verb = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['PATH_INFO'];
$routes = explode("/", $uri);
if ($routes[1] == "banana"){
  $bananas = $routes[2];
  if ($bananas){
    echo json_encode(Array("Bananas"=> $bananas));  
  } else{
      echo "Congrats you have Bananas";
  }
  
  
} else if($routes[1] == "apples") {
  $apples = $routes[2];
  if ($apples){
    echo json_encode(Array("Apples"=> $apples));  
  } else{
      echo "Congrats you have Apples";
  }
} else {
  echo "Usage: /banana/:banana"; 
}
?>