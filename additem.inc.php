<?php
    include_once 'dbh.inc.php';

    $ItemNum = $_POST['ItemNum'];
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
 

    $sql = "INSERT INTO todoitems (ItemNum, Title, Description)
	VALUES ('$ItemNum', '$Title', '$Description');";
    mysqli_query($conn, $sql);
    
    header("Location: ../index.php?additem=success");  

	