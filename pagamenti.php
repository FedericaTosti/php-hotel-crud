<?php
  header('Content-Type: application/json');

  $server = 'localhost';
  $username = 'root';
  $password = 'root';
  $dbName = 'db-hotel';
  $conn = new mysqli($server, $username, $password, $dbName);
  if ($conn -> connect_errno) {
      echo $conn -> connect_errno;
      return;
  }
  $sql = "
      SELECT paganti.name, paganti.lastname, pagamenti.status, pagamenti.price FROM pagamenti JOIN paganti ON paganti.id = pagamenti.pagante_id
  ";
  $results = $conn -> query($sql);
  if ($results -> num_rows < 1) {
      echo "no result";
      return;
  }
  $res = [];
  while ($row = $results -> fetch_assoc()) {
      $res[] = $row['name'] . " " . $row['lastname'] . " " . $row['status'] . " " . $row['price'] . "<br>";
  }
  $conn -> close();

  echo json_encode($res);
?>
