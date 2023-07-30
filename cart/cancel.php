<?php

if(isset($_POST['cancel'])){

    $db= new mysqli('localhost','root','','cart');
    foreach($_POST['cancel'] as $id){
        $sql="DELETE FROM orders WHERE user_name='$_COOKIE[username]' AND id='$id' ";
        $result=$db->query($sql);
        if(!$result){
         die( "Error:".$sql." ".$db->error );
        }
    } 
    header("location:orders.php");
} else {
    header("location:".$_SERVER['HTTP_REFERER']);
}

?>