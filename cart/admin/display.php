<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    table ,tr,th,td{
    padding:15px;
    border: 1px solid black;
    border-collapse:collapse;
    text-align:center;
}
body{
    background-image: linear-gradient(90deg, #ffffff 0%, #adf2fe 100%);
    /* background-image:url("https://livetechspot.com/wp-content/uploads/2020/07/Complete-Guide-List-on-How-to-Optimize-E-commerce-Website.jpg");
    background-repeat: no-repeat;
    background-position: center; */
}
button{
    padding:10px;
    color:white;
    font-size:17px;
    border-radius: 30px;
}
</style>
</head>
<body>
    <br>
<table  style='margin-top:9%;padding:5px;margin:auto;'>
<tr>
    <th>Product name</th>
    <th>Price</th>
    <th>Category</th>
    <th></th>
</tr>
<?php
$db= new mysqli('localhost','root','','cart');
$sql="SELECT * FROM product_table";
$result=$db->query($sql);
if($result){
    echo "<form method='post' action='remove.php'>";
    while( $row = $result->fetch_assoc()){
        echo "<tr>
                    <td>$row[product_name]</td>
                    <td>$row[product_price]</td>
                    <td>$row[category]</td>
                    <td><input type='checkbox' name='rem[]' value='$row[id]'></td>
               </tr>";
    }
    echo "<tr><td></td><td></td><td></td><td><button class='btn-danger' type='submit'>Remove Selected</button>
    </form></td></tr>
    ";
}
else{
    echo "Error:".$sql." ".$db->error;
}	
?>
</table>

</body>
</html>
