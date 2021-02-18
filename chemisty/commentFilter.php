<?php
$conn = mysqli_connect("localhost", "root", "", "comments");
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
        echo $row['id'];
        echo "<br>";
        if($_GET[trim($row['id'])] === "accept"){
            //add a to sql
            echo 'in'; 
            $id = trim($row['id']);
            $sql = "UPDATE comments SET stat = 'A' WHERE id=$id;";
            mysqli_query($conn, $sql);
        } elseif($_GET[trim($row['id'])] === "decline"){
            //delete sql row
            $id = trim($row['id']);
            $sql = "DELETE FROM comments WHERE id=$id;";
            mysqli_query($conn, $sql);
        }
    }
}
header("Location: molarMass.php"); 