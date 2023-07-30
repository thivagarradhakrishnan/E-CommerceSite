<?php

if(isset($_POST['ins'])){	
    $pdtname=$_POST['pdtname'];
    $pdt_img=$_POST['pdt_img'];
    $pdt_price=$_POST['pdt_price'];
    $categ=$_POST['catname'];

	$db= new mysqli('localhost','root','','cart');
	
    $sql="INSERT INTO product_table(product_name,product_image,product_price,category) values('$pdtname','$pdt_img','$pdt_price','$categ')";
    if($db->query($sql)){
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }
    else{
        echo "Error:".$sql." ".$db->error;
    }		
}

if(isset($_POST['insCat'])){	
    $catname=$_POST['catname'];
    $cat_img=$_POST['cat_img'];

	$db= new mysqli('localhost','root','','cart');
	
    $sql="INSERT INTO index_table(product_name,product_image) values('$catname','$cat_img')";
    if($db->query($sql)){
        header('location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }
    else{
        echo "Error:".$sql." ".$db->error;
    }		
}

?>