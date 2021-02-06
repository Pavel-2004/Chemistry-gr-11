<?php
include "functions.php";
$student = $_GET['student'];
$deleteStudent = new delete($conn, $student);
$deleteStudent->Main();
header("Location: index.html"); 