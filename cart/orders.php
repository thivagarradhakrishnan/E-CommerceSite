<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6a04987930.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="order.css">
<style>
    table ,tr,th,td{
    padding:15px;
    border: 1px solid black;
    text-align:center;
}
.butn{
    padding:10px;
    color:white;
    font-size:17px;
    border-radius: 30px;
}
</style>
</head>
<body>
<?php
require_once("header.php");
?>
<br>
<h1 style="text-align:center">Your Orders</h1><br>

<?php
$db= new mysqli('localhost','root','','cart');
$sql="SELECT * FROM orders WHERE user_name='$_COOKIE[username]'";
$result=$db->query($sql);
if($result){
    echo " <table  style='margin-top:9%;padding:5px;margin:auto;'>
            <tr>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Cancel Orders</th>
            </tr> ";
    echo "<form action='cancel.php' method='post'>";
    while( $row = $result->fetch_assoc()){
        echo "<tr>
                    <td>$row[product_name]</td>
                    <td>$row[qty]</td>
                    <td><input type='checkbox' name='cancel[]' value='$row[id]'></td>
               </tr>";
    }
    echo "<tr><td></td><td></td><td><button class='btn-danger butn' type='submit'>Cancel Selected</button>
    </form></td></tr>
    </table>";
}
else{
    echo "Error:".$sql." ".$db->error;
}	
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $('#user').click(function(){
                $('#acc').toggle();
            });
            $('#cart-btn').click(function(){
                <?php if(isset($_SESSION['username'])||isset($_COOKIE['username'])): ?>
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
