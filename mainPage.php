<?php 
session_start();

	include("connection.php");
	include("functions.php");

    $obj=new pinjol();
	$user_data = $obj->check_login($con);
    $user_pinjam = $obj->check_pinjaman($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PinjolSkuy</title>
    <link rel="stylesheet" type="text/css" href="css/mainPage.css" />
</head>
<body>
    <nav>
        <!--logo-->
        <a href="mainPage.php" class="logo">PinjolSkuy</a>
        <div class="logout">
        <a href="logout.php">Logout</a>
        </div>
        <!--menu-->
        <ul>
                <li>
                    <a href="#" class="active"></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    
                </li>
            </ul>
    </nav>
	<div class="text-container">
            <p>Hallo, Selamat Datang! <?php echo $user_data['nama_peminjam'] ?></p>
            <p>Pinjaman Online<br></p>
            <p>Tanpa Ribet <br></p>
            <p>Sisa Angsuran: <?php echo $user_pinjam['sisaAngsuran'] ?></p>
            
            <a href="pinjam.php"><button href="pinjam.php" class="hire-btn">Pinjam</button></a>
            <a href="bayarPinjaman.php"><button href="bayarPinjaman.php" value="Pinjam" class="hire-btn">Bayar Angsuran</button></a>

            
        </div>
        <img src="images/fotohp.png" class="phone" alt="phone">
</body>
</html>