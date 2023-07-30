<!DOCTYPE html>
<html lang="en">
<head>
<style>
    table ,tr,th,td{
    padding:15px;
    border: 1px solid black;
}
body{
    background-image: linear-gradient(90deg, #ffffff 0%, #adf2fe 100%);
}
</style>
</head>
<body>
<table  style='margin-top:9%;padding:5px;margin:auto;'>
<tr>
    <th>User Name</th>
    <th>Order id</th>
    <th>Product name</th>
    <th>Quantity</th>
</tr>
<?php
$db= new mysqli('localhost','root','','cart');
$sql="SELECT * FROM orders";
$result=$db->query($sql);
if($result){
    while( $row = $result->fetch_assoc()){
        echo "<tr>
                    <td>$row[user_name]</td>
                    <td>$row[id]</td>
                    <td>$row[product_name]</td>
                    <td>$row[qty]</td>
               </tr>";
    }
}
else{
    echo "Error:".$sql." ".$db->error;
}	
?>
</table>

</body>
</html>
