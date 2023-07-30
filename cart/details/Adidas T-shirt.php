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
    <title>Adidas T-shirt</title>
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
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/71t+ZJ+WB-L._UY879_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/716CypMqHtL._UX569_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/71qterpNjoL._UX569_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/81GXERwb3VL._UX569_.jpg"></div></li>
            </ul>

            <div class="img col-10" id="img-container" >
                <img src="https://m.media-amazon.com/images/I/71t+ZJ+WB-L._UY879_.jpg" id="imgcont" alt="Adidas T-shirt">
            </div>
        </div>
    </div>
    <div class="col-7 info">
        <div class='scroll'>    
        <h1>Adidas Men's Fitted T-Shirt</h1>
        <h2 class="mt-5">Price Details:</h2>
            <table class="price mt-1">
                <tr>
                    <td style='text-align:right;padding-right:10px;'>M.R.P.:</td>
                    <td>₹749.00 - ₹1,499.00</td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>Color:</td>
                    <td>BLACK/WHITE</td>
                </tr>

            </table>

            <h2>Size Chart:</h2>
            <form action="" method="post">
            <select name="size" id="size">
                <option value="">Select</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="2XL">2XL</option>
            </select>   
            <button type="submit" name="add" class="btn-success">Add to cart</button><br>  
            </form> 
            <table class='desc'>
            <tr>
                <th>Brand Size</th>
                <th>Standard Size</th>
                <th>Chest</th>
                <th>Length</th>
            </tr>
            <tr>
                <td>XS</td>
                <td>XS</td>
                <td>36.2</td>
                <td>28</td>
            </tr>
            <tr>
                <td>S</td>
                <td>S</td>
                <td>38.6</td>
                <td>28.5</td>
            </tr>
            <tr>
                <td>M</td>
                <td>M</td>
                <td>41.7</td>
                <td>30</td>
            </tr>
            <tr>
                <td>L</td>
                <td>L</td>
                <td>44.9</td>
                <td>30.5</td>
            </tr>
            <tr>
                <td>XL</td>
                <td>XL</td>
                <td>48.8</td>
                <td>31</td>
            </tr>
            <tr>
                <td>XXL</td>
                <td>XXL</td>
                <td>52</td>
                <td>32</td>
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