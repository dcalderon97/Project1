<?php
// Start the session
session_start();
if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'],$_GET['id']);
?>
<html>
  <head>
        <link rel="stylesheet" type="text/css" href="style.css">
  </head>  
  <body>
      <h1 class = "raleWay"align = "center">Product Was Added To Cart</h1>
      <div align = "center">
        <a class = "button"style = "text-align:center "href = "cart.php?go=true">View Shopping Cart</a>
        <a class = "button"href = "main.php">Go Back To Main Page</a>
      </div>
  </body>
</html>