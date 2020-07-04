<?php
$username = $_POST['username'];
$password = $_POST['password'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$con=mysqli_connect("localhost", "root", "", "login");
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
mysqli_select_db($con, 'login');
$result = mysqli_query($con, "select * from users where username = '$username' and password = '$password'") or die (mysqli_error($con));
$row = mysqli_fetch_array($result);
if (($row['username'] == $username) && ($row['password'] == $password)) {
    echo "Login success!!! Welcome " .$row['username'];
}
else {
    echo "Failed to login.";
}
?>