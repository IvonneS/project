<?php
    include 'functions.php';
    session_start();
//If 'removeId' has been sent, search the cart for that itemId and unset if
    /*if(isset($_POST['removeId'])){
        foreach($_SESSION['cart'] as $itemKey => $item){
            if($item['id'] == $_POST['removeId']){
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    //if 'itemId' quantity has been sent, search for the item with that ID and update quantity
    if(isset($_POST['itemId'])){
        foreach($_SESSION['cart'] as &$item){
            if ($item['id'] == $_POST['itemId']){
                $item['quantity']= $_POST['update'];
            }
        }
    }
  */

?>
<!DOCTYPE html>
<html>
    <head>
       <title>Shopping Cart</title>
        
        <h1>WELCOME</h1>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
       <div>
            <ul class='bar'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='cart.php'>
            </ul>
        </div>    
            
    </body>
</html>