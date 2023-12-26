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
        <title>add student details</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </head>
    <body>
        <div class="home-page">
            <div class="navbar">
                <div class="head-container">
                    <ul>
                        <!-- <li><a href="#">Login</a></li> -->
                        <!-- <li><a href="register-des.php">SignUp</a></li> -->
                        <li><a href="add-studentDetails-des.php">Register student</a></li>
                        <li><a href="addmark-des.php">Add Mark</a></li>
                    </ul>
                    <div class="profile">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="26" width="24" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>
                        </div>
                        <div class="name">
                            <?php echo $name; ?>
                        </div>
                    </div>
                </div>
            </div>

            <form action="" method="post" id="enroll">
               rollno: <input type="number" name="rollno" id="rollno" oninput="checkRollno()"><br>
               <div class="error" id="rollError"></div>
               name: <input type="text" name="name" id="name"><br>
               contact number: <input type="text" name="contactnum" id="contactnum" oninput="phnValidate()"><br>
               <div class="error" id="enrollphn"></div>
                <button type="button" onclick="enroll()">submit</button>
            </form>
        </div>
        <script src="script.js"></script>
    </body>
</html>
<?php
}
?>
    
