<?php
if(isset($_POST['log_admin'])){	
    $username=$_POST['username'];
    $pwd=$_POST['pwd'];
	
    $db=mysqli_connect('localhost','root','','cart');

		$sql="SELECT * FROM admin where name='$username' and password='$pwd'";
		$result=mysqli_query($db,$sql);
		$user=mysqli_fetch_assoc($result);
		if($user){
				$_SESSION['adminname']=$username;
                echo "hi";
				header('location:Main.html');
				exit();
		}
		else{
			echo "Enter valid username and password";
		}
}