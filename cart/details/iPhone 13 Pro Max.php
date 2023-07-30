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
    <title>iPhone 13 Pro Max</title>
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
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/61i8Vjb17SL._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/71rswJs9W9L._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/81DzfVDR-lL._SX679_.jpg"></div></li>
                <li><div class='list'><img src="https://m.media-amazon.com/images/I/7161nwSVX9L._SX679_.jpg"></div></li>
            </ul>

            <div class="img col-10" id="img-container" >
                <img src="https://m.media-amazon.com/images/I/61i8Vjb17SL._SX679_.jpg" id="imgcont" alt="iPhone 13 Pro Max">
            </div>
        </div>
    </div>
    <div class="col-7 info">
        <div class='scroll'>
            <h1>Apple iPhone 13 Pro Max (128GB) - Sierra Blue</h1>    
            <h2 class="mt-5">Price Details:</h2>
            <table class="price mt-1">
                <tr>
                    <td style='text-align:right;padding-right:10px;'>M.R.P.:</td>
                    <td><del>₹1,29,900.00</del></td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>Deal of the Day:</td>
                    <td>₹1,15,900.00</td>
                </tr>
                <tr>
                    <td style='text-align:right;padding-right:10px;'></td>
                    <td>Ends in 3 days</td>
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
            <table>
                <tr>
                    <td style='text-align:right;padding-right:10px;'>Size:</td>
                    <td><select name="size" id="size"><option value="128">128GB</option><option value="256">256GB</option></select></td>
                </tr>
            </table><br>
            <form action="" method="post">
            <button type="submit" name="add" class="btn-success">Add to cart</button><br>  
            </form> 
            <h2>Technical Details:</h2>
            <table class='desc'>
            <tr>
                <td style="width:120px;">
                    <p><strong>Display</strong></p>
                </td>
                <td>
                    <p>6.7-inch (17 cm diagonal) Super Retina XDR display with ProMotion</p>

                </td>
            </tr>

            <tr>
                <td style="width:120px;">
                    <p><strong>Capacity</strong></p>

                </td>
                <td>
                    <p>128GB, 256GB, 512GB, 1TB</p>

                </td>
            </tr>

            <tr>
                <td style="width:120px;">
                    <p><strong>Splash, Water, and Dust Resistant</strong></p>

                </td>
                <td>
                    <p>All-glass and surgical-grade stainless steel design, water and dust resistant (rated IP68)</p>

                </td>
            </tr>

            <tr>
                <td style="width:120px;">
                    <p><strong>Camera and Video</strong></p>

                </td>
                <td>
                    <p>Triple 12MP cameras with Portrait mode, Depth Control, Portrait Lighting, Smart HDR 3, and 4K Dolby
                        Vision HDR video up to 60 fps</p>

                </td>
            </tr>

            <tr>

                <td style="width:120px;">
                    <p><strong>Front Camera</strong></p>

                </td>
                <td>
                    <p>12MP TrueDepth front camera with Portrait mode, Depth Control, Portrait Lighting, and Smart HDR 4</p>

                </td>
            </tr>

            <tr>
                <td style="width:120px;">
                    <p><strong>Power and Battery</strong></p>

                </td>
                <td>
                    <p>Video playback:Up to 28 hours, Video playback (streamed):Up to 25 hours, Audio playback:Up to 95
                        hours, 20W adapter or higher (sold separately), Fast-charge capable: Up to 50% charge in around 30
                        minutes with 20W adapter or higher</p>

                </td>
            </tr>

            <tr>
                <td style="width:120px;">
                    <p><strong>In the Box</strong></p>

                </td>
                <td>
                    <p>iPhone with iOS 15, USB-C to Lightning Cable, Documentation</p>

                </td>
            </tr>

            <tr>
                <td style="width:120px;">
                    <p><strong>Warranty</strong></p>

                </td>
                <td>
                    <p>Apple-branded hardware product and accessories contained in the original packaging (“Apple Product”)
                        come with a One-Year Limited Warranty. See&nbsp;apple.com/in/legal/warranty&nbsp;for more
                        information.</p>

                </td>
            </tr>

            <tr>
                <td style="width:120px;">
                    <p><strong>Height</strong></p>

                </td>
                <td>
                    <p>6.33 inches (160.8 mm)</p>

                </td>
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