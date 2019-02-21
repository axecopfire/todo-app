<?php

try {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "todo-app";


    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

    echo "<br>Connected successfully";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

?>