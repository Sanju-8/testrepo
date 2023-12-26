var phnId=0;
function validatePhn(){
    var phn=document.getElementById('phnNum').value;

    if(phn.length == 10){
        phnId=0;
        document.getElementById('errorPhn').innerHTML="";
    }else{
        phnId=1;
        document.getElementById('errorPhn').innerHTML="* mobile number should be 10 digits";
    }
}

function register(){
    var name=document.getElementById('teacherName').value;
    var department=document.getElementById('department').value;
    var batch=document.getElementById('batch').value;
    var phnNum=document.getElementById('phnNum').value;
    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    if((phnId == 0) && name && department && batch && phnNum && email && password){
        $.ajax({
            type:'POST',
            url:'teacher-register.php',
            data:{
                name:name,
                department:department,
                batch:batch,
                phnNum:phnNum,
                email:email,
                password:password
            },
            success:function(response){
                alert("inserted");
                document.getElementById("register").reset();
            },
            error:function(response){
                alert("error!!");
            }
        });
    }else{;
        document.getElementById('errorMsg').innerHTML="* Fill all fields!!!";
    }
}

function login(){
    var username=document.getElementById('username').value;
    var password=document.getElementById('password').value;
    if(password && username){
        $.ajax({
            type:'POST',
            url:'login.php',
            data:{
                username:username,
                password:password
            },
            success:function(response){
                if(response == 1){
                    window.location.href="add-studentDetails-des.php";
                }else{
                    document.getElementById('errorLogin').innerHTML="* wrong password or username!!";
                }
            },
            error:function(response){
                alert("error!!");
            }
        });
    }else{
        document.getElementById('errorLogin').innerHTML="* wrong password or username!!!!";
    }
}

var rollCheck=0;

function checkRollno(){
    var roll=document.getElementById('rollno').value;
    $.ajax({
        type:'POST',
        url:'add-studentDetails.php',
        data:{
            action:'checkroll',
            roll:roll
        },
        success:function(response){
            if(response == 1){
                document.getElementById('rollError').innerHTML="* roll number already exists!!";
                rollCheck=1;
            }else if(response == 0){
                document.getElementById('rollError').innerHTML="";
                rollCheck=0;
            }
        },
        error:function(response){
            alert("error!!");
        }
    });
}

var enrollphn=0;
function phnValidate(){
    var phnNum=document.getElementById('contactnum').value;
    if(phnNum.length == 10){
        enrollphn=0;
        document.getElementById('enrollphn').innerHTML="";
    }else{
        enrollphn=1;
        document.getElementById('enrollphn').innerHTML="* mobile number should be 10 digits";
    }
}
function enroll(){
    var rollno=document.getElementById('rollno').value;
    var name=document.getElementById('name').value;
    var contact=document.getElementById('contactnum').value;
    if((rollCheck == 0) && (enrollphn == 0)){
            $.ajax({
                type:'POST',
                url:'add-studentDetails.php',
                data:{
                    enroll:'enroll',
                    rollno:rollno,
                    name:name,
                    contact:contact
                },
                success:function(response){
                    alert("inserted");
                    document.getElementById("enroll").reset();
                },
                error:function(){
                    alert("error");
                }
            });
    }
}




function showPass(s){
    let pass=s.previousElementSibling;
    
      if(pass.type == "password"){
        pass.type="text";
      }else{
        pass.type="password";
      }
    }





$(document).ready(function(){
var pagetitle=document.title;
if(pagetitle === 'add mark'){
    var sort=document.getElementById('sort').value;
    var showmark=document.getElementById('markSort').value;
    var teachername=document.getElementById('selectTeacher').value;

    if(sort == ''){
        table(sort,showmark,teachername);
    }else{
        table(sort,showmark,teachername);
    }

}

});
var marktableData;
function table(sort,showmark,teachername){

    document.getElementById('load-modal').style.display="block";



    $.ajax({
        url: 'addmark.php',
        type: 'GET',
        data:{
            sort:sort,
            showmark:showmark,
            teachername:teachername,
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);

            displayTable(response.details);
            marktableData=response.details;
            var select='<select  name="rollno" id="rollno" oninput="rollnoValidate()">';
            select+='<option selected>Select Roll No</option>'
            $.each(response.rollNo, function (key, value) {
                select+='<option value="'+value.Sid+'">'+value.rollNo+'</option>';

            });
            select+='</select>'





            var selectT = '<select name="selectTeacher" id="selectTeacher" oninput="sortactive()">';
            selectT += '<option value="0" selected>Select Teacher</option>';
            $.each(response.teacherSelect, function (key, value) {
                selectT += '<option value="' + value.Tid + '">' + value.tname + '</option>';
            });
            selectT += '</select>';





            console.log(selectT);
            document.getElementById('selectTeacher').innerHTML=selectT;
            document.getElementById('selectId').innerHTML=select;
            document.getElementById('load-modal').style.display="none";

            
        },
        error:function(data){
            console.log(data.status);
            alert(data.status);
            alert("data");      
        }
    });
}
function sortactive(){
    var sort=document.getElementById('sort').value;
    var showmark=document.getElementById('markSort').value;
    var teachername=document.getElementById('selectTeacher').value;
    alert(teachername);
    table(sort,showmark,teachername);
}
function sortactive2() {
    var selectedValue = document.getElementById('sort').value;
    var options = document.getElementById('sort').options;

    alert(options   );
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === selectedValue) {
            options[i].selected = true;
        } else {
            options[i].selected = false;
        }
    }
}
function displayTable(data) {
    var criteria=document.getElementById('displayField').value;
    if(criteria == 'all'){
        var table = '<table>';
        table += '<tr><th>Student Name</th><th>Roll No</th><th>English</th><th>Maths</th><th>Science</th><th>Teacher Name</th><th></th></tr>';
        for (var i = 0; i < data.length; i++) {
            table += '<tr>';
            table += '<td>' + data[i].stdname + '</td>';
            table += '<td>' + data[i].stdroll + '</td>';
            table += '<td>' + data[i].english + '</td>';
            table += '<td>' + data[i].maths + '</td>';
            table += '<td>' + data[i].science + '</td>';
            table += '<td>' + data[i].teachername + '</td>';
            table += '<td><svg onclick="deleteRow('+i+')" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></td>';
            table += '</tr>';
        }
        var dropdwn='<select name="sort" id="sort" oninput="sortactive()" onchange="sortactive2()">';
        dropdwn+='<option value="stdname">rollno</option>'+
                 '<option value="stdroll">rollno</option>'+
                 '<option value="maths">maths</option>'+
                 '<option value="science">science</option>'+
                 '<option value="english">english</option>';
        dropdwn+='</select>'
    }else if(criteria == 'maths'){
        var table = '<table>';
        table += '<tr><th>Student Name</th><th>Roll No</th><th>Maths</th><th>Teacher Name</th><th></th></tr>';
        for (var i = 0; i < data.length; i++) {
            table += '<tr>';
            table += '<td>' + data[i].stdname + '</td>';
            table += '<td>' + data[i].stdroll + '</td>';
            table += '<td>' + data[i].maths + '</td>';
            table += '<td>' + data[i].teachername + '</td>';
            table += '</tr>';
        }
        var dropdwn='<select name="sort" id="sort" oninput="sortactive()" onchange="sortactive2()">';
        dropdwn+='<option value="stdname">name</option>'+
                 '<option value="stdroll">rollno</option>'+
                 '<option value="maths">maths</option>';
        dropdwn+='</select>'
    }else if(criteria == 'english'){
        var table = '<table>';
        table += '<tr><th>Student Name</th><th>Roll No</th><th>English</th><th>Teacher Name</th><th></th></tr>';
        for (var i = 0; i < data.length; i++) {
            table += '<tr>';
            table += '<td>' + data[i].stdname + '</td>';
            table += '<td>' + data[i].stdroll + '</td>';
            table += '<td>' + data[i].english + '</td>';
            table += '<td>' + data[i].teachername + '</td>';
            table += '</tr>';
        }
        var dropdwn='<select name="sort" id="sort" oninput="sortactive()" onchange="sortactive2()">';
        dropdwn+='<option value="stdname">name</option>'+
                 '<option value="stdroll">rollno</option>'+
                 '<option value="english">english</option>';
        dropdwn+='</select>'
    }else if(criteria == 'science'){
        var table = '<table>';
        table += '<tr><th>Student Name</th><th>Roll No</th><th>Science</th><th>Teacher Name</th><th></th></tr>';
        for (var i = 0; i < data.length; i++) {
            table += '<tr>';
            table += '<td>' + data[i].stdname + '</td>';
            table += '<td>' + data[i].stdroll + '</td>';
            table += '<td>' + data[i].science + '</td>';
            table += '<td>' + data[i].teachername + '</td>';
            table += '</tr>';
        }
        var dropdwn='<select name="sort" id="sort" oninput="sortactive()" onchange="sortactive2()">';
        dropdwn+='<option value="stdname">name</option>'+
                 '<option value="stdroll">rollno</option>'+
                 '<option value="science">science</option>';
        dropdwn+='</select>'
    }


    table += '</table>';

    console.log(dropdwn);
    document.getElementById('dataTable').innerHTML = table;
    document.getElementById('selectField').innerHTML=dropdwn;
}
var indexvalue_deleterow;
function deleteRow(i){
    indexvalue_deleterow=i;
    document.getElementById('delete-modal').style.display="block";
}
function cancelDelete(){
    document.getElementById('delete-modal').style.display="none";
}
function deleteConfirm(){
    document.getElementById('delete-modal').style.display="none";
    var deleteid=marktableData[indexvalue_deleterow].studentid;
    $.ajax({
        type:'POST',
        url:'addmark.php',
        data:{
            delete:'deleterow',
            deleteid:deleteid
        },
        success:function(response){
            var sort=document.getElementById('sort').value;
            var showmark=document.getElementById('markSort').value;
            var teachername=document.getElementById('selectTeacher').value;
            table(sort,showmark,teachername);
        },
        error:function(response){
            alert("error");
        }
    })
}





function test(){
    var sort=document.getElementById('sort').value;
    var showmark=document.getElementById('markSort').value;
    var teachername=document.getElementById('selectTeacher').value;
    alert(showmark);

}

var checkpage=1;
function rollnoValidate(){
    var rollno=document.getElementById('rollno').value;
    $.ajax({
        type:'POST',
        url:'addmark.php',
        data:{
            rollValidate:'rollValidate',
            rollno:rollno
        },
        dataType: 'json',
        success:function(response){
            console.log(response);
            check=response.status;
            Sname=response.Sname;
            Tname=response.Tname;

            if(check == 1){
                document.getElementById('rollValidate').innerHTML="* roll number already exists!!";
                document.getElementById('stdNameHere').innerHTML="";
                document.getElementById('teacherNameHere').innerHTML="";
                checkpage=1;
            }else if(check == 0){
                document.getElementById('rollValidate').innerHTML="";
                checkpage=0;
                document.getElementById('stdNameHere').innerHTML="Student name:"+Sname;
                document.getElementById('teacherNameHere').innerHTML="Teacher's Name:"+Tname;
            }
        },
        error:function(response){
            console.log(response.Sname);
        }
    });
}


function enterMark(){
    var rollno=document.getElementById('rollno').value;
    var maths=document.getElementById('maths').value;
    var english=document.getElementById('english').value;
    var science=document.getElementById('science').value;

    if((checkpage == 0) && maths && english && science){
        $.ajax({
            type:'POST',
            url:'addmark.php',
            data:{
                action:'mark',
                rollno:rollno,
                maths:maths,
                english:english,
                science:science,
            },
            success:function(response){

                var sort=document.getElementById('sort').value;
                var showmark=document.getElementById('markSort').value;
                var teachername=document.getElementById('selectTeacher').value;
                table(sort,showmark,teachername);
                document.getElementById("markForm").reset();
            },
            error:function(response){
                alert("not inserted");
            }
        });
    }else{
        document.getElementById('checkpage').innerHTML="* check the fields!!";
    }
}

