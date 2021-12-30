<?php

  #data base host, data base user, database pass, database name
  $dbHost = "localhost";
  $dbUser = "root";
  $dbPass = "";
  $dbName = "newstoday";
  $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
 
  if($db){
    //   echo "data base conected";
  }else{
      echo "error!!";
  }



?>