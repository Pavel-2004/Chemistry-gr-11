<?php
$conn = mysqli_connect('localhost', 'root', '', 'rpt');
$sql = "SELECT * FROM grades;";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    if ($_GET[$row['student']] !== null){
        $name = $row['student'];
        $grade = $_GET[$row['student']];
        $sql2 = "UPDATE grades SET grade = $grade WHERE student = '$name'";
        mysqli_query($conn, $sql2);
    } 
}
header("location: index.html")
?>