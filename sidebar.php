<?php 
 include('connect.php');
  $sql = "select * from tbl_user where id = '".$_SESSION["id"]."'";
        $result=$conn->query($sql);
        $ro=mysqli_fetch_array($result);
       
        $q = "select * from tbl_permission_role where role_id='".$ro['role_id']."'";
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
 ?>


<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<nav class="pcoded-navbar">
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigatio-lavel">Main Menu</div>
<ul class="pcoded-item pcoded-left-item">

<?php if(isset($useroles)){  if(in_array("dashboard",$useroles)){ ?>
<li class="">
<a href="index.php">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">Dashboard</span>
</a>
</li>
<?php } } ?> 

<?php if(isset($useroles)){  if(in_array("category",$useroles)){ ?>
<li class="pcoded-hasmenu">
<a href="#">
<span class="pcoded-micon"><i class="feather icon-grid"></i></span>
<span class="pcoded-mtext">Category</span>
</a>
<ul class="pcoded-submenu">
   
<?php if(isset($useroles)){  if(in_array("category",$useroles)){ ?>
<li class="">
<a href="category_add.php">
<span class="pcoded-mtext">Add Category</span>
</a>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("category",$useroles)){ ?>
<li class="">
<a href="category.php">
<span class="pcoded-mtext">Manage Category</span>
</a>
</li>
<?php } } ?>
</ul>
</li>
<?php } } ?>
<?php if(isset($useroles)){  if(in_array("epass",$useroles)){ ?>
<li class="pcoded-hasmenu">
<a href="#">
<span class="pcoded-micon"><i class="feather icon-image"></i></span>
<span class="pcoded-mtext">E-Pass</span>
</a>
<ul class="pcoded-submenu">
   


<?php if(isset($useroles)){  if(in_array("epass",$useroles)){ ?>
<li class="">
<a href="pass_add.php">
<span class="pcoded-mtext">Issue E-Pass</span>
</a>
</li>
<?php } } ?>
<?php if(isset($useroles)){  if(in_array("epass",$useroles)){ ?>
<li class="">
<a href="pass.php">
<span class="pcoded-mtext">Manage E-Pass</span>
</a>
</li>
<?php } } ?>
</ul>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("verification",$useroles)){ ?>
<li class="">
<a href="pass_verification.php">
<span class="pcoded-micon"><i class="feather icon-search"></i></span>
<span class="pcoded-mtext">Verification</span>
</a>
</li>
<?php } } ?>
<?php if(isset($useroles)){  if(in_array("reports",$useroles)){ ?>
<li class="">
<a href="report.php">
<span class="pcoded-micon"><i class="feather icon-folder"></i></span>
<span class="pcoded-mtext">Reports</span>
</a>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("users",$useroles)){ ?>
<li class="pcoded-hasmenu">
<a href="javascript:void(0)">
<span class="pcoded-micon"><i class="feather icon-user"></i></span>
<span class="pcoded-mtext">Users</span>
</a>
<ul class="pcoded-submenu">
   
<?php if(isset($useroles)){  if(in_array("users",$useroles)){ ?>
<li class="">
<a href="user_add.php">
<span class="pcoded-mtext">New User</span>
</a>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("users",$useroles)){ ?>
<li class="">
<a href="user_view.php">
<span class="pcoded-mtext">Manage User</span>
</a>
</li>
<?php } } ?>
</ul>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("settings",$useroles)){ ?>
<li class="">
<a href="change_password.php">
    <span class="pcoded-micon"><i class="feather icon-shield"></i></span>
<span class="pcoded-mtext"></i> Change Password</span>
</a>
</li>
<?php } } ?>

<?php if(isset($useroles)){  if(in_array("settings",$useroles)){ ?>
<li class="">
<a href="logout.php">
    <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
<span class="pcoded-mtext"></i> Logout</span>
</a>
</li>
<?php } } ?>
</ul>
</div>
</nav>

