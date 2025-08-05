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

    if (count($items) > 0) {
      echo '<table border="1" cellpadding="8" cellspacing="0">';
      echo '<tr><th>Item Name</th><th>Quantity</th><th>Purchase Date</th></tr>';
      foreach ($items as $item) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($item['item_name']) . '</td>';
        echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
        echo '<td>' . htmlspecialchars($item['purchase_date']) . '</td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo '<p>No items found.</p>';
    }

  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  
/*
I chose these items because they fit the theme of the other items given in the
starter code. This could scale to real world inventory systems by allowing
users to add, update, and delete items, as well as track their quantities and
purchase dates. Any items added to the inventory_db database using mySQL
commands will automatically be updated. Using PDO protects against SQL injection
by using prepared statements and parameterized queries, which is a best practice
for database interactions.
*/
  
  ?>
</body>
</html>