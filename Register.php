<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $name=$_POST["name"];
    $gender=$_POST["gender"];
    $dob=$_POST["dob"];
    $userid=$_POST["unique-id"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    if($password==$cpassword){
        //
        $hash=password_hash($password,PASSWORD_BCRYPT);
        $sql="INSERT INTO `userinfo` (`Name`, `Gender`, `DOB`, `UserId` ,`password`) VALUES ('$name', '$gender', '$dob', '$userid', '$hash');";
        $res=mysqli_query($conn,$sql);
        if($res)
        echo "Data inserted successfully into the database";
        else
        echo "Error occurred!!!while entering data into the database";
    }
    else
    echo "Password didn't matched!!!";

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/Blogify/Register.php" method="post">
        <input type="text" name="name" placeholder="Enter Name"><br>
        <select name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">other</option>
        </select>
        <input type="date" name="dob"><br>
        <input type="text" name="unique-id" placeholder="Enter Unique Id"><br>
        <input type="password" name="password" placeholder="Enter password"><br>
        <input type="password" name="cpassword" placeholder="Enter password again"><br>
        <input type="submit" value="Login"><br>
        <a href="">Forgot Password</a><br>
        <a href="login.html">Login</a>
    </form>
</body>

</html>