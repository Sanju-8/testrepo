<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    session_start();
    include("connection.php");
    

    $password=$_POST['password'];
echo $password;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name=$_POST['name'];
    $department=$_POST['department'];
    $batch=$_POST['batch'];
    $phnNum=$_POST['phnNum'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="insert into teacherDetails(name,department,batch,phnNum,email,password) values('$name','$department','$batch',$phnNum,'$email','$password')";
    if($con->query($sql)){
        echo "inserted";
    }else{
        echo "error in insertion";
    }
}




?>