<?php
require_once 'lib/config.php';

$database = new mysqli(DATABASE, USERNAME, PASSWORD, DATABASE_NAME, PORT);
if (isset($_POST['update'])) {

}
if (isset($_POST['update'])) {

}
if (isset($_POST['delete'])) {

}
$clientList = '<table>';
$clientQuery = $database->query('SELECT * FROM clients');
if ($clientQuery && $clientQuery->num_rows) {
  while ($client = $clientQuery->fetch_assoc()) {
    $clientList .=
      '<tr>
        <td>'.$client['name'].'</td>
        <td>'.$client['phone'].'</td>
        <td>'.$client['email'].'</td>
        <td>'.$client['description'].'</td>
      <tr>
      ';
  }
}
$clientList .= '</table>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
  <h1>Seznam klientů</h1>
  <?php echo $clientList ?>
</body>
</html>