<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>
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
<h4>Add User</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Users</a>
</li>
<li class="breadcrumb-item"><a href="user_add.php">Add User</a>
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
<form id="main" method="post" action="user_save.php" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-sm-2 col-form-label">First Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Firstname" required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Last Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Lastname" required="">
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Gender</label>
<div class="col-sm-4">
<select type="text" class="form-control" id="gender" name="gender" required="">
<option value="">--Select Gender--</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Contact Number</label>
<div class="col-sm-4">
<input type="tel" class="form-control" id="contact" name="contact" minlength="10" maxlength="10" pattern="[0-9]+"  placeholder="Contact Number" required="">
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-4">
<input type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Role</label>
<div class="col-sm-4">
<select class="form-control" id="role_id" name="role_id" required="">
    <option value="">--Select Role--</option>
        <?php  
            $c1 = "SELECT * FROM `tbl_role` where id!=1";
            $result = $conn->query($c1);

            if ($result->num_rows > 0) {
            	while ($row = mysqli_fetch_array($result)) {?>
                <option value="<?php echo $row["id"];?>">
                    <?php echo $row['role_name'];?>
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
<label class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-4">
<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Repeat Password</label>
<div class="col-sm-4">
<input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="Enter Repeat Password">
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Date Of Birth</label>
<div class="col-sm-4">
<input type="date" class="form-control" name="dob" id="dob" placeholder="Select Birthday..." required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Address</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="addr" id="addr" placeholder="Enter Address..." required="">
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
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