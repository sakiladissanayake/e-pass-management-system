<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');


if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$cnum=$_POST['cnumber'];
$vehicleno=$_POST['vehicleno'];
$itype=$_POST['identitytype'];
$icnum=$_POST['icnum'];
$cat=$_POST['category'];
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$pass=$_POST['pass'];
$eid=$_GET['editid'];
    
$query=mysqli_query($conn,"update tbl_pass set FullName='$fname',ContactNumber='$cnum',VehicleNo='$vehicleno',IdentityType='$itype',IdentityCardno='$icnum',Category='$cat',FromDate='$fdate',ToDate='$tdate',PasscreationDate='$pass',updated_on= CURDATE() where id='$eid'");
if ($query) {
  $_SESSION['success']=' Record Updated Successfully';
  echo "<script>window.location.href ='pass_view.php?viewid=$eid'</script>";
}
else
{
  $_SESSION['error']='The Category Name you entered is already in use';
  echo '<script>window.location="$_SERVER["HTTP_REFERER"]"</script>';
}
}
?>   
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Edit Pass</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Edit Pass</a>
</li>
<li class="breadcrumb-item"><a href="pass_edit.php">Edit Pass</a>
</li>
</ul>
</div>
</div>
</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
</div>
<div class="card-block">
<form id="main" method="post" enctype="multipart/form-data">
<?php
                                    $cid=$_GET['editid'];
                                    $ret=mysqli_query($conn,"select * from  tbl_pass where id='$cid'");
                                    $cnt=1;
                                    while ($row=mysqli_fetch_array($ret)) {

                                    ?>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Full Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="fullname" value="<?php  echo $row['FullName'];?>"required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Contact Number</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="cnumber"  maxlength="10" pattern="[0-9]+" value="<?php  echo $row['ContactNumber'];?>" required="">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Vehicle Address</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="vehicleno"  value="<?php  echo $row['VehicleNo'];?>"  required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Identity Type</label>
<div class="col-sm-4">
<select type="text" name="identitytype" value="" class="form-control" required='true'>
<option value="<?php  echo $row['IdentityType'];?>"><?php  echo $row['IdentityType'];?></option>
<option value="National Identity Card"  <?php if($row['IdentityType']=='National Identity Card'){ echo "Selected";}?>>National Identity Card</option>
<option value="Student ID"  <?php if($row['IdentityType']=='Student ID'){ echo "Selected";}?>>Student ID</option>
<option value="Driving License" <?php if($row['IdentityType']=='Driving License'){ echo "Selected";}?>>Driving License</option>
<option value="Passport"<?php if($row['IdentityType']=='Passport'){ echo "Selected";}?>>Passport</option>
<option value="Other" <?php if($row['IdentityType']=='Other'){ echo "Selected";}?>>Other</option>
     </select>
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Identity Card No.</label>
<div class="col-sm-4">
<input type="text" name="icnum" class="form-control" value="<?php  echo $row['IdentityCardno'];?>" required="true" >
<span class="messages"></span>
</div>

<label class="col-sm-2 col-form-label">Category</label>
<div class="col-sm-4">
<select type="text" name="category" value="" class="form-control" required='true'>
<?php  
            $c1 = "SELECT * FROM tbl_category where delete_status != 1";
            $result = $conn->query($c1);

            if ($result->num_rows > 0) {
              while ($row1 = mysqli_fetch_array($result)) {?>
                <option value="<?php echo $row1["CategoryName"];?>"<?php if($row1['CategoryName']==$row['Category']){echo "selected";}?>>
                    <?php echo $row1['CategoryName'];?>
                </option>
                <?php
              }
            } else {
                    echo "0 results";
            }
        ?>
</select>
<span class="messages"></span>
</div>

</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">From Date</label>
<div class="col-sm-4">
<input type="date" class="form-control"  name="fromdate" value="<?php  echo $row['FromDate'];?>" required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">To Date</label>
<div class="col-sm-4">
<input type="date" class="form-control" name="todate"   value="<?php  echo $row['ToDate'];?>" required="">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">

<label class="col-sm-2 col-form-label">Pass Creation Date</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="pass" readonly='true' value="<?php  echo $row['PasscreationDate'];?>" required="">
<span class="messages"></span>
</div>
</div>
  <?php } ?>
<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="submit" class="btn btn-primary m-b-0">Submit</button>
</div>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?>