<!DOCTYPE html>
<html lang="en">
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>

<?php 
  include('connect.php');
  $sql = "select * from tbl_user where id = '".$_SESSION["id"]."'";
  $result=$conn->query($sql);
  $row1=mysqli_fetch_array($result);
        
  $q = "select * from tbl_permission_role where role_id='".$row1['role_id']."'";
  $ress=$conn->query($q);
  $name = array();
  while($row=mysqli_fetch_array($ress)){
    $sql = "select * from tbl_permission where id = '".$row['permission_id']."'";
    $result=$conn->query($sql);
    $row1=mysqli_fetch_array($result);
    array_push($name,$row1[1]);
  }

  $_SESSION['name']=$name;
  $useroles=$_SESSION['name'];

  $ret=mysqli_query($conn,"select count(id) as id1 from tbl_pass");
  $row1=mysqli_fetch_array($ret);

  $ret=mysqli_query($conn,"SELECT count(id) as id2 from tbl_pass where ToDate >= curdate() and delete_status = 0");
  $row2=mysqli_fetch_array($ret); 
  
  $ret=mysqli_query($conn,"SELECT count(id) as id3 from tbl_pass where ToDate < curdate() and delete_status = 0");
  $row3=mysqli_fetch_array($ret); 

  $ret=mysqli_query($conn,"SELECT count(id) as id4 from tbl_pass where delete_status = 1");
  $row4=mysqli_fetch_array($ret);  
?>   

<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper full-calender">
<div class="page-body">
<div class="row">

<?php if(isset($useroles)){  if(in_array("dashboard",$useroles)){ ?>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-blue update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row1['id1']; ?></h4>
<h6 class="text-white m-b-0"><a href="#" style="color:white;">Issued Passes</a></h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-2" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>
<?php } } ?> 

<?php if(isset($useroles)){  if(in_array("dashboard",$useroles)){ ?>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-green update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row2['id2']; ?></h4>
<h6 class="text-white m-b-0"><a href="#" style="color:white;">Valid Passes</a></h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-3" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>
<?php } } ?> 

<div class="col-xl-3 col-md-6">
<div class="card bg-c-pink update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row3['id3']; ?></h4>
<h6 class="text-white m-b-0"><a href="#" style="color:white;">Expired Passes</a></h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-4" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>

<?php if(isset($useroles)){  if(in_array("dashboard",$useroles)){ ?>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-yellow update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row4['id4']; ?></h4>
<h6 class="text-white m-b-0"><a href="#"style="color:white;">Deleted Passes</a></h6>
 </div>
<div class="col-4 text-right">
<canvas id="update-chart-1" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>
<?php } } ?>        
</div>
 
<div class="card col-md-12 "> 
<div class="table-responsive dt-responsive m-t-50">
<table  class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>Pass Number</th>
<th>Full Name</th>
<th>Contact Number</th>
<th>Vehicle No</th>
<th>Creation Date</th>
<th>From Date</th>
<th>To Date</th>
</tr>
</thead>
<?php
  $ret=mysqli_query($conn,"select * from  tbl_pass");
  $cnt=1;
  while ($row=mysqli_fetch_array($ret)) {
?> 
    <tbody>
      <td><?php  echo $row['PassNumber'].$row['id'];?></td>
      <td><?php  echo $row['FullName'];?></td>
      <td><?php  echo $row['ContactNumber'];?></td>
      <td><?php  echo $row['VehicleNo'];?></td>
      <td><?php  echo $row['PasscreationDate'];?></td>
      <td><?php  echo $row['FromDate'];?></td>
      <td><?php  echo $row['ToDate'];?></td>
      <?php $cnt=$cnt+1;}?>
    </tbody>
  <tfoot>
    <tr>
      <th>Pass Number</th>
      <th>Full Name</th>
      <th>Contact Number</th>
      <th>Vehicle No</th>
      <th>Creation Date</th>
      <th>From Date</th>
      <th>To Date</th>
  </tr>
  </tfoot>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?>