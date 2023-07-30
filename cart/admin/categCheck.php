<?php

    $category = $_POST["category"]; 
    $db= new mysqli('localhost','root','','cart');
    $sql="SELECT product_name FROM index_table";
    $result=$db->query($sql);
    if($result){
        while($row=$result->fetch_assoc())
        $categ[]=$row; 
        $col=array_column($categ,'product_name');
        if(!in_array($category,$col) && $category!=""){     
            echo '<input type="text" id="cat_img" name="cat_img" placeholder="Enter category image url" required><br><br>
            <button type="submit" name="insCat">Submit</button><br><br>'; 
        }              
        if(in_array($category,$col) && $category!=""){     
            echo " <input type='text' id='pdtname' name='pdtname' placeholder='Enter product name' required><br><br>                   
                    <input type='text' id='pdt_img' name='pdt_img' placeholder='Enter product image url' required><br><br>                               
                    <input type='text' id='pdt_price' name='pdt_price' placeholder='Enter Product price' required><br><br>
                    <button type='submit' name='ins'>Submit</button><br><br> ";
        }              
    } 
    else{
        echo "Error:".$sql." ".$db->error;
    }


?>