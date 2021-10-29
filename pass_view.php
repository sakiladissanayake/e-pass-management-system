
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>

<script type="text/javascript">     
    function printEpass(passNo) {    
       $.post('generate_qr.php', { passNo: passNo }, function(result){
        var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=550,height=770');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '<br>'+ result +'</html>');
        popupWin.document.close();
       });
    }
</script>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>View E-Pass</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Manage E-Pass</a>
</li>
<li class="breadcrumb-item"><a href="pass.php">View E-Pass</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-header">
</div>
<div class="card-block">

<div class="table-responsive dt-responsive">
   <div class="card-body">
     <div class="row" id="divToPrint">
    <?php
      $cid=$_GET['viewid'];
      $ret=mysqli_query($conn,"select * from tbl_pass where id='$cid'");
      $cnt=1;
      while ($row=mysqli_fetch_array($ret)) {

      ?>   
<table id="dom-jqry" border="1" class="table table-bordered">
<tr align="center">
<td colspan="6" style="font-size:20px;color:blue">
 Pass ID: <?php  echo $row['PassNumber'].$row['id'];?></td></tr>
   <tr>
        <th scope>Category</th>
    <td colspan="3"><?php  echo $row['Category'];?></td>
  </tr>

  <tr>
    <th scope>Full Name</th>
    <td colspan="3"><?php  echo $row['FullName'];?></td>
  </tr>

  <tr>
    <th scope>Contact Number</th>
    <td><?php  echo $row['ContactNumber'];?></td>
    <th scope>Vehicle No</th>
    <td><?php  echo $row['VehicleNo'];?></td>
  </tr>
<tr>
    <th scope>Identity Type</th>
    <td><?php  echo $row['IdentityType'];?></td>
    <th scope>Identity Card Number</th>
    <td><?php  echo $row['IdentityCardno'];?></td>

  </tr>
<tr>
    <th scope>From Date</th>
    <td><?php  echo $row['FromDate'];?></td>
    <th scope>To Date</th>
    <td><?php  echo $row['ToDate'];?></td>
  </tr>
  <tr>
    <th scope>Pass Creation Date</th>
    <td colspan="3"><?php  echo $row['PasscreationDate'];?></td>
  </tr>
                                    
      </table>

 
</div>
<div class="col-lg-12" style="text-align:center">
      <button type="button" class="btn btn-primary m-b-0" value="print" onclick="printEpass(<?php echo $row['PassNumber'].$row['id'];?>);">print</button>
    </div>
</div>
<?php
}
?>
</div>
</div>


</div>

</div>
</div>

<div id="#">
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include("footer.php"); ?>