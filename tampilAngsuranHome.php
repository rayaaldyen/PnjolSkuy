<!DOCTYPE html>
<head>
<title>Detil Angsuran</title>
<style>
@import 
url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap');

body {
  background-color: #FAF5E4;
  margin: 0px 0px;
  padding: 0px;
}
h1{
    font-family: 'Poppins';
  color: rgba(78, 148, 79, 1);
  margin:auto;
  text-align: center;
  margin-top: 20px;
  font-size: 50px;
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
.angsuran{
    background-color: #B4E197;
    width: 800px;
    height: auto;
    margin: auto;
    text-align: center;
    font-family: 'Poppins';
    border-radius: 20px;
    text-align: justify;
    padding:10px;
}
p{
    margin-left: 15px;
    margin-top: 15px;
    margin-bottom: 15px;
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

.hire-btn {
    border: none;
    background: #4E944F;
    border-radius: 15px;
    font-weight: 700;
    width: 138px;
    height: 45px;
    margin-top: 15px;
    margin-left: 700px;
    color:white;
    font-family: 'Poppins';
    font-weight: 700px;
}

button:active {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
button:hover{
    background-color:brown;
    color:white
}

.active {
    font-weight: bold;
    color: #2d2a2a;}

</style>
</head>
<tbody>
 
  <section>
  
        <nav>
            
            <a href="mainPage.php" class="logo">PinjolSkuy</a>
           
        </nav>
        <h1>Detil Angsuran</h1>
  <div class="angsuran">
  
<?php 
session_start();

include("connection.php");
include("functions.php");

$obj=new pinjol();
$user_data = $obj->check_login($con);
$user_pinjam = $obj->check_pinjaman($con);

$id_pinjaman = $user_pinjam['id_pinjaman'];

$quer = "SELECT *FROM pinjaman WHERE id_pinjaman = '$id_pinjaman' LIMIT 1";

$query= mysqli_query($con, $quer);
$Condition = True;

while ($row = mysqli_fetch_array($query)){
    include("pinjaman.php");
    $tampilkan= new pinjaman();
    $result = $tampilkan->tampil($row['nominalStat'], $row['tenor']);
    
            
        }
            ?>
            </div>
        <div class="main">
            <a href="mainPage.php"><button href="mainPage.php" class="hire-btn">Back</button></a>
        </div>
</section>
</tbody>
</html>