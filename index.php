<?php
    include_once 'dbh.inc.php';
    include_once 'database.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

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




<form action="includes/additem.inc.php" method="POST">
    <input type="text" name="ItemNum" placeholder="Item Number">
    <br>
    <input type="text" name="Title" placeholder="Title">
    <br>
    <input type="text" name="Description" placeholder="Description">
    <br>
    <button type="Submit" name="submit">Add Item</button>
</form>


</body>
</html>