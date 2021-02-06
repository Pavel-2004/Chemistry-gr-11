<?php
include 'functions.php';
$student = $_GET['student'];
$grade = $_GET['grade'];

$newStudent = new create($conn, $student, $grade);
$newStudent->Main(); 
header("location: index.html");