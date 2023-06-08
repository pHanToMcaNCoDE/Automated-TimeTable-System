<?php
include '../config.php';
extract($_POST);
if (isset($save)) {
    $que = mysqli_query($con, "select * from subject where subject_name='$subname'");
    $row = mysqli_num_rows($que);
    if ($row) {
        $err = "<p class='err' style=' display: flex;
                    justify-content: space-evenly;
                    align-items: center;
                    text-align: center;
                    z-index: 999;
                    width: 80%;
                    height: 5vh;
                    padding: 10px 2px;
                    align-items: center;
                    background-color: var(--cr2);
                    border: 1px solid var(--cr);
                    border-radius: 6px;
                    font-size: 18px;
                    font-weight: 400;
                    font-family: var(--av), sans-serif;
                    color: var(--cr);'>
                This department already exists</p>";
    } else {
        if(empty($subname) || empty($subid) || empty($lvl) || empty($s) || empty($courseid) || empty($t) || empty($lpw) || empty($type)){
            $err = "<p class='err' style=' display: flex;
                    justify-content: space-evenly;
                    align-items: center;
                    text-align: center;
                    z-index: 999;
                    width: 80%;
                    height: 5vh;
                    padding: 10px 2px;
                    align-items: center;
                    background-color: var(--cr2);
                    border: 1px solid var(--cr);
                    border-radius: 6px;
                    font-size: 18px;
                    font-weight: 400;
                    font-family: var(--av), sans-serif;
                    color: var(--cr);'>
                All fields are required!<p>";
        }else{
        mysqli_query($con, "insert into subject values('$subid','$subname','$lvl','$s','$courseid', '$t', '$lpw', '$type')");

            $err = "<p class='suc' style=' display: flex;
                        justify-content: space-evenly;
                        align-items: center;
                        z-index: 999;
                        width: 90%;
                        padding: 10px 20px;
                        background-color: var(--g);
                        border: 1px solid var(--g2);
                        border-radius: 6px;
                        font-size: 18px;
                        font-weight: 400;
                        font-family: var(--av), sans-serif;
                        color: var(--g2);'>
                    New department added!!!</p>";
        }
    }

}

?>

<script>
function showOpts(str) {
    showSemester(str);
    showTeacher(str);
}

function showSemester(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("semester").innerHTML = xmlhttp.responseText;
        }
    }
    //alert(str);
    xmlhttp.open("GET", "semester_ajax.php?id=" + str, true);
    xmlhttp.send();
}

function showTeacher(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp2 = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp2.onreadystatechange = function() {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("teacher").innerHTML = xmlhttp2.responseText;
        }
    }
    //alert(str);
    xmlhttp2.open("GET", "teacher_ajax.php?id=" + str, true);
    xmlhttp2.send();
}
</script>

<style>
:root {
    --ash: #f9fafc;
    --cr: crimson;
    --cr2: rgb(247, 128, 152);
    --g2: #d1f1bc;
    --g2: #d1f1bc;
    --purple: #e386fc;
    --pur: #824892;
    --g: #66B830;
    --blk: #000000;
    --w: #ffffff;

    /* FOnts */
    --av: 'Avenir';
}


/* .err {} */

.err i {
    color: var(--cr);
    font-size: 18px;
}

.suc i {
    color: var(--g2);
    font-size: 18px;
}


body {
    background-color: #f9fafc;
    width: 100%;
    padding: 5%;
}

h2 {
    position: absolute;
    top: 15%;
    left: 48%;
    font-size: 35px;
}

form {
    position: absolute;
    top: 80%;
    left: 55%;
    transform: translate(-50%, -50%);
    width: 38%;
    height: 110vh;
    padding: 2em;
    background-color: var(--w);
}

form .row {
    display: block;
    justify-content: space-between;
    align-items: center;
}


form .row .content {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

form label {
    text-align: left;
    font-size: 18px;
    font-weight: 300;
    font-family: var(--av), sans-serif;
}

form .form-control {
    width: 100%;
    outline: none;
    font-size: 17px;
    font-family: var(--av), sans-serif;
    font-weight: 300;
    letter-spacing: 2px;
    word-spacing: 3px;
    padding: 5px 10px;
    margin: 1em 0 1em 0;
}

form .form-control:focus {
    outline: none;
}
</style>

<script>
function showOpts(str) {
    showSemester(str);
    showTeacher(str);
}

function showSemester(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("semester").innerHTML = xmlhttp.responseText;
        }
    }
    //alert(str);
    xmlhttp.open("GET", "semester_ajax.php?id=" + str, true);
    xmlhttp.send();
}

function showTeacher(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp2 = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp2.onreadystatechange = function() {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("teacher").innerHTML = xmlhttp2.responseText;
        }
    }
    //alert(str);
    xmlhttp2.open("GET", "teacher_ajax.php?id=" + str, true);
    xmlhttp2.send();
}
</script>


<body>
    <h2>Add Subject</h2>
    <form method="POST" enctype="multipart/form-data">
        <div><?php echo @$err; ?></div>
        <div class="row">
            <label for="Department">Select Department</label>
            <select name="courseid" id="courseid" onchange="showOpts(this.value)" class="form-control">
                <option disabled selected>--- select department ---</option>
                <?php
                $sub = mysqli_query($con, "select * from department");
                while ($s = mysqli_fetch_array($sub)) {
                    $s_id = $s[0];
                    echo "<option value='$s_id'>" . $s[1] . "</option>";
                }

            ?>
            </select>
            <label for="Semester">Select Semester</label>
            <select name="s" id="semester" class="form-control">
                <option disabled selected>---select semester---</option>

                <?php
                $sub = mysqli_query($con, "select * from semester where department_id='" . $res['department_id'] . "'");
                while ($s = mysqli_fetch_array($sub)) {
                    $s_id = $s[0];
                    echo "<option value='$s_id'>" . $s[1] . "</option>";
                }

            ?>
            </select>
        </div>
        <div class="row">
            <label for="Lecturer">Select Lecturer</label>
            <select name="t" id="teacher" class="form-control">
                <option disabled selected>---select lecturer---</option>

                <?php
                      $sub = mysqli_query($con, "select * from teacher");

                      while ($s = mysqli_fetch_assoc($sub)) {
                          // $s_id = $s[0];
                          echo "<option value='".$s['name']."'>".$s['name']."</option>";
                      }
                    ?>

            </select>
            <label for="CourseID">Course Code</label>
            <input type="text" name="subid" class="form-control" />
        </div>
        <div class="row">
            <label for="Course">Course Name:</label>
            <input type=" text" name="subname" class="form-control" />
            <label for="Level">Select Level</label>
            <select name="lvl" id="level" class="form-control">
                <option disabled selected>--- Select Level ---</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
                <option value="500">500</option>
            </select>
        </div>
        <div class="row">
            <label for="Lecture/Week">Lecture/Week </th>
                <input type="number" name="lpw" class="form-control" />
        </div>
        <div>
            <label for="Course Type">Course Type: </label>
            <input class="form-check-input" type="radio" name="type" value="Theory" checked>
            <label for="Theory">Theory:</label>
            <input class="form-check-input" type="radio" name="type" value="Lab">
            <label for="Lab">Lab:</label>
        </div>
        <div class="btn" style="margin-left: 8em;">
            <input type="submit" value="Add subject" name="save" class="btn btn-success"
                style="outline: none; border: 1px solid var(--pur); background-color: var(--pur); color: var(--w); font-size: 17px; font-family: var(--av), sans-serif;" />

            <input type="reset" value="Reset" class="btn btn-success"
                style="font-size: 17px; font-family: var(--av), sans-serif;" />
        </div>
        <div class="link" style="margin-top: 1em; text-align: center;">
            <a href="admindashboard.php?info=subject"
                style="text-decoration: none; border-radius: 6px; text-align: center; background-color: var(--pur); color: var(--w); padding: 10px 20px;">Go
                Back</a>
        </div>
    </form>
</body>