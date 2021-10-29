<?php include('connect.php');?>
<body>

<div class="theme-loader">
<center><img src="images/img_loading.gif"></center>
</div>
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">

<a href="index.php">

<div class="text-center">
<image class="profile-img" src="images/img_title.png" style="width: 250%"></image>
</div>
</a>
</div>
<div class="navbar-container container-fluid">
<ul class="nav-left">
</ul>
<ul class="nav-right">
 <li class="header-notification">
<div class="dropdown-primary dropdown">
</div>
</li> 
<li class="user-profile header-notification" >
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
	
		<?php 
        $sql = "select * from tbl_user where id = '".$_SESSION["id"]."'";
        $query=$conn->query($sql);
        while($row=mysqli_fetch_array($query))
        {
            extract($row);
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $contact = $row['contact'];
            $gender = $row['gender'];
        }
     ?>
</div>
</div>
</li>
</ul>
</div>
</div>
</nav>

