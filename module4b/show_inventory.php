<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory List</title>
</head>
<body>
  <h1>Inventory List</h1>
  <?php
  try {
    $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->query("SELECT * FROM items");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($items as $item) {
      echo "<p>{$item['item_name']} ({$item['quantity']} units)</p>";
    }

  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
</body>
</html>