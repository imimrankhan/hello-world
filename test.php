<?php
ini_set("error_reporting",0);
include("fun.php");
//include("sample.php");
$msg='';
$msg1='';
$msg3='';
if(isset($_POST['submit'])=="submit")
{
	if(isset($_GET['editid'])!='')
	{
			$msg1=update();
	}
	else
	{
		$msg=insert();
	}
	
	
}

if(isset($_GET['deleteid'])!='')
{
	$msg3=delete();
}

?>
<html>
<head>
<link type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css" rel="stylesheet">
<script src="bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
<style>

.glyphicon-trash
{
color:black;
font-size:20px;
}	
.glyphicon-edit
{
color:black;
font-size:20px;
}	
th
{
	text-align:center;
}
li:hover
{
	background-color: #337ab7;
	border-radius:5px;
}
</style>
<script>
function myFunction()
{
    var retVal = confirm('Sure want to delete..?');
    if (retVal == true)
    {
        alert("Delete Succesfuly!");
        return true;
    } 
    else
    {
        return false;
    }
	return true;
}
</script>
</head>
<body height="1500px">	
	<nav class="navbar navbar-inverse navbar-fixed-top">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#" style="font-family:Samarkan;">Sample</a>
				</div>
				<ul class="nav navbar-nav">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Page 1</a></li>
				  <li><a href="#">Page 2</a></li>
				  <li><a href="#">Page 3</a></li>
				</ul>
			  </div>
			</nav>
<?php
if(isset($_GET['editid']))
{
	$con=connect();
	$sql="select * from tbl_details where id=".$_GET['editid']."";
	$res=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($res);
}
?>
	<div class="row" style="margin-top:59px;">
			<div class="col-sm-3">
				<div class="col-sm-12">
					<div class="panel-group">
						<div class="panel panel-primary">
							<div class="panel-heading" align=center><h4>Registration Form</h4></div>
							<form method="POST" action="" enctype="multipart/form-data" style="margin:4px;">
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control"  name="fname" placeholder="Enter FirstName" value="<?php if(isset($_GET['editid'])!='') { echo $row['fname'];}?>">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" name="lname" placeholder="Enter LastName" value="<?php if(isset($_GET['editid'])!='') { echo $row['lname'];}?>">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
									<input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php if(isset($_GET['editid'])!='') { echo $row['email'];}?>">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
									<input type="text" class="form-control" name="numbr" placeholder="Enter Number" value="<?php if(isset($_GET['editid'])!='') { echo $row['num'];}?>">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<input type="date" class="form-control" name="date" value="<?php if(isset($_GET['editid'])!='') { echo $row['date'];}?>">
								</div>
								<div class="form-group input-group"><strong>Gender</strong><br>									
									<label class="radio-inline"><input type="radio" name="gender" value="Male"  checked="checked" <?php if(isset($_GET['editid'])!=''){if($row['gndr']=='Male'){echo 'checked=checked';}}?>>Male</label><label class="radio-inline"><input type="radio" name="gender" value="Female" <?php if(isset($_GET['editid'])!=''){if($row['gndr']=='Female'){echo 'checked=checked';}}?>>Female</label>
								</div>
								<div class="form-group ">
									<strong>City</strong><br>
									<select class="form-control" name="city">
										<option value="Bengaluru" <?php if(isset($_GET['editid'])!=''){if($row['city']=='Bengaluru'){echo "selected=selected";}}?> >Bengaluru</option>
										<option value="Mangalore" <?php if(isset($_GET['editid'])!=''){if($row['city']=='Mangalore'){echo "selected=selected";}}?>>Mangalore</option>
										<option value="Hubli" <?php if(isset($_GET['editid'])!=''){if($row['city']=='Hubli'){echo "selected=selected";}}?>>Hubli</option>
										<option value="Bellary" <?php if(isset($_GET['editid'])!=''){if($row['city']=='Bellary'){echo "selected=selected";}}?>>Bellary</option>
									</select>
								</div>
								<?php //if(isset($_GET['editid'])!=''){$hob=explode(",",$row['hobie']);}
								
								?>
								<div class="form-group input-group form-control"><strong>Hobbies</strong><br>	
								
										<?php
						 $hobbies=explode(",",$row['hobie']);
						 //print_r($hobbies);
						if(in_array('Sports', $hobbies))
							echo '<label class="checkbox-inline"><input type="checkbox" name="hobbies[0]" value="Sports" checked>Sports</label>';
						else
							echo '<label class="checkbox-inline"><input type="checkbox" name="hobbies[0]" value="Sports">Sports</label>';
						if(in_array('Cycling', $hobbies))
							echo '<label class="checkbox-inline"><input type="checkbox" name="hobbies[1]" value="Cycling" checked>Cycling</label>';
						else
							echo '<label class="checkbox-inline"><input type="checkbox" name="hobbies[1]" value="Cycling">Cycling</label>';
						if(in_array('swimming', $hobbies))
							echo '<label class="checkbox-inline"><input type="checkbox" name="hobbies[2]" value="swimming" checked>swimming</label>';
						else
							echo '<label class="checkbox-inline"><input type="checkbox" name="hobbies[2]" value="swimming">swimming</label>';
		?>
										
										
								</div>
								<div class="form-group input-group">
									<textarea class="form-control" rows="3" cols="50" name="add" placeholder="Address area"><?php if(isset($_GET['editid'])!='') { echo $row['adrs'];}?></textarea>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-open-file"></i></span>
									<input type="file" class="form-control" name="fileToUpload" value="<?php if(isset($_GET['editid'])!='') { echo $row['path'];}?>">
								</div>
								<div class="form-group input-group"> 
									<input type="hidden" class="form-control" name="filenew1" value="<?php if(isset($_GET['editid'])!='') { echo $row['path'];}?>">
								</div>
								<div class="panel-footer">
										<input type="submit" name="submit" class="btn btn-sm btn-success btn-group-justified"><br>
										<input type="reset" class="btn btn-sm btn-default btn-group-justified">
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-12"><?php echo $msg;echo $msg1;echo $msg3; ?></div>
				</div>					
								<?php
									$con=connect();
									if(isset($_GET['editid'])!='')
									{
										$sql="select path from tbl_details where id='$_GET[editid]'";
										$res=mysqli_query($con,$sql);
										if(mysqli_num_rows ($res)>0)
										{
											while($row=mysqli_fetch_assoc($res))
											{			
												//echo "<img src='$row[path]' class='img-rounded' width='40px' height='40px'>";
												//echo $row['path'];
											}
										}
									}
								?>
					
			</div>
		<div class="col-sm-9">
			<div class="col-sm-12">
				<div class="panel panel-primary" style="overflow-x:auto;">
					<div class="panel-heading"><h4>Lists</h4></div>
					  <table class="table table-hover">
							<thead align=center>
							  <tr>
								<th>Fname</th>
								<th>Lname</th>
								<th>Email</th>
								<th>Number</th>
								<th>Date</th>
								<th>Gender</th>
								<th>City</th>
								<th>Hobbies</th>
								<th>Address</th>
								<th>Image</th>
								<th colspan="2">Action</th>
							  </tr>
							</thead>
							<tbody align=center>
							<?php
									$con=connect();
									$sql="SELECT * from tbl_details  ORDER BY id DESC";
									$res=mysqli_query($con,$sql);
									if(mysqli_num_rows ($res)>0)
									{
										while($row=mysqli_fetch_assoc($res))
										{
											echo "<tr>";
											echo "<td>".$row['fname']."</td>";
											echo "<td>".$row['lname']."</td>";
											echo "<td>".$row['email']."</td>";
											echo "<td>".$row['num']."</td>";
											echo "<td>".$row['date']."</td>";
											echo "<td>".$row['gndr']."</td>";
											echo "<td>".$row['city']."</td>";
											echo "<td>".$row['hobie']."</td>";
											echo "<td>".$row['adrs']."</td>";
											echo "<td>"."<img src='$row[path]' class='img-rounded' width='40px' height='40px'>"."</td>";
											echo "<td>"."<a href='test.php?deleteid=$row[id]'><span class='glyphicon glyphicon-trash' data-toggle='tooltip' title='Delete' onclick='return myFunction()'></span></a></td>";
											echo "<td>"."<a href='test.php?editid=$row[id]'><span class='glyphicon glyphicon-edit' data-toggle='Edit' title='Edit'></span></a></td>";
											echo "</tr>";
										}
									}
									
										?>
							</tbody>
						</table>
						<div class="panel-footer">Memmebers List</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
