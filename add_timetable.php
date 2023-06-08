<?php
include '../config.php';
include "timetablegen.php";
extract($_POST);

if (isset($generate) || isset($regenerate)) {

    $_GET['generated'] = "true";

} else {
    $_GET['generated'] = "";
}

?>


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
    left: 45%;
    font-size: 35px;
}

form {
    position: absolute;
    top: 46%;
    left: 55%;
    transform: translate(-50%, -50%);
    width: 38%;
    height: 43vh;
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



.max-table {
    position: absolute;
    top: 70%;
    left: 20%;
    height: 50vh;
    width: 75%;
    display: flex;
    flex-direction: column;
    border-top-left-radius: 10px;
}
</style>

<script>
function showSubject(str) {
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
            document.getElementById("subject").innerHTML = xmlhttp.responseText;
        }
    }
    //alert(str);
    xmlhttp.open("GET", "subject_ajax.php?id=" + str, true);
    xmlhttp.send();
}
</script>

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


<body>
    <h2>Generate Time Table</h2>
    <form method="POST" enctype="multipart/form-data">
        <div><?php echo @$err; ?></div>
        <label for="Department">Select Department:</label>
        <select name="courseid" class="form-control" onchange="showSemester(this.value)" id="courseid">
            <option disabled selected>Select Department</option>
            <?php
                $dep = mysqli_query($con, "select * from department");
                while ($dp = mysqli_fetch_array($dep)) {
                    $dp_id = $dp[0];
                    echo "<option value='$dp_id'>" . $dp[1] . "</option>";
                }
            ?>
        </select>
        <label for="Level">Select Level</label>
        <select name="lvl" id="level" onchange="showSubject(this.value)" class="form-control">
            <option disabled selected>Select Level</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="300">300</option>
            <option value="400">400</option>
            <option value="500">500</option>
        </select>
        <select name="s" id="semester" onchange="showSubject(this.value)" class="form-control">
            <option disabled selected>---select semester---</option>
        </select>
        <input type="submit" value="Generate Time Table" name="generate" class="btn btn-success" />
        <?php
if ($_GET['generated']) {
    ?>
        <tr>
            <td>
                <!-- <input type="submit" value="Regenerate" name="regenerate" class="btn btn-primary" /> -->
            </td>
            <td class="text-right">
                <!-- <input type="submit" value="Save" name="save" class="btn btn-primary text-right" /> -->
            </td>
        </tr>
        <?php
}
?>

    </form>
    <div>
        <?php

if ($_GET['generated']) {

    $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    $lunch = "LUNCH";


    $query = "select * from subject where level = $lvl";
    $que = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($que);
    $l = $row['level'];

    $query = "select * from department where department_id = $courseid";
    $que = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($que);
    $branch = $row['department_name'];

    $query = "select * from semester where sem_id = $s";
    $que = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($que);
    $semester = $row['semester_name'];

    if ($l && $branch && $semester) {
        echo "<div class='max-table' style='background-color: var(--w); padding: 2em;'>
        <div style='font-size: 32; text-align: center;'><b>" . $l . " " . $branch . " " . $semester . " Semester</b></div><br>";
    }

    $weekTimeTable = generate_time_table($con, $lvl, $courseid, $s);

    if ($weekTimeTable) {

        echo "<table border='1' class='table'>";

        echo "<tr class='danger text-center'>
      <th class='text-center'>Days/Lecture</th>
      <th class='text-center'>Lecture 1<br>09:00-10:00</th>
      <th class='text-center'>Lecture 2<br>10:00-11:00</th>
      <th class='text-center'>Lecture 3<br>11:00-12:00</th>
      <th class='text-center'>Lecture 4<br>12:00-01:00</th>
      <th class='text-center'>Break</th>
      <th class='text-center'>Lecture 5<br>02:30-03:30</th>
      <th class='text-center'>Lecture 6<br>03:30-04:30</th>";

        for ($i = 0; $i < 5; $i++) {
            echo "<tr>";
            echo "<th center class='danger text-center'>" . $weekDays[$i] . "</th>";
            for ($j = 0; $j < 6; $j++) {
                if ($weekTimeTable[$i][$j]['type'] === 'Lab') {
                    echo "<th class=' text-center' colspan=2>" . $weekTimeTable[$i][$j]['subject_id'] . "</th>";
                    $j++;
                } else {
                    echo "<th class=' text-center'>" . $weekTimeTable[$i][$j]['subject_id'] . "</th>";
                }
                if ($j === 3) {
                    echo "<th class=' text-center'><b style='text-sze=24'>" . $lunch[$i] . "</b></th>";
                }
            }
            echo "</tr>
            </div>";
        }

    } else {
        echo "<div style='text-size=28'><b>Not enough data for selected Course and semester.</b></div>";
    }

}

?>

    </div>
</body>