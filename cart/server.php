<?php
session_start();
  function validate($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }

  //Registration
if(isset($_POST['reg_user'])){
	$error=array();
	if(empty($_POST['username'])){
		array_push($error,"Name is required");
	}
	if(empty($_POST['pwd1'])){
		array_push($error,"password is required");
	}
	if(empty($_POST['pwd2'])){
		array_push($error,"confirm password is required");
	}
	if(empty($_POST['number'])){
		array_push($error,"number is required");
	}
	if(empty($error)){
		$username=validate($_POST['username']);
		$pwd1=validate($_POST['pwd1']);
		$pwd2=validate($_POST['pwd2']);
		$number=validate($_POST['number']);
		
		$db= mysqli_connect('localhost','root','','cart');
		
		$user_check="SELECT * FROM registration where user_name='$username' LIMIT 1" ;
		$result=mysqli_query($db,$user_check);
		$user=mysqli_fetch_assoc($result);
		
		if($pwd1===$pwd2){
			$pwd=md5($pwd1);
			if($user){
				if($user['user_name']===$username){
					echo "username already exist";
				}
			}
			else{
				$sql="INSERT INTO registration(user_name,number,password) values('$username',$number,'$pwd')";
				if($db->query($sql)){
					$_SESSION['username']=$username;
					setcookie('username',$username,time()+(60*60*24),'/');
					$_SESSION['success']="You are now logged in";
					header('location:'.$_SERVER['HTTP_REFERER']);
					exit();
				}
				else{
					echo "Error:".$sql." ".$db->error;
				}
			}
		}
		else{
			echo "Entered passwords doesn't match";
		}		
	}else{
		foreach ($error as $err => $value) {
			echo $value."<br>";
		}
		unset($error);	
	}
}

//Login
if(isset($_POST['log_user'])){
	$error=array();
	if(empty($_POST['username'])){
		array_push($error,"Name is required");
	}
	if(empty($_POST['pwd'])){
		array_push($error,"Password is required");
	}
	if(empty($error)){
		$username=validate($_POST['username']);
		$pswd=validate($_POST['pwd']);

		$db=mysqli_connect('localhost','root','','cart');
		$epwd=md5($pswd);
		$sql="SELECT * FROM registration where user_name='$username' and password='$epwd'";
		$result=mysqli_query($db,$sql);
		$user=mysqli_fetch_assoc($result);
		if($user['user_name']===$username){
				$_SESSION['username']=$username;
				setcookie('username',$username,time()+(60*60*24),'/');
				$_SESSION['success']="Logged in successfully";
				header('location:'.$_SERVER['HTTP_REFERER']);
				exit();
		}
		else{
			echo "Enter valid username and password";
		}
	}else{
		foreach ($error as $err => $value) {
			echo $value."<br>";
		}
		unset($error);
	}
}
?>