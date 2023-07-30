<?php

function component($productname,$productimg){
    $element = "
    <form method='post' action='product.php'>
    <div class='col'>
        <div class='card' style='box-shadow: 15px 20px 20px rgba(0, 0, 0, 0.3);
        border-radius: 5px;'>
            <img src='$productimg' class='card-img-top' >
            <div class='card-body'>
                <h5 class='card-title' style='text-align:center;'>
                    $productname
                </h5>
                <div class='card-text'>
                        <input type='hidden' name='category' value='$productname'>               
                        <button type='submit' class='btn btn-primary d-grid mx-auto view' style='border-radius:20px;'>View</button>   
                </div>                   
            </div>
        </div>
    </div>
    </form>
    ";
    echo $element;
}

function item_component($productname,$productimg,$price,$productid){
    $element = "<a href='details/$productname.php?pid=$productid' class='cardlink'>
    <div class='card'>
    <form method='post'>
        <div class='image'>
            <img src='$productimg' width='400' height='170'>
        </div>
        <div class='info'>
            <div class='title'>
                <h2>$productname</h2>
                <p>Grab the brand new $productname ,offer closes soon.</p>
            </div>
            <div class='price'>
                <h4><p style='font-family: Times New Roman, Times, serif;'>PRICE : ₹$price</p></h4>
            </div>
            <input type='hidden' name='product_id' value='$productid'>
        </div>
        <div class='btn'>
            <button name='add' class='add' style='background-color:#2288cc'>ADD TO CART</button>
        </div>
        </form>
    </div></a>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid,$i){
    $element = "    
        <div class='border rounded'>
            <div class='row bg-white'>
                <div class='col-md-3 pl-0'>
                    <img src='$productimg' alt='Image1' class='img-fluid'>
                </div>
                <div class='col-md-6'>
                    <h5 class='pt-2 pdt_name'>$productname</h5>
                    <input type='hidden' value='$productname' name='pdt${i}_name'>
                    <small class='text-secondary'>Seller: cart</small>
                    <h5 class='pt-2 price'>₹$productprice</h5>
                    <button type='submit' class='btn btn-danger mx-2' name='remove$i' formaction='cart.php?action=remove&id=$productid'>Remove</button>
                </div>
                <div class='col-md-3 py-5'>
                    <div class='button-container'>
                        <button type='button' class='btn bg-light border rounded-circle cart-qty-minus'><i class='fas fa-minus'></i></button>
                        <input type='text' value='1'  name='qty$i' class='form-control w-25 d-inline qty'>
                        <button type='button' class='btn bg-light border rounded-circle cart-qty-plus'><i class='fas fa-plus'></i></button>
                    </div>
                </div>
            </div>
        </div>";
    echo  $element;
}