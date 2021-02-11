<?php
require('functions.php');
session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resources/molarMass.css">
</head>
<body>
    <div class="container">
        <div class="bar">
            <div class="title">
                <h1>Grade 11 Chemistry</h1>
            </div>
            <div class="sites">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Place holder</a></li>
                    <li><a href="#">Place holder</a></li>
                </ul>
            </div>
        </div>
        <div class="left">
            <div class="section">
                <h1>Molar Mass calculator</h1>
            </div>
            <div class="description">
                <h3>What is the Molar Mass?</h3>
                <p>
                The mass of a given substance (chemical element or chemical compound in g) divided by its amount of substance (mol). mole: The amount of substance of a system that contains as many elementary entities as there are atoms in 12 g of carbon-12.
                </p>
            </div>
            <div class="example">
                <div class="formula">
                    <h1>Formula</h1>
                    <h4>Atomic mass = atomic mass × subscript</h4>
                </div>
                <div class="atomicMass">
                    <img src="resources/pictures/AtomicMas.png">
                </div>
                <div class="subscript">
                    <img src="resources/pictures/subscript.png">
                </div>
            </div>
            <div class="calculator">
                <form action="finalmolarMass.php">
                    <h5>Enter Chemical Formula</h5>
                    <input type="text" name="formula" class="text">
                    <input type="submit" value="calculate" class="submit">
                </form>
            </div>
        </div>
        <div class="right">
            <div class="comments">
                <?php
                $showComments = new Comments($conn, '');
                if(isset($_SESSION['login'])){
                    $showComments->readCommentAdmin();
                } else{
                    $showComments->readComment();
                } 
                ?>
            </div>
        </div>
    </div>

</body>
</html>
