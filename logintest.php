<html>
<body>
<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="etu_cor";
$conn=new mysqli($servername,$username,$password,$dbname);
if (!$conn)
{
die('Could not connect: ' . mysql_error());
}
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$pwd=$_POST['password'];
$sql="select * from register WHERE username = '$uname' and password = '$pwd'";
$result=$conn->query($sql);
$error="Either username or password is incorrect";
if(mysqli_num_rows($result)==1)
{
$_SESSION['username'] = $uname;
header('Location:hi.html');
}
else
{
$_SESSION['student-login-error'] = $error;
header('Location:login.html');
}
}
$conn->close();
?>
</body>
</html>
