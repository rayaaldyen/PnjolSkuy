<?php
class Login{
    public function login($user, $pass,$reqmet){
if($reqmet == "POST")
	{
		include("connection.php");
		//something was posted
		

		if(!empty($user) && !empty($pass) && !is_numeric($user))
		{

			//read from database
			$query = "select * from users where user_name = '$user' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $pass)
					{

						$_SESSION['user_id'] = $user_data['id_peminjam'];
						// header("Location: mainPage.php");
						return True;
						die;
					}
				}
			}
			
			echo "<script type='text/javascript'>alert('wrong username or password!')</script>";
		}else
		{
			echo "<script type='text/javascript'>alert('wrong username or password!')</script>";
		}
	}
}
public function register($reqmet, $post){
	
	if($reqmet == "POST")
	{include("connection.php");
		//something was posted
		$user_name = $post['user_name'];
		$password = $post['password'];
		$nama_usr= $post['nama_peminjam'];
		$tanggal_lahir= $post['tgl_lahir'];
		$Alamat= $post['alamat'];
		$no_HP= $post['no_hp'];
		$user_id = $post['id_peminjam'];
		$indexTenor = 0;

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && is_numeric($user_id))
		{

			//save to database
			$query1 = "insert into users (id_peminjam,user_name,password,nama_peminjam,tgl_lahir,alamat,no_hp) 
			values ('$user_id','$user_name','$password','$nama_usr', '$tanggal_lahir', '$Alamat', '$no_HP')";
			$query2 = "insert into pinjaman (id_peminjam,indexTenor) values ('$user_id','$indexTenor')";

			mysqli_query($con, $query1);
			mysqli_query($con, $query2);

			return True;
			die;
		}else
		{
			echo "Please enter some valid information!";
			return False;
		}
	}
}
public function delData($id){
	include("connection.php");
	$query = "delete from users where id_peminjam = '$id'";
	mysqli_query($con, $query);
}
}
    ?>