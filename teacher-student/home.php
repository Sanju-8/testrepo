<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("connection.php");
if(!isset($_SESSION['Tid'])){
    header("location:login-des.php");
}else{
    $department=$_SESSION['department'];
    $Tid=$_SESSION['Tid'];
    $sql="select name from teacherDetails where Tid=$Tid";
    $res=$con->query($sql);
        $row=$res->fetch_assoc();
        $name=$row['name'];
?>
<html>
    <head>
        <title>home page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="home-page">
            <div class="profile">
                name: <?php echo $name; ?>
                department: <?php echo $department; ?>
                Tid:<?php echo $Tid; ?>
            </div>
            <a href="add-studentDetails-des.php">add student details</a>
            <br>
            <a href="addmark-des.php">add mark</a>


            <br>
            <br>
            <a href="logout.php">logout</a>
        </div>
    </body>
</html>
<?php
}
?>