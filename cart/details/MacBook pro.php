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
    <title>MacBook pro</title>
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
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/61L5QgPvgqL._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/71WtFY52CeL._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/91OmS1Zjv+L._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/61Cznaut7dL._SX679_.jpg"></div></li>
            </ul>

            <div class="img col-10" id="img-container" >
                <img src="https://m.media-amazon.com/images/I/61L5QgPvgqL._SX679_.jpg" id="imgcont" alt="MacBook pro">
            </div>
        </div>
    </div>
    <div class="col-7 info">
        <div class='scroll'>    
            <h1>2022 Apple MacBook Pro Laptop with M2 chip: 33.74 cm (13.3-inch) Retina Display, 8GB RAM, 256GB SSD ​​​​​​​Storage, Touch Bar, Backlit Keyboard, FaceTime HD Camera​​​; Space Grey ​​​​​​​</h1>    
            <h2 class="mt-5">Price Details:</h2>
            <table class="price mt-1">
                <tr>
                    <td style='text-align:right;padding-right:10px;'>M.R.P.:</td>
                    <td><del>₹1,29,900.00</del></td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>Deal of the Day:</td>
                    <td>1,15,590.00</td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>You Save:</td>
                    <td>₹14,000.00 (11%)</td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'></td>
                    <td>Inclusive of all taxes</td>
                </tr>
            </table>

            <form action="" method="post">
            <button type="submit" name="add" class="btn-success">Add to cart</button><br>  
            </form> 
            <h2>Technical Details:</h2>
            <table class='desc'>
                <tr>
                <td>Brand</td>
                <td> <span>Apple</td>
                </tr>
                <tr>
                    <td>Model Name</td>
                    <td> <span>MacBook Pro</td>
                </tr>
                <tr>
                    <td>Screen Size</td>
                    <td> <span>13.3</td>
                </tr>
                <tr>
                    <td>Colour</td>
                    <td> <span>Space Grey</td>
                </tr>
                <tr>
                    <td>CPU Model</td>
                    <td> <span>Others</td>
                </tr>
                <tr>
                    <td>RAM Memory Installed Size</td>
                    <td> <span>8 GB</td>
                </tr>
                <tr>
                    <td>Operating System</td>
                    <td> <span>Mac OS</td>
                </tr>
                <tr>
                    <td>Special Feature</td>
                    <td> <span>Portable, Backlit Keyboard</td>
                </tr>
                <tr>
                    <td>Graphics Card Description</td>
                    <td> <span>Integrated</td>
                </tr>
                <tr>
                    <td>CPU Speed</td>
                    <td> <span>8</td>
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