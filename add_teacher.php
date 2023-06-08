<?php
include '../config.php';
extract($_POST);
if (isset($save)) {
    $que = mysqli_query($con, "select * from teacher where eid='$e'");
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
                    This lecturer already exist!";
    } else {
            if(empty($n) || empty($e) || empty($p) || empty($m) || empty($a) || empty($courseid)){
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
                    All fields are required!
                <p>";
            }else{
                    mysqli_query($con, "insert into teacher values(null,'$n','$e','$p', $m,'$a','$courseid')");

                $err = "
                    <p class='suc' style=' display: flex;
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
                New Semester added!!!</p>";
            }
    }
}
?>
<!-- 
if(empty($c)){
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
    These fields are required!
<p>";
    }else{
    mysqli_query($con, "insert into department values(null,'$c')");

    $err = "
<p class='suc' style=' display: flex;
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
    New Semester added!!!</p>";
}
}
}

?> -->

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
    top: 10%;
    left: 48%;
    font-size: 35px;
}

form {
    position: absolute;
    top: 58%;
    left: 55%;
    transform: translate(-50%, -50%);
    width: 40%;
    height: 78vh;
    padding: 2em;
    background-color: var(--w);
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
</script>

<script>
function showcourse(str) {
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
            document.getElementById("department").innerHTML = xmlhttp.responseText;
        }
    }
    //alert(str);
    xmlhttp.open("GET", "course_ajax.php?id=" + str, true);
    xmlhttp.send();
}
</script>


<body>
    <h2>Add Teacher</h2>
    <form method="POST" enctype="multipart/form-data">
        <div><?php echo @$err; ?></div>
        <label for="Department">Select Department</label>
        <select name="courseid" id="courseid" onchange="showSemester(this.value)" class="form-control">
            <option disabled selected>Select Department</option>
            <?php
                    $t = mysqli_query($con, "select * from department");
                    while ($s = mysqli_fetch_array($t)) {
                        $t_id = $s[0];
                        echo "<option value='$t_id'>" . $s[1] . "</option>";
                    }

                ?>
        </select>


        <label for="Lecturer">Lecturer's Full-Name:</label>
        <input type="text" name="n" class="form-control" placeholder="e.g; John Doe Cash">
        <label for="Email Address">Enter Your E-mail Address</label>
        <input type="email" name="e" class="form-control" placeholder="e.g; jDoe@lmu.edu.ng">
        <label for="Mobile Number">Enter Your Mobile </label>
        <input type="number" name="m" class="form-control" placeholder="e.g; 000999111223">
        <label for="Address">Enter Your Address:</label>
        <input type="text" name="a" class="form-control" placeholder="e.g; Plot 12H Lagos">
        <div class="btn" style="margin-left: 9em;">
            <input type="submit" value="Add Teacher" name="save" class="btn btn-success"
                style="outline: none; border: 1px solid var(--pur); background-color: var(--pur); color: var(--w); font-size: 17px; font-family: var(--av), sans-serif;">

            <input type="reset" value="Reset" class="btn btn-success"
                style="font-size: 17px; font-family: var(--av), sans-serif;">
        </div>

        <div class="link" style="margin-top: 1em; text-align: center;">
            <a href="admindashboard.php?info=teacher"
                style="text-decoration: none; border-radius: 6px; text-align: center; background-color: var(--pur); color: var(--w); padding: 10px 20px;">Go
                Back</a>
        </div>
    </form>
</body>