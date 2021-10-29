<?php require_once('check_login.php');?>
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('connect.php');
$passw = hash('sha256', $_POST['password']);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);

extract($_POST);
$sql ="INSERT INTO tbl_user (username, email, password, fname, lname, gender,  dob, contact, addr, created_on, updated_on, role_id)VALUES ('user', '$email','$pass', '$fname', '$lname', '$gender', '$dob', '$contact', '$addr' ,CURDATE(), CURDATE(),'$role_id')";
if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="user_view.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="user_view.php";
</script>
<?php } ?>


