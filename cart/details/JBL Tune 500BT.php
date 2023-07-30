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
    <title>JBL Tune 500BT</title>
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
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/61TEw1TsqTS._SX522_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/61evKmAYf6S._SX522_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/617Q4EMCc-S._SX522_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/61XxgPpML8S._SX522_.jpg"></div></li>
            </ul>

            <div class="img col-10" id="img-container" >
                <img src="https://m.media-amazon.com/images/I/61TEw1TsqTS._SX522_.jpg" id="imgcont" alt="JBL Tune 500BT">
            </div>
        </div>
    </div>
    <div class="col-7 info">
        <div class='scroll'>    
        <h1>JBL Tune 500BT by Harman Powerful Bass Wireless On-Ear Headphones with Mic, 16 Hours Playtime & Multi Connect Connectivity (Black)</h1>
        <h2 class="mt-5">Price Details:</h2>
            <table class="price mt-1">
                <tr>
                    <td style='text-align:right;padding-right:10px;'>M.R.P.:</td>
                    <td><del> ₹3,999.00</del></td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>Deal of the Day:</td>
                    <td>₹2939.00</td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>You Save:</td>
                    <td>₹1,060 (27%)</td>
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
                <th> Brand </th>
                <td>JBL </td>
            </tr>
            <tr>
                <th> Manufacturer </th>
                <td>Harman International Industries, Inc, Harman International Industries, Inc, 8500, Balboa Blvd,
                    Northridge, CA 91329,USA </td>
            </tr>
            <tr>
                <th> Model </th>
                <td>JBLT500BTBLK </td>
            </tr>
            <tr>
                <th> Model Name </th>
                <td>Tune 500BT </td>
            </tr>
            <tr>
                <th> Model Year </th>
                <td>2018 </td>
            </tr>
            <tr>
                <th> Product Dimensions </th>
                <td>22.4 x 5 x 20.5 cm; 154.98 Grams </td>
            </tr>
            <tr>
                <th> Batteries </th>
                <td>1 Lithium Metal batteries required. (included) </td>
            </tr>
            <tr>
                <th> Item model number </th>
                <td>JBLT500BTBLK </td>
            </tr>
            <tr>
                <th> Compatible Devices </th>
                <td>All bluetooth devices </td>
            </tr>
            <tr>
                <th> Special Features </th>
                <td>JBL Pure Bass Sound; Dual Pairing; Lightweight &amp; Flat Foldable; Less than 2 hours of charging for
                    100% battery; Get upto 1 hour of playback with 5mins of charging </td>
            </tr>
            <tr>
                <th> Mounting Hardware </th>
                <td>1 x JBL Tune 500BT Headphone, 1 x Charging Cable, Quick Start Guide, Warranty card &amp; Safety card
                </td>
            </tr>
            <tr>
                <th> Number Of Items </th>
                <td>1 </td>
            </tr>
            <tr>
                <th> Microphone Form Factor </th>
                <td>1 Mic </td>
            </tr>
            <tr>
                <th> Headphones Form Factor </th>
                <td>On Ear </td>
            </tr>
            <tr>
                <th> Voltage </th>
                <td>3.7 Volts </td>
            </tr>
            <tr>
                <th> Battery Average Life </th>
                <td>16 Hours </td>
            </tr>
            <tr>
                <th> Batteries Included </th>
                <td>Yes </td>
            </tr>
            <tr>
                <th> Batteries Required </th>
                <td>Yes </td>
            </tr>
            <tr>
                <th> Battery Cell Composition </th>
                <td>Lithium Ion </td>
            </tr>
            <tr>
                <th> Cable Feature </th>
                <td>Detachable </td>
            </tr>
            <tr>
                <th> GSM frequencies </th>
                <td>20 KHz </td>
            </tr>
            <tr>
                <th> Connector Type </th>
                <td>Wireless </td>
            </tr>
            <tr>
                <th> Material </th>
                <td>Plastic </td>
            </tr>
            <tr>
                <th> Maximum Operating Distance </th>
                <td>100 Metres </td>
            </tr>
            <tr>
                <th> Form Factor </th>
                <td>On Ear </td>
            </tr>
            <tr>
                <th> Includes Rechargable Battery </th>
                <td>No </td>
            </tr>
            <tr>
                <th> Has Self Timer </th>
                <td>No </td>
            </tr>
            <tr>
                <th> Supports Bluetooth Technology </th>
                <td>Yes </td>
            </tr>
            <tr>
                <th> Manufacturer </th>
                <td>Harman International Industries, Inc </td>
            </tr>
            <tr>
                <th> Country of Origin </th>
                <td>China </td>
            </tr>
            <tr>
                <th> Imported By </th>
                <td>Harman International (India) Pvt Ltd, Prestige Technology Park, 4th Floor, Jupiter 2A, Marathali Ring
                    Rod, Bangalore 560103, India </td>
            </tr>
            <tr>
                <th> Item Weight </th>
                <td>155 g </td>
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