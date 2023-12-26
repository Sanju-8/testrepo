<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


    session_start();
    include("connection.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['sort'])) {
            $Tid = $_SESSION['Tid'];
            $sort = $_GET['sort'];
            $marklimit = $_GET['showmark'];
    
            $sql = "SELECT * FROM marks WHERE english > $marklimit and maths > $marklimit and science > $marklimit";
            $res = $con->query($sql);
            $data = array();
    
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $english = $row['english'];
                    $maths = $row['maths'];
                    $science = $row['science'];
                    $Sid = $row['Sid'];
    
                    $sql2 = "SELECT * FROM studentDetails WHERE Sid = $Sid";
                    $result2 = $con->query($sql2);
    
                    if ($result2->num_rows > 0) {
                        $row2 = $result2->fetch_assoc();
                        $stdname = $row2['name'];
                        $stdroll = $row2['rollNo'];
                        $teacherid=$row['Tid'];
                        $studentid=$row['Sid'];
    
                        $sql3="SELECT * FROM teacherDetails WHERE Tid = $teacherid";
                        $result3=$con->query($sql3);
                        if($result3->num_rows > 0){
                            $row3=$result3->fetch_assoc();
                            $teacherName=$row3['name'];
                            $data[] = array(
                                'studentid' => $studentid,
                                'stdname' => $stdname,
                                'stdroll' => $stdroll,
                                'english' => $english,
                                'maths' => $maths,
                                'science' => $science,
                                'teachername' => $teacherName,
                            );
                        }
                    }
                }
            }
    
            $sql4="SELECT * FROM teacherDetails";
            $Tarray=array();
            $result4=$con->query($sql4);
            if($result4->num_rows>0){            
                while($row4 = $result4->fetch_assoc()){
                    $tid=$row4['Tid'];
                    $tname=$row4['name'];

                    $Tarray[]=array(
                        'Tid' => $tid,
                        'tname' => $tname,
                    );
                }
            }

            $roll = "SELECT * FROM studentDetails WHERE Tid = $Tid";
            $rollNo = array();
            $result = $con->query($roll);
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $Sid = $row['Sid'];
                    $rollno = $row['rollNo'];
    
                    $rollNo[] = array(
                        'Sid' => $Sid,
                        'rollNo' => $rollno,
                    );
                }
            }
    
            if (isset($data[0][$sort])) {
                usort($data, function ($a, $b) use ($sort) {
                    return strcasecmp($a[$sort], $b[$sort]);     
                });
            } else {
                // Handle the case where 'sort' is not a valid key
            }
    
            echo json_encode(array("details" => $data, "rollNo" => $rollNo, "status" => $sort, "teacherSelect" => $Tarray));
            $con->close();
        } else {
            echo json_encode(array("error" => "Sort parameter not set"));
        }
    }





    if(($_SERVER['REQUEST_METHOD'] === 'POST') && (isset($_POST['action']))){
        $Sid=$_POST['rollno'];
        $english=$_POST['english'];
        $science=$_POST['science'];
        $maths=$_POST['maths'];
        $Tid=$_SESSION['Tid'];

            $sql2="insert into marks(Sid,Tid,english,maths,science) values($Sid,$Tid,$english,$maths,$science)";
            if($con->query($sql2)){
                echo "inserted";
            }else{
                echo "error";
            }

    }



    if(isset($_POST['rollValidate'])){
        $Sid=$_POST['rollno'];
        $sql="select * from marks where Sid=$Sid";
        $res=$con->query($sql);
        if($res->num_rows>0){
            $Tname="";
            $Sname="";
            echo json_encode(array("Tname" => $Tname,"Sname" => $Sname,"status" => 1));
    }else{
            $S=1;
            $sql="select Tid,name from studentDetails where Sid=$Sid";
            $res=$con->query($sql);
            if($res->num_rows>0){
                $row=$res->fetch_assoc();
                $Sname=$row['name'];
                $Tid=$row['Tid'];
                $sql="select name from teacherDetails where Tid=$Tid";
                $res=$con->query($sql);
                if($res->num_rows>0){
                    $row=$res->fetch_assoc();
                    $Tname=$row['name'];
                }
            }
            echo json_encode(array("Tname" => $Tname,"Sname" => $Sname,"status" => 0));
        }
    }

    if(isset($_POST['delete'])){
        $sid=$_POST['deleteid'];
        $sql="delete from marks where Sid=$sid";
        if($con->query($sql)){
            echo 1;
        }else{
            echo 0;
        }
    }





?>



