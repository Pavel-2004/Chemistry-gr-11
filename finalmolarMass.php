<?php
require('functions.php');

$test = new molarMass($_GET['formula']);
$x = $test->Main();
?>
<h1><?=$x?>g/mol</h1>
<a href="molarMass.php">Go back</a>