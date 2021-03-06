<?php
require_once 'lib/config.php';

if (isset($_GET['id'])) {
  $database = new mysqli(DATABASE, USERNAME, PASSWORD, DATABASE_NAME, PORT);
  $clientQuery = $database->query('SELECT * FROM clients WHERE id = '.$_GET['id']);
  if ($clientQuery && $clientQuery->num_rows) {
    $client = $clientQuery->fetch_assoc();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
  <form action="index.php" method="post">
    <label for="name">Jméno a příjmení</label>
    <input id="name" type="text" name="name" value="<?php echo $client['name'] ?? '' ?>">
    <label for="phone">Telefonní číslo</label>
    <input id="phone" type="text" name="phone" value="<?php echo $client['phone'] ?? '' ?>">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="<?php echo $client['email'] ?? '' ?>">
    <label for="description">Dlouhá poznámka</label>
    <textarea id="description" name="description"><?php echo $client['description'] ?? '' ?></textarea>
    <input type="hidden" name="id" value="<?php echo $client['id'] ?? '' ?>">
    <?php
      if (isset($_GET['id'])) {
        echo
        '<button type="submit" name="update">Upravit</button>
        <button type="submit" name="delete">Smazat</button>';
      }
      else {
        echo
        '<button type="submit" name="create">Vytvořit</button>';
      }
    ?>
  </form>
</body>
</html>