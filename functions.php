<?php
function addRecord($userInput) {
  try {
    $sql = "INSERT INTO tasks (task, status) VALUES (?, '0')";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$userInput]);
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
function deleteRecord($recordId) {
    global $pdo;
    $sql = "DELETE FROM tasks WHERE id=$recordId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
  }

  function updateRecord($recordId) {
    global $pdo;
    $sql = "UPDATE tasks SET status='1' WHERE id=$recordId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
  }

  function tableGenerate ($results) {

    $table = "<table>";


    $table .= "<th>Task Name</th><th>Status</th><th>Update Status</th>";

    foreach($results as $record) {
      $table .= "<tr>" .
      "<td>" .
      $record['task'] .
      "</td>";

      if($record['status'] === "1" ) {
        $table .= "<td>Task Completed</td>";
      } else {
        $table .= "<td></td>";
      }

      $table .=
      "<td><form action='form.php' method='POST' ><input style='display:none;' type='text' name='update' value='". addRecordId($record) . "'><input type='submit' value='Update Status'></form></td>" .
      "<td><form action='form.php' method='POST' ><input style='display:none;' name='delete' value='". addRecordId($record) . "'><input type='submit' value='Delete Button'></form></td>" .
      "</tr>";
    }
    $table .= "</table></form>";

    return $table;
  }

  function addRecordId($record) {
    return $record["id"];
  }

  ?>