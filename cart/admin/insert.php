<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>New Product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#catname").change(function () {
                var Category = $("#catname").val();
                $.ajax({
                    type: "POST",
                    url: 'categCheck.php', 
                    data: { category: Category },
                    success: function (data) {
                        $("#dem").html(data);
                    }
                });
            }); 
        });
    </script>
</head>
<body>       
    <div id="signin">
        <form action="server.php" method="post">          
            <div class="main">
                <br>
                <h1 style="text-align:center;">FILL PRODUCT DETAILS</h1><br><br>
                <input type="text" list="catnames" id="catname" name="catname" placeholder="Enter Category name" required><br><br>  
                <datalist id="catnames">
                <?php 
                    $db= new mysqli('localhost','root','','cart');
                    $sql="SELECT product_name FROM index_table";
                    $result=$db->query($sql);
                    if($result){
                        while($row=$result->fetch_assoc()){
                            echo "<option>$row[product_name]</option>";
                        }
                    }
                ?>
                </datalist> 
                <div id="dem"><br><br></div>    
            </div>                         
        </form>  
    </div>
</body>
</html>