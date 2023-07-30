<?php

if(isset($_POST['rem'])){
    $db= new mysqli('localhost','root','','cart');
    foreach($_POST['rem'] as $id){
        $sql="DELETE FROM product_table WHERE id='$id' ";
        $result=$db->query($sql);
        if(!$result){
         die( "Error:".$sql." ".$db->error );
        }
    } 
    header("location:display.php");
} else {
    header("location:".$_SERVER['HTTP_REFERER']);
}

?>