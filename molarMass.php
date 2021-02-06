<?php
require('functions.php'); 
?>
<h1>Molar Mass</h1>
<p>
molar mass: The mass of a given substance (chemical element or chemical compound in g) divided by its amount of substance (mol). mole: The amount of substance of a system that contains as many elementary entities as there are atoms in 12 g of carbon-12.
</p>
<h3>Formula</h3>
<h5>Molar mass = subscript * atomic mass of element</h5>
<h3>Calculator</h3>
<form action="finalmolarMass.php" method="get">
    <h5>Enter chemical formula</h5>
    <input type="text" name="formula">
    <input type="submit" value="submit">
</form>

<div style="border-style: solid;">
    <h5>Comments</h5>
    <?php
        $showComments = new Comments($conn, '');
        $showComments->readComment();
    ?>
    <h5>Comment</h5>
    <form action="FinalizeComment.php" method="get">
        <textarea name="comment" cols="30" rows="10"></textarea>
        <input type="submit" value="submit">
    </form>
</div>
