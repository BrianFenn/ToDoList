<?php
    include_once 'dbh.inc.php';
    include_once 'database.php';

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
            echo $row['Title'] . "<br>";
        }
    } else

    echo "There are no items to do yet. Enter an item below and click add item";

?>

<?php

$queryItem = 'SELECT * FROM todoitems
                  ORDER BY ItemNum';
$statement3 = $db->prepare($queryItem);
$statement3->execute();
$todoitems = $statement3->fetchAll();
$statement3->closeCursor();
?>

?>


<form action="additem.inc.php" method="POST">
    <input type="text" name="ItemNum" placeholder="Item Number">
    <br>
    <input type="text" name="Title" placeholder="Title">
    <br>
    <input type="text" name="Description" placeholder="Description">
    <br>
    <button type="Submit" name="submit">Add Item</button>
</form>


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
                <td><form action="delete_item.php" method="post">
                    <input type="hidden" name="ItemNum"
                           value="<?php echo $Item['ItemNum']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
</body>
</html>