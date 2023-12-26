<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    session_start();
    include("connection.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="select * from teacherDetails where email='$username' and password='$password'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            $_SESSION['Tid']=$row['Tid'];
            $_SESSION['department']=$row['department'];
            $_SESSION['batch']=$row['batch'];
            echo "1";
        }else{
            echo "0";
        }
    }
?>
