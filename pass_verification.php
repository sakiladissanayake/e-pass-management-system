<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>    

<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Verification</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="pass_verification.php">Verification</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-block">
<form role="form" method="post">
<div class="form-group row">
        <label class="col-lg-3">Verification by Pass QR Code</label>
</div>
<div class="col-lg-12">

				<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	
				<div class="col-sm-12">
					<video id="preview" class="p-1 border" style="width:25%;"></video>
				</div>
				<script type="text/javascript">
					var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
					scanner.addListener('scan',function(content){
                        document.getElementById('Verificationdata').value = content;
					});
					Instascan.Camera.getCameras().then(function (cameras){
						if(cameras.length>0){
							scanner.start(cameras[0]);
							$('[name="options"]').on('change',function(){
								if($(this).val()==1){
									if(cameras[0]!=""){
										scanner.start(cameras[0]);
									}else{
										alert('No Front camera found!');
									}
								}else if($(this).val()==2){
									if(cameras[1]!=""){
										scanner.start(cameras[1]);
									}else{
										alert('No Back camera found!');
									}
								}
							});
						}else{
							alert('No cameras found.');
						}
					}).catch(function(e){
						console.error(e);
					});
				</script>
</div>
<br>
<div class="form-group row">
    <label class="col-lg-3" >Verification by Pass Number</label>
</div>
<br>
<div class="form-group row">
    <input type="text" class="form-control col-lg-3" id="Verificationdata"  name="Verificationdata" placeholder="Verification" required="true">
    <button type="submit" name="Verification" class="btn btn-primary m-b-0">Verify</button>
</div>
</form>
</div>
                  
<div class="card-block">
<div class="table-responsive dt-responsive">
<?php

if(isset($_POST['Verification']))
{ 

$sdata=$_POST['Verificationdata'];
  ?>
  <h4 align="center">Verification Against "<?php echo $sdata;?>" Pass Number </h4>
                                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                           <th>Pass Number</th>
                                            <th>Full Name</th>
                                            <th>Contact Number</th>
                                            <th>Vehicle No</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$sql="SELECT * from tbl_pass where PassNumber = ". substr($sdata, 0, 8) . " AND id = " . substr($sdata , 8, strlen($sdata)-1) . ";";
$result = $conn->query($sql);
$i=1;
while($row = $result->fetch_assoc()) {

?>
    <tr>
    <td><?php  echo $row['id'];?></td>
    <td><?php  echo $row['PassNumber'];?></td>
    <td><?php  echo $row['FullName'];?></td>
    <td><?php  echo $row['ContactNumber'];?></td>
    <td><?php  echo $row['VehicleNo'];?></td>
    <td><?php  echo $row['FromDate'];?></td>
    <td><?php  echo $row['ToDate'];?></td>
    <td><?php  
    if( $row['ToDate'] >= date("Y-m-d"))
    {
        if( $row['delete_status'] != 0){
            echo '<b style="color:red;">DELETED PASS</b>';
        }else{
            echo '<b style="color:green;">VALID PASS</b>';
        }  
    }else{ 
        echo '<b style="color:red;">EXPIRED PASS</b>';
    } ?></td>
    </tr>
<?php             
    } 
}
?> 
                                       
                                        
</tbody>
</table>
</div>
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