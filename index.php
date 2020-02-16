<?php
    include_once 'includes/dbh.inc.php';
    include_once 'includes/database.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>My To Do List Creator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
<h1>To Do List Creator</h2>

<?php 
    $sql = "SELECT * FROM todoitems;";
    
    $result = mysqli_query($conn, $sql);

    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo  "Item " . $row['ItemNum'] . ": " .  $row['Title'] . "<br>";
        }
    } else

    echo "<h3>There are no items to do yet. Enter an item below and click add item</h3>";

?>

<?php

$queryItem = 'SELECT * FROM todoitems
                  ORDER BY ItemNum';
$statement3 = $db->prepare($queryItem);
$statement3->execute();
$todoitems = $statement3->fetchAll();
$statement3->closeCursor();
?>






<table>
            <tr>
                <th>Item Number</th>
                <th>Title</th>
                <th class="right">Description</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($todoitems as $Item) : ?>
            <tr>
                <td><?php echo $Item['ItemNum']; ?></td>
                <td><?php echo $Item['Title']; ?></td>
                <td class="right"><?php echo $Item['Description']; ?></td>
                <td><form action="includes/delete_item.inc.php" method="post">
                    <input type="hidden" name="ItemNum"
                           value="<?php echo $Item['ItemNum']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="todolist_add_item.php">Add Item</a></p>
</body>
</html>