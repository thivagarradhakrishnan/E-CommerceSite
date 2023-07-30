<header>
<nav class="navbar navbar-expand-lg navbar-light sticky" style="background-color:#2288cc">
        <div class="container-fluid">

            <?php if(isset($_SESSION['category'])){
                echo "<a class='navbar-brand brand' href='http://localhost/cart/product.php'><i class='fas fa-arrow-left'></i></a>";
            }
            else{
                echo "<a class='navbar-brand brand' href='http://localhost/cart/index.php'><i class='fas fa-arrow-left'></i></a>";
            } 
            ?>
            <a class="navbar-brand" aria-current="page" href="http://localhost/cart/index.php" style='color:white'><h4>Home</h4></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><h4>Home</h4></a>
                    </li>                     -->
                </ul>
                    <!-- <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form> -->

            <!-- cart signin -->

                    <button id="cart-btn" class="cart-btn"> 
                        <i class="fas fa-shopping-cart"></i>
                        <?php

                            if (isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<span id='cart_count' class='text-warning bg-light'>$count</span>";
                            }else{
                                echo "<span id='cart_count' class='text-warning bg-light'>0</span>";
                            }

                        ?>                
                    </button>
                    
                    <button id="user" class="user"><i class="fas fa-user"></i></button> 
                    <div>           
                        <ul id="acc" class="dropdown-menu acc">
                            <?php 
                            if(isset($_SESSION['username'])?$_SESSION['username']:isset($_COOKIE['username'])): ?>
                                <li class='dropdown-item'>
                                <?php echo $_COOKIE['username']; ?>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="http://localhost/cart/orders.php">My Orders</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="http://localhost/cart/index.php?logout=1">Log out</a>
                                </li>
                            <?php else: ?>
                                <li class='dropdown-item'><a class='dropdown-item' onclick="document.getElementById('acc').style.display='none';document.getElementById('signin').style.display='block';">Sign in</a></li>
                                <li class='dropdown-item'><a class='dropdown-item' onclick="document.getElementById('acc').style.display='none';document.getElementById('login').style.display='block';">Log in</a></li>
                            <?php endif ?>
                        </ul>
                    </div>              
           </div>
        </div>
    </nav>

    <div class="sign" id='login'>
    <div class="form">
        <form action="http://localhost/cart/server.php" method="post">         
            <div>       
                <br><br>
                <h2 style="text-align:center;font-family: 'Times New Roman', Times, serif;font-weight: bold;">Log in to Your Account</h2><br><br>
                <input type="text" id="username" name="username" placeholder="Enter user name" class="input" ><br><br>                   
            
                <input type="password" id="pwd" name="pwd" placeholder="Enter password" class="input" ><br><br>
                
                <button type="submit" name="log_user" class="but">Log in</button>                   
                
                <p style="text-align:center;font-size:20px;">don't have an account? click <a class="a" onclick="document.getElementById('login').style.display='none';document.getElementById('signin').style.display='block'">here</a> to sign in.</p><br><br>
            </div>                         
        </form> 
    </div>
</div>

<div class="sign" id="signin">
    <div class="form">
        <form action="http://localhost/cart/server.php" method="post">          
            <div>
                <br><br>
                <h2 style="text-align:center;font-family: 'Times New Roman', Times, serif;font-weight: bold;">Create Your Account</h2><br>
                <input type="text"  name="username" placeholder="Enter user name" class="input" ><br><br>                  
                <input type="email"  name="mail" placeholder="Enter email id" class="input" ><br><br>
                <input type="tel"  name="number" placeholder="Enter mobile number" class="input" ><br><br>
                <input type="password"  name="pwd1" placeholder="Enter password" class="input" ><br><br>
               
                <input type="password"  name="pwd2" placeholder="Confirm password" class="input" ><br><br>
                <button type="submit" name="reg_user" class="but">Create</button><br><br>
                <p style="text-align:center;font-size:20px;">already have an account? click <a class="a" onclick="document.getElementById('signin').style.display='none';document.getElementById('login').style.display='block'">here</a> to Log in.</p><br>
            </div>               
        </form> 
    </div>
</div>

</header>