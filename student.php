<script>
	function deleteData(id)
	{
		if(confirm("You want to delete ?"))
		{
		window.location.href="deletestudent.php?stu_id="+id;
		}

	}
</script>

<table border='1' class='table table-striped'>
<tr class='danger'><th colspan='14'><a href='admindashboard.php?info=add_student'>Add New</a></th></tr>
<tr><th>Id</th><th>Student Name</th><th>Email</th><th>Password</th><th>Mobile</th><th>Address</th><th>Department</th><th>Semester</th><th>D.O.B</th><th>Pic</th><th>Gender</th><th>Status</th><th>Update</th><th>Delete</th></tr>

<?php
include '../config.php';
$sql = "SELECT * FROM student";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["stu_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["eid"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["mob"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";

        //display department name
        $sql2 = "SELECT department_name FROM department where department_id='" . $row['department_id'] . "'";
        $result2 = $con->query($sql2);
        $row2 = $result2->fetch_assoc();
        echo "<td>" . $row2["department_name"] . "</td>";
        $sql1 = "SELECT semester_name FROM semester where sem_id='" . $row['sem_id'] . "'";
        $result1 = $con->query($sql1);
        $row1 = $result1->fetch_assoc();
        echo "<td>" . $row1["semester_name"] . "</td>";

        echo "<td>" . $row["dob"] . "</td>";
        echo "<td><img src='../student/image/" . $row["eid"] . "/" . $row["pic"] . "' width='100px' /></td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td><a href='admindashboard.php?info=updatestudent&stu_id=" . $row["stu_id"] . "'>Update</a></td>";
        echo "<td><a href='javascript:deleteData(" . $row["stu_id"] . ")'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

?>
</table>
