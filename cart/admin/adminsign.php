<?php
if(isset($_POST['reg_admin'])){	
    $username=$_POST['username'];
    $pwd=$_POST['pwd'];
	
    $db=mysqli_connect('localhost','root','','cart');

		$sql="INSERT INTO admin VALUES('$username','$pwd')";
		$result=mysqli_query($db,$sql);
		if($result){
				$_SESSION['adminname']=$username;
				header('location:Main.html');
				exit();
		}
		else{
			echo "Enter valid username and password";
		}
}