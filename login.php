<?php session_start();?>

<link rel="stylesheet" href="popup_style.css">
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>E-Pass Management System</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="author" content="SYNC Technology">

<link rel="icon" href="images/logo.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">
<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
</head>
<body class="fix-menu">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T9PCZX9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php
  include('connect.php');
if(isset($_POST['btn_login']))
{
$username = $_POST['email'];
$password = hash('sha256', $_POST['password']);

function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$hashedPassword = hash('sha256', $salt . $password);

 $sql = "SELECT * FROM tbl_user WHERE email='" .$username . "' and password = '". $hashedPassword."'";
    $result = mysqli_query($conn,$sql);
    $row  = mysqli_fetch_array($result);

     $_SESSION["id"] = $row['id'];
     $_SESSION["username"] = $row['username'];
     $_SESSION["password"] = $row['password'];
     $_SESSION["email"] = $row['email'];
     $_SESSION["fname"] = $row['fname'];
     $_SESSION["lname"] = $row['lname'];
     $_SESSION["role_id"]=$row["role_id"];
     $count=mysqli_num_rows($result);
    if(!empty($row) && isset($_SESSION["email"]) && isset($_SESSION["password"])) {
    {       
?>

      <p>
     <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>
     <?php
    }
}
else {?>
     <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h3>
    <p>Invalid Email or Password</p>
    <p>
      <a href="login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>
    <?php
       }
      }
    ?>

<!--HTML View-->
<section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">


<div class="auth-box card" >
  <div class="text-center">
    <br>
<image class="profile-img" src="images/img_login.jpg" style="width: 85%"></image>
</div> 
<div class="card-block" >
 
<div class="row m-b-20">
<div class="col-md-12">
<h5 class="text-center txt-primary">Login Panel</h5>
</div>
</div>
<form method="POST" >
<div class="form-group form-primary">
<input type="email" name="email" class="form-control" required="" placeholder="Email">
<span class="form-bar"></span>
</div>
<div class="form-group form-primary">
<input type="password" name="password" class="form-control" required="" placeholder="Password">
<span class="form-bar"></span>
</div>
<div class="row m-t-25 text-left">
<div class="col-12">


<div class="forgot-phone text-right f-right">
<a href="forgot_password.php" class="text-right f-w-600"> Forgot Password?</a>
</div>

</div>
</div>
<div class="row m-t-30">
<div class="col-md-12">
<button type="submit" name="btn_login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
</div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</section>

<script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script type="text/javascript" src="files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="files/assets/js/common-pages.js"></script>

</body>
<?php include("footer.php"); ?>
</html>
