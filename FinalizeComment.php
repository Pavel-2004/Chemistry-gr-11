<?php
require('functions.php');
$comment = $_GET['comment'];
$addComment = new Comments($conn, $comment);
$addComment->addComment();
header("Location: molarMass.php"); 