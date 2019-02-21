<?php include "header.php" ?>

<form action="form.php" method="GET" >
  To Do:<input type="text" name="todo" >
  <input type="submit" value="Add To Do" >
</form>

<table></table>

<?php

  // Insert Task into Database
  if( !empty($_GET) && isset($_GET) ) {
    addRecord($_GET['todo']);
  }

  if( ( !empty($_POST) && isset($_POST) ) || ( !empty($_GET) && isset($_GET) ) ) {

    if(isset($_POST["update"])) {
      updateRecord($_POST["update"]);
    }
    if(isset($_POST["delete"])) {
      deleteRecord($_POST["delete"]);
    }

    // Read Tasks from Database
    try {
      $sql = "SELECT * FROM tasks";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $results = $stmt->fetchAll();

      echo tableGenerate($results);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }

?>


</body>
</html>

<?php $pdo = null; ?>