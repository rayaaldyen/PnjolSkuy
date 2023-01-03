<?php 

session_start();

	include("connection.php");
	include("functions.php");
	include("login.php");




		//something was posted
		$user_name = $_POST['user_name']??'';
		$password = $_POST['password']??'';
		$objLogin = new Login();
		$loginEntry=$objLogin->login($user_name,$password,$_SERVER['REQUEST_METHOD']);
		if($loginEntry){
			header("Location: mainPage.php");
		}
	
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	@import 
url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap');
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
        size: "50";
	}

	#button{

		padding: 10px;
		width: 100px;
    	height: 45px;
		color: #FAF5E4;
		background-color: #4E944F;
		border-radius: 15px;
		border: none;
		font-family: 'Poppins';
		left: 32%;
		position:relative;
		top : 0px;
		font-weight: 650;
	}

	#box{

		background-color: #B4E197;
		margin: auto;
		width: 300px;
		padding: 20px;
        top: 197px;
        left: 50%;
        transform: translate(0, 15%);
        border-radius: 20px;
		height: 300px;
	}

    nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    background-color: #83BD75;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2);
    padding: 0px 5%;
}

nav ul {
    display: flex;
}

nav ul li a {
    margin: 30px;
    font-family: 'Poppins';
    color: white;
    font-size: 18px;
    font-weight: 700;
}

.logo {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 40px;
    line-height: 60px;
    text-decoration: none;
    color: #125B50;
}
    body {
    background-color: #FAF5E4;
    margin: 0px;
    padding: 0px;
    }
	.hire-btn {
    border: none;
    background: #4E944F;
    border-radius: 15px;
    font-weight: 700;
    width: 100px;
    height: 45px;
position: relative;
color:#FAF5E4;
top: 0px;
left: 32%;
}

	</style>

    <nav>
            <!--logo-->
            <a href="index.php" class="logo">PinjolSkuy</a>
            <!--menu-->
        </nav>

	<div id="box">
		
		<form method="post">
			<div style="font-family: 'Poppins';font-size: 40px;margin: 10px;color: #4E944F; left : 30%; position:relative;">Login</div>

			<input id="text" type="text" name="user_name" placeholder="Username" required/><br><br>
			<input id="text" type="password" name="password" placeholder="Password" required/><br><br>

			<input id="button" type="submit" value="Login"><br><br>
			
		</form>
		<a href="signup.php"><button href="signup.php" class="hire-btn">Click to SignUp</button></a>
	</div>
</body>
</html>