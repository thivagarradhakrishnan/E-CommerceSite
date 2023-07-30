<?php  
session_start();

require_once ('component.php');
require_once('ConnectDb.php');

$database=new ConnectDb("cart","product_table");

if(isset($_POST['category'])){
$_SESSION['category']=$_POST['category'];
setcookie('category',$_POST['category'],time()+(60*60*24),'/');
}
if(!isset($_SESSION['category']) && isset($_COOKIE['category']))
    $_SESSION['category']=$_COOKIE['category'];

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(in_array($_POST['product_id'], $item_array_id))
        {
            echo "<script>alert('Product is already added in the cart..!')</script>";
        }
        else
        {
            $count = count($_SESSION['cart']);
            $item_array = array('product_id' => $_POST['product_id']);
            array_push($_SESSION['cart'],$item_array);
        }

    }
    else{
        $item_array = array('product_id' => $_POST['product_id']);
        $_SESSION['cart'][0] = $item_array;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="istyle.css">
</head>

<body>

<?php require_once('header.php'); ?>
<br>
<div class="cards">
	<?php
		$result = $database->getData($_SESSION['category']);
		while ($row = mysqli_fetch_assoc($result)){
			item_component($row['product_name'],$row['product_image'],$row['product_price'],$row['id']);
		}
	?>
</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/6a04987930.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script type="text/javascript">
 
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
        //to force login
        <?php if(isset($_SESSION['username'])): ?>
            return;
        <?php else: ?>
            $('.add').click(function () {alert('Sign in to add to cart');return false;});
        <?php endif ?>  
    });
</script>

</body>
</html>