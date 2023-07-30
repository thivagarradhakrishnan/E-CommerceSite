<?php  
session_start();

$id=$_GET['pid'];
if(isset($_POST['category'])){
    $_SESSION['category']=$_POST['category'];
    setcookie('category',$_POST['category'],time()+(60*60*24),'/');
    }
    if(!isset($_SESSION['category']) && isset($_COOKIE['category']))
        $_SESSION['category']=$_COOKIE['category'];
    
    if (isset($_POST['add'])){
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], "product_id");
            if(in_array($id, $item_array_id))
            {
                echo "<script>alert('Product is already added in the cart..!')</script>";
            }
            else
            {
                $count = count($_SESSION['cart']);
                $item_array = array('product_id' => $id);
                array_push($_SESSION['cart'],$item_array);
            }
    
        }
        else{
            $item_array = array('product_id' => $id);
            $_SESSION['cart'][0] = $item_array;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samsung Galaxy S22 Ultra 5G</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6a04987930.js" crossorigin="anonymous"></script>
</head>
<body>

<?php require_once('../header.php'); ?>
<br>
<div class="container-fluid">
<div class="row">
    <div class="col-5 imgcont">
        <div class="row mt-5">
            <ul class="col-2">
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/51TUyA8hXWL._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/71PvHfU+pwL._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/71Mo2pzT4XL._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/71D4R3gRKjL._SX679_.jpg"></div></li>
            </ul>

            <div class="img col-10" id="img-container" >
                <img src="https://m.media-amazon.com/images/I/51TUyA8hXWL._SX679_.jpg" id="imgcont" alt="Samsung Galaxy S22 Ultra 5G">
            </div>
        </div>
    </div>
    <div class="col-7 info">
        <div class='scroll'>
            <h1>Samsung Galaxy S22 Ultra 5G (Phantom Black, 12GB, 256GB Storage)</h1>    
            <h2 class="mt-5">Price Details:</h2>
            <table class="price mt-1">
                <tr>
                    <td style='text-align:right;padding-right:10px;'>M.R.P.:</td>
                    <td><del>₹1,31,999.00</del></td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>Deal of the Day:</td>
                    <td>₹1,09,999.00</td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'></td>
                    <td>Ends in 4 days</td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>You Save:</td>
                    <td>₹22,000.00 (17%)</td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'></td>
                    <td>Inclusive of all taxes</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>Size:</td>
                    <td><select name="size" id="size"><option value="12+256">12GB RAM + 256GB STORAGE</option><option value="12+512">12GB RAM + 512GB STORAGE</option></select></td>
                </tr>
            </table><br>
            <form action="" method="post">
            <button type="submit" name="add" class="btn-success">Add to cart</button><br>  
            </form> 
            <h2>Technical Details:</h2>
            <table class='desc'>
                <tr>
                    <th> OS </th>
                    <td>Android 12 </td>
                </tr>
                <tr>
                    <th> RAM </th>
                    <td>12 GB </td>
                </tr>
                <tr>
                    <th> Product Dimensions </th>
                    <td>0.9 x 7.8 x 16.3 cm; 228 Grams </td>
                </tr>
                <tr>
                    <th> Batteries </th>
                    <td>1 Lithium Ion batteries required. (included) </td>
                </tr>
                <tr>
                    <th> Item model number </th>
                    <td>SM-S908EDRGINU </td>
                </tr>
                <tr>
                    <th> Connectivity technologies </th>
                    <td>Bluetooth, Wi-Fi, USB </td>
                </tr>
                <tr>
                    <th> GPS </th>
                    <td>True </td>
                </tr>
                <tr>
                    <th> Special features </th>
                    <td>Fast Charging Support, Wireless Charging </td>
                </tr>
                <tr>
                    <th> Display technology </th>
                    <td>AMOLED </td>
                </tr>
                <tr>
                    <th> Other display features </th>
                    <td>Wireless </td>
                </tr>
                <tr>
                    <th> Device interface - primary </th>
                    <td>Touchscreen </td>
                </tr>
                <tr>
                    <th> Other camera features </th>
                    <td>Rear, Front </td>
                </tr>
                <tr>
                    <th> Form factor </th>
                    <td>Bar </td>
                </tr>
                <tr>
                    <th> Colour </th>
                    <td>Dark Red </td>
                </tr>
                <tr>
                    <th> Battery Power Rating </th>
                    <td>5000 </td>
                </tr>
                <tr>
                    <th> Whats in the box </th>
                    <td>Handset, Ejection Pin,Data Cable,Quick Start Guide </td>
                </tr>
                <tr>
                    <th> Manufacturer </th>
                    <td>Samsung India pvt Ltd </td>
                </tr>
                <tr>
                    <th> Country of Origin </th>
                    <td>Vietnam </td>
                </tr>
                <tr>
                    <th> Item Weight </th>
                    <td>228 g </td>
                </tr>
            </table>
            <br>
        </div>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.list').click(function(){
            var src=$('img',this).attr('src');
            $('#imgcont').attr('src',src);
        });
    });
    $(document).ready(function(){
        $('#user').click(function(){
            $('#acc').toggle();
        });
        $('#cart-btn').click(function(){
            <?php if(isset($_SESSION['username'])): ?>
                window.location.replace('http://localhost/cart/cart.php');
            <?php else: ?>
                alert('Sign in to access cart');
            <?php endif ?>  
        });
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
</script>

</body>
</html>