<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

    include("connection.php");
    session_start();

    if(isset($_POST['enroll'])){
        $name=$_POST['name'];
        $rollno=$_POST['rollno'];
        $contact=$_POST['contact'];
        $Tid=$_SESSION['Tid'];
        $department=$_SESSION['department'];
        $batch=$_SESSION['batch'];
        $sql="insert into studentDetails(Tid,rollNo,name,department,batch,contactNum) values($Tid,$rollno,'$name','$department','$batch',$contact)";
        if($con->query($sql)){
            echo "insertedd";
        }
        else{
            echo "not inserted";
        }
    }

    if(isset($_POST['action'])){
        $rollno=$_POST['roll'];
        $Tid=$_SESSION['Tid'];
        $sql="select * from studentDetails where Tid=$Tid and rollNo=$rollno";
        $res=$con->query($sql);
        if($res->num_rows>0){
            echo 1;
        }else{
            echo 0;
        }
    }
?>
