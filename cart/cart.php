<?php

session_start();
if(isset($_GET['cart'])){
    unset($_SESSION['cart']);
}
require_once ("ConnectDb.php");
require_once ("component.php");

$db = new ConnectDb("cart", "product_table");

if(isset($_SESSION['cart'])){
    $r=1;
    while($r<=count($_SESSION['cart'])){
        if (isset($_POST["remove$r"])){
            if ($_GET['action'] == 'remove'){
                foreach ($_SESSION['cart'] as $key => $value){
                    if($value["product_id"] == $_GET['id']){
                        unset($_SESSION['cart'][$key]);
                        echo "<script>alert('Product has been Removed...!')</script>";
                        echo "<script>window.location = 'cart.php'</script>";
                    }
                }
            }
        } $r++;
    }
}

if(isset($_POST['placeOrder'])){
    if(isset($_SESSION['cart'])){
        $name=$_SESSION['username'];
        $con=mysqli_connect("localhost","root","","cart") or die("Error".mysqli_error());
        $i=1;
        while($i<=count($_SESSION['cart'])){
            $pdt_name=$_POST["pdt${i}_name"];
            $qty=$_POST["qty$i"];
            $sql="INSERT INTO orders(user_name,product_name,qty) VALUES ('$name','$pdt_name',$qty)";
            if(!$con->query($sql)){
                die("Error".$con->error);
            }
            $i++;
        }
        unset($_SESSION['cart']);
        echo "<script>alert('Product has been placed. Thank You :)')</script>";
    }
    else{
        echo "<script>alert('No items in cart to place order. Please add some products')</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
    require_once ('header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>                
                <form method='post'>
                <hr>
                <?php
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $result = $db->getAllData();
                        $i=1;
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id'],$i);
                                    $i++;
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }
                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class='tot'>₹0</h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6 class='tot'>₹0</h6>

                    </div>
                </div>
            </div>                
            <div class="btn-container container-fluid offset-md-1 mt-2 mb-3">
                <a class='btn btn-danger' href='cart.php?cart="1"'>Clear cart</a>
                <button class='btn btn-success offset-md-1 chkout' name='placeOrder' >Place order</button></form>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            total();
            $('.qty').change(function(){
                total();
            });
            $('#user').click(function(){
                $('#acc').toggle();
            });
            $('#cart-btn').click(function(){
                <?php if(isset($_SESSION['username'])): ?>
                    window.location.replace('cart.php');
                <?php else: ?>
                    alert('Sign in to access cart');
                <?php endif ?>  
            });
            //to force login
            <?php if(isset($_SESSION['username'])): ?>
                return;
            <?php else: ?>
                window.location.replace('index.php');
                alert('Sign in to continue');
                $('.view').click(function () {alert('Sign in to continue');return false;});
            <?php endif ?>  
          
            });

        var sign=document.getElementById('signin');
        var log=document.getElementById('login');
        window.onclick=function(event){
            if(event.target==sign){
                sign.style.display='none';
            }
            if(event.target==log){
                log.style.display='none';
            }
        }

        var plusBtn  = $(".cart-qty-plus");
        var minusBtn = $(".cart-qty-minus");

        var incrementQty = plusBtn.click(function() {
            var $n = $(this).parent(".button-container").find(".qty");
            $n.val(Number($n.val())+1 );
            total();
        });

        var decrementQty = minusBtn.click(function() {
            var $n = $(this).parent(".button-container").find(".qty");
            var QtyVal = Number($n.val());
            if (QtyVal > 1) {
                $n.val(QtyVal-1);
                total();
            }
        }); 
        
        function total(){
            var total=0;
            var qty=document.getElementsByClassName('qty');
            var price = document.getElementsByClassName('price');
            var t=document.getElementsByClassName('tot');
            for (var i = 0; i < price.length; i++) {
                var pr = price[i].innerHTML;
                var qt=qty[i].value;
                if(qt<1){
                    qt=1;
                    qty[i].value=1;
                }
                p=pr.replace('₹','');
                total+=qt*p;
            }
            for (var i = 0; i <t.length; i++){
                t[i].innerHTML='₹'+total;
            }
        }
    </script>
</body>
</html>
