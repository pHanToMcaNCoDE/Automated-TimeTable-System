<?php
session_start();
include '../config.php';
if ($_SESSION['admin'] == "") {
    $que = mysqli_query($con, "select * from admin where  user_name='" . $_SESSION['admin'] . "'");
    $res = mysqli_fetch_array($que);
    $_SESSION = $res;
}
?>
<style>
:root {

    /************************************************************
# Colors
************************************************************/
    --ash: #f1f1f1e5;
    --ash2: #e5e5e5;
    --white: #ffffff;
    --black: #292828;
    --black2: #000000;
    --cr: crimson;
    --blue: skyblue;
    --g: #66B830;
    --or: orange;
    --yellow: yellow;
    --purple: #e386fc;
    --pur: #824892;
    --ash3: #f9fafc;
    --g2: #caf2af;
    --cr2: rgb(247, 128, 152);


    /************************************************************
# Fonts
************************************************************/
    --av: 'Avenir';
    --rw: 'Raleway'
}

* {
    margin: 0;
    padding: 0;
    /* user-select: none; */
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Avenir', sans-serif;
}

html {
    scroll-behavior: smooth;
}

body {
    background-color: var(--ash3);
    /* min-height: 100vh; */
}

.max-width {
    max-width: 1300px;
    margin: auto;
    padding: 0 30px;
}


/*************************************************************
################ DASHBOARD STYLING STARTS ###################
*************************************************************/



/************************************************************
# Naviagtion
************************************************************/

.nav {
    /* display: none; */
    top: 0;
    left: 0;
    position: absolute;
    background: var(--white);
    padding: 1.5% 0 0 0;
    width: 100%;
    height: 80px;
    /* z-index: -1; */
}

.nav .max-width {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* .nav .max-width .header {
    position: absolute;
    top: 18px;
margin-left: -40px;
height: 50px;
}

.nav .max-width .header h2 {
    font-size: 25px;
    font-weight: 300;
    font-family: var(--av), sans-serif;
}

.nav .max-width .header p {
    font-size: 15px;
}

.nav .max-width .header a {
    text-decoration: underline;
}

*/
.nav .max-width .logout a {
    position: absolute;
    right: 12%;
    top: 30px;
    font-size: 17px;
    font-family: var(--av), sans-serif;
    outline: none;
    padding: 2px 30px;
    background: var(--white);
    color: var(--black);
    border: 1px solid var(--white);
    cursor: pointer;
}


/************************************************************
# Aside Bar
************************************************************/


.sidebar {
    position: fixed;
    width: 18%;
    height: 100%;
    left: 0;
    top: 0;
    background-color: var(--white);
    border-right: 1px solid var(--ash);
    z-index: 999;
}

.sidebar .logo {
    position: absolute;
    top: 3%;
    left: 15%;
}

.sidebar .logo a {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.sidebar .logo a h3 {
    font-size: 23px;
    font-weight: 500;
    letter-spacing: 8px;
    color: var(--pur);
}

.sidebar .logo a i {
    padding-left: 12%;
    color: var(--pur);
    font-size: 25px;
}


.sidebar ul {
    width: 100%;
    height: 100%;
    list-style: none;
    margin-top: 35%;
    padding-top: 6%;
}


.sidebar ul li {
    line-height: 60px;
    margin-top: 2em;
}


.sidebar ul li a i {
    color: var(--black);
}

.sidebar ul li a {
    display: flex;
}

.sidebar ul li a svg {
    color: var(--black);
    margin-right: 10%;
    font-size: 20px;
}


.sidebar ul li a {
    position: relative;
    color: var(--black);
    text-decoration: none;
    font-size: 19px;
    padding-left: 30px;
    padding-bottom: 1em;
    font-weight: 300;
    display: block;
    width: 100%;
    border-left: 3px solid transparent;
}


.sidebar ul li a:hover {
    color: var(--white);
    background-color: var(--pur);
    border-left-color: var(--white);
    border-right-color: var(--white);
}


.sidebar ul li a:hover i {
    color: var(--white);
    border-left-color: var(--white);
}

nav ul li a:hover svg {
    color: var(--white);
}


.sidebar ul ul {
    position: static;
    display: none;
    margin-top: -10%;
}


.sidebar ul .sub.show {
    display: block;
}


.sidebar ul .subC.show2 {
    display: block;
}


.sidebar ul .subS.show3 {
    display: block;
}


.sidebar ul .subL.show4 {
    display: block;
}


.sidebar ul ul li {
    line-height: 45px;
    border-bottom: none;
    transition: all .5s ease-in-out;
}


.sidebar ul ul li a {
    font-size: 17px;
    color: #e6e6e6;
    padding-left: 80px;
}


.sidebar ul ul li a:hover {
    color: var(--white) !important;
    background-color: var(--pur) !important;
}

/* nav ul ul li a i:hover {
    color: var(--white) !important;
    background-color: var(--pur) !important;
} */


.sidebar ul li.active ul li a {
    color: var(--black);
    background: var(--white);
    border-left-color: transparent;
}


.sidebar ul li a svg {
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    font-size: 22px;
    transition: transform .5s;
}


.sidebar ul li a svg.rotate {
    transform: translateY(-50%) rotate(-180deg);
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Time table Admin Dashboard</title>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/032421aa45.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



</head>

<body>
    <nav class="nav">
        <div class="max-width">
            <div class="logout">
                <a type="submit" href="signout.php?signout=out">
                    <i class=" fa-solid fa-arrow-right-from-bracket"></i>
                    Signout
                </a>
            </div>
        </div>
    </nav>
    <nav class="sidebar">
        <div class="logo">
            <a href="dashboard.php">
                <h3>A.T.T.S</h3>
                <i class="fa-solid fa-hourglass-start"></i>
            </a>
        </div>
        <ul>
            <li>
                <a href="dashboard.php">
                    <i class="fa-solid fa-gauge"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="admindashboard.php?info=course">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Departments
                </a>
            </li>

            <li>
                <a href="admindashboard.php?info=semester">
                    <i class="fa fa-fw fa-bar-chart-o"></i>
                    Semesters
                </a>
            </li>
            <li>
                <a href="admindashboard.php?info=subject">
                    <i class="fa-solid fa-pencil"></i>
                    Courses
                </a>
            </li>
            <li>
                <a href="admindashboard.php?info=teacher">
                    <i class="fa-solid fa-users"></i>
                    Lecturers
                </a>
            </li>

            <li>
                <a href="admindashboard.php?info=add_timetable">
                    <i class="fa-solid fa-table"></i>
                    Timetables
                </a>
            </li>
        </ul>
    </nav>

    <!-- <div id="wrapper"> -->

    <!-- Navigation -->
    <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> -->
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- <div class="navbar-header">

                <p> <span style="color:#FFF">Hello Admin</span>
                    <span style="margin-left:1200px" class="glyphicon-glyphicon-off" aria-hidden="true">
                        <a href="logout.php">
                            <font color="#FFFFFF">Logout</font>
                        </a></span>
                </p>
            </div> -->

    <!-- Top Menu Items -->


    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <!-- <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background-color:#000">
                    <li>
                        <a href="admindashboard.php?info=course"><i class="fa fa-fw fa-dashboard"></i>Department</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=semester"><i class="fa fa-fw fa-bar-chart-o"></i>Semester</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=subject"><i class="fa fa-fw fa-table"></i>Subject</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=student"><i class="fa fa-fw fa-edit"></i>Student</a>
                    </li>
                    <li>
                        <a href="admindashboard.php?info=teacher"><i class="fa fa-fw fa-desktop"></i>Teacher</a>
                    </li>

                    <li>
                        <a href="admindashboard.php?info=add_timetable"><i class="fa fa-fw fa-wrench"></i>Time Table</a>
                    </li>

                </ul>
            </div> -->
    <!-- /.navbar-collapse -->
    <!-- </nav>

        <div id="page-wrapper">

            <div class="container-fluid"> -->

    <!-- Page Heading -->
    <!-- <div class="row">
                    <div class="col-lg-12" style="height:1000px; width:1100px;" align="center" margin-top="20px"> -->



    <?php
@$info = $_REQUEST['info'];
if ($info != "") {
    if ($info == "course") {
        include 'course.php';
    } elseif ($info == "semester") {
        include 'semester.php';
    } elseif ($info == "subject") {
        include 'subject.php';
    } elseif ($info == "student") {
        include 'student.php';
    } elseif ($info == "teacher") {
        include 'teacher.php';
    } elseif ($info == "timetable") {
        include 'timetable.php';
    } elseif ($info == "add_course") {
        include 'add_course.php';
    } elseif ($info == "add_subject") {
        include 'add_subject.php';
    } elseif ($info == "add_semester") {
        include 'add_semester.php';
    } elseif ($info == "add_teacher") {
        include 'add_teacher.php';
    } elseif ($info == "add_student") {
        include 'add_student.php';
    } elseif ($info == "add_timetable") {
        include 'add_timetable.php';
    } elseif ($info == "updatecourse") {
        include 'updatecourse.php';
    } elseif ($info == "updatesemester") {
        include 'updatesemester.php';
    } elseif ($info == "updatesubject") {
        include 'updatesubject.php';
    } elseif ($info == "updatestudent") {
        include 'updatestudent.php';
    } elseif ($info == "updateteacher") {
        include 'updateteacher.php';
    } elseif ($info == "updatetimetable") {
        include 'update_timetable.php';
    }

} else {
    ?>

    <!-- <font color="#FF3333" size="+3" face="Lucida Console, Monaco, monospace">Admin Panel</font>
    <br />
    <img src="img/online-practice-exams.jpg" class="img-responsive" alt="Cinque Terre" width="500" height="500"
        style="                          margin-top: 70px; margin-left: 23px;"> -->
    <?php }?>



    </div>
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>