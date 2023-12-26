<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    $username="sanju";
    $password="yatnam123";
    $server="localhost";
    $db="classroom"   ;
    $con=new mysqli($server,$username,$password,$db);
    // if($con->connect_error){
    //     echo "failed";
    // }else{
    //     echo "success<br>";
    // }
    // $sql="create database classroom";
    // if($con->query($sql)){
    //     echo "data  base created";
    // }else{
    //     echo "database not created";
    // }


    // $sql="create table teacherDetails(Tid int AUTO_INCREMENT PRIMARY KEY,name varchar(25),department varchar(25),batch varchar(25),phnNum int,email varchar(25),password varchar(25))";
    // if($con->query($sql)){
    //     echo "table created";
    // }else{
    //     echo "not created";
    // }

    // $sql="create table studentDetails(Sid int AUTO_INCREMENT PRIMARY KEY,Tid int,rollNo int,name varchar(25),department varchar(25),batch varchar(25),contactNum int,FOREIGN KEY (Tid) REFERENCES teacherDetails(Tid))";
    // if($con->query($sql)){
    //     echo "table created";
    // }else{
    //     echo "not created";
    // }

    // $sql="create table marks(id int AUTO_INCREMENT PRIMARY KEY,Sid int,Tid int,english int,maths int,science int,FOREIGN KEY (Tid) REFERENCES teacherDetails(Tid),FOREIGN KEY (Sid) REFERENCES studentDetails (Sid))";
    // if($con->query($sql)){
    //     echo "table created";
    // }else{
    //     echo "not created";
    // }

?>
