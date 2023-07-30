<?php  
session_start();
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    setcookie('username',"",time()-(60*60*24),'/');
    header('location:'.$_SERVER['HTTP_REFERER']);
}
if(!isset($_SESSION['username']) && isset($_COOKIE['username']))
    $_SESSION['username']=$_COOKIE['username'];

require_once('ConnectDb.php');
require_once ('component.php');

$database=new ConnectDb();

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="indexstyle.css">
</head>

<body>
<?php require_once("header.php"); ?>

<!-- content -->

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <?php
            $result = $database->getAllData();
            while ($row = mysqli_fetch_assoc($result)){
                component($row['product_name'], $row['product_image']);
            }
        ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6a04987930.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
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