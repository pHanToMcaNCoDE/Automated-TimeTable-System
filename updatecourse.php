<?php
include '../config.php';
$department_id = $_REQUEST['department_id'];

$q = mysqli_query($con, "select * from department where department_id='$department_id'");
$res = mysqli_fetch_assoc($q);
extract($_POST);
if (isset($update)) {

    mysqli_query($con, "update department set department_name='$c' where department_id='$department_id' ");

    $err = "Records updated";

}

?>

<div class="row">
<div class="col-md-5">
               <h2>Update Department</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" cellspacing="5" cellpadding="5" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>

   <tr>
    <th width="237" scope="row">Department Name </th>
    <td width="213"><input type="text" name="c" class="form-control" value="<?php echo $res['department_name']; ?>"/></td>
  </tr>
   <tr>
    <th colspan="1" scope="row" align="">
      <input type="submit" value="Update Records" name="update"/>
    </th>
    <th colspan="1" scope="row" align="">
      <a href="admindashboard.php?info=course">Go Back</a>
    </th>
  </tr>
</table>
</form>
</div>
</div>

