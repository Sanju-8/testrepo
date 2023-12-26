<?php
    session_start();
    include("connection.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

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
<!DOCTYPE html>
<html>
    <head>
        <title>add mark</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    </head>
    <body>
        <div class="add-mark">
            <div class="load-modal" id="load-modal">
                <div class="loader">
                    <div class="loader-content">
                
                    </div>
                </div>
            </div>

            <div class="delete-modal" id="delete-modal">
                <div class="delete">
                    <div class="content">
                        <div class="head">DELETE THIS ROW?</div>
                        <div class="btn">
                            <button class="one" onclick="cancelDelete()">cancel</button>
                            <button class="two" onclick="deleteConfirm()">ok</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar">
                <div class="head-container">
                    <ul>
                        <li><a href="add-studentDetails-des.php">Register student</a></li>
                        <li><a href="addmark-des.php">Add Mark</a></li>
                    </ul>
                    <div class="profile">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="26" width="24" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>
                        </div>
                        <div class="name">
                            <!-- <?php echo $name; ?> -->
                        </div>
                    </div>
                </div>
            </div>


            <div class="nav-bar">
                <div class="sort">
                    sort by
                    <div class="displayField" id="selectField"></div>
                    <select class=hide id="sort">
                    </select>

                    show:
                    <select name="displayField" id="displayField" oninput="sortactive()">
                        <option value="all" selected>All</option>
                        <option value="english">english</option>
                        <option value="maths">maths</option>
                        <option value="science">science</option>
                    </select>

                    Display mark above:
                    <select name="markSort" id="markSort" oninput="sortactive()">
                        <option value="0" selected>Display All</option>
                        <option value="20">20 marks</option>
                        <option value="40">40 marks</option>
                        <option value="60">60 marks</option>
                    </select>

                    Select Teacher's Name:
                    <div class="selectTeacher" id="selectTeacher"></div>

                    <button onclick="test()">test</button>
                </div>
            </div>

            <div id="dataTable"></div>


            <div class="form">
                <form action="" method="post" id="markForm" >
                    <div class="column-wrap">
                        <div class="column">
                            <div id="selectId"></div>
                            <div class="error" id="rollValidate"></div>
            
                            <div class="text-center">
                                <div class="name" id="stdNameHere"></div>
                                <div class="teacher-name" id="teacherNameHere"></div>
                            </div>
                        </div>
                        <div class="column">
                            <input type="number" name="maths" id="maths" placeholder="maths"><br>
                            <input type="number" name="english" id="english" placeholder="english"><br>
                            <input type="number" name="science" id="science" placeholder="science"><br>
                            <div class="error" id="checkpage"></div>
                        </div>
                    </div>
                    <div class="btn">
                        <button type="button" onclick="enterMark()">enter</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="script.js"></script>
    </body>
</html>
<?php
}
?>
    