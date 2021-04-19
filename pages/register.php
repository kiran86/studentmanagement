<?php
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$rsDeg = $obj->showAllDegree();
	$rsCourse=$obj->showAllCourse();
	$rsSubj = $obj->showAllSubject();
	$rs1=$obj->showCountry();
	$ses=$obj->showSession();
	$res1=$ses->fetch_object();
	//$res1->session;
	if(isset($_POST['submit'])){
	
     
     $obj->register($_POST['course-short'],$_POST['c-full'],$_POST['fname'],$_POST['mname'],$_POST['lname'],
     	            $_POST['gname'],$_POST['ocp'],$_POST['gender'],$_POST['income'],$_POST['category'],$_POST['ph'],$_POST['nation']

     	             , $_POST['mobno'],$_POST['email'],$_POST['country'],$_POST['state'],$_POST['city'],$_POST['padd'],
     	              $_POST['cadd'],$_POST['board1'],$_POST['board2'],$_POST['roll1'],$_POST['roll2'],$_POST['pyear1'],
     	              $_POST['pyear2'],$_POST['sub1'],$_POST['sub2'],$_POST['marks1'],$_POST['marks2'],$_POST['fmarks1'],
     	              $_POST['fmarks2'] ,$_POST['session']);
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Student Registration</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
<!-- JQuery UI -->
<link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
</head>

<body>
<form method="post" >
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0; background-color: #e3f2fd;">
			<a class="navbar-brand" href="..\index.php">Student Management System</a>
		</nav>
		<div id="page-wrapper" style="margin: 0 0 0 0;">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> Welcome Student </h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Register</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
		    							<div class="col-lg-4">
											<label>Select Degree<span id="" style="font-size:11px;color:red">*</span>	</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="degree-short" id="dshort" required="required" >			
												<option VALUE="">SELECT</option>
												<?php while($res=$rsDeg->fetch_object()){?>
												<option VALUE="<?php echo htmlentities($res->deg_id);?>">
												<?php echo strtoupper(htmlentities($res->dshort))?></option><?php }?>
											</select>
										</div>
									</div>	
									<br><br>
									<div class="form-group">
		    							<div class="col-lg-4">
											<label>Select Course<span id="" style="font-size:11px;color:red">*</span>	</label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="course-short" id="cshort" required="required" >			
												<option VALUE="">SELECT</option>
												<?php while($res=$rsCourse->fetch_object()){?>
												<option VALUE="<?php echo htmlentities($res->crs_id);?>">
												<?php echo strtoupper(htmlentities($res->cshort))?></option><?php }?>
											</select>
										</div>
									</div>	
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">
											<label>Add Subjects<span id="" style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="subj-short" id="sshort" required="required" onchange="addSubject(this)">			
												<option VALUE="">SELECT</option>
												<?php while($res=$rsSubj->fetch_object()){?>
												<option VALUE="<?php echo htmlentities($res->subj_id);?>">
												<?php echo strtoupper(htmlentities($res->sshort))?></option><?php }?>
											</select>
										</div>
	 								</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">
											<label>Choosen Subjects<span id="" style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-6">
											<div class="btn-group" id="subjects" role="group" aria-label="Basic example">
											</div>
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">
											<label>Admission Date:<span id="" style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-6">
											<div class="input-group date">
												<input type="text" class="form-control" id="admdate"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
											</div>
										</div>
									</div>
								</div>
								<br><br>
							</div>
						</div>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Personal Informations</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-lg-1">
												<label>First Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-3">
												<input class="form-control" name="fname" required="required" pattern="[A-Za-z]+$">
											</div>
											<div class="col-lg-1">
												<label>Middle Name</label>
											</div>
											<div class="col-lg-3">
												<input class="form-control" name="mname">
											</div>
											<div class="col-lg-1">
												<label>Last Name</label>
											</div>
											<div class="col-lg-3">
												<input class="form-control" name="lname" pattern="[A-Za-z]+$">
											</div>
										</div>	
										<br><br>					
										<div class="form-group">
			 								<div class="col-lg-1">
												<label>Gender</label>
											</div>
											<div class="col-lg-3">
												<input type="radio" name="gender" id="male" value="Male"> &nbsp; Male &nbsp;
												<input type="radio" name="gender" id="female" value="Feale"> &nbsp; Female &nbsp;
												<input type="radio" name="gender" id="other" value="Other"> &nbsp; Other &nbsp;
											</div>
											<div class="col-lg-1">
												<label>Guardian Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-3">
												<input class="form-control" name="gname" required="required" pattern="[A-Za-z]+$">
											</div>
									</div>
								</div>
      						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Contact Informations</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-lg-1">
											<label>Mobile Number<span id="" style="font-size:11px;color:red">*</span>	</label>
										</div>
										<div class="col-lg-3">
											<input class="form-control" type="number" name="mobno" required="required" maxlength="10">
										</div>
										<div class="col-lg-1">
											<label>Email Id<span id="" style="font-size:11px;color:red">*</span>	</label>
										</div>
										<div class="col-lg-3">
											<input class="form-control"  type="email" name="email"  required="required">
										</div>
										<div class="col-lg-1">
											<label>Address<span id="" style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-3">
											<textarea class="form-control" rows="3" name="padd" id="padd"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Academic Informations</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="table-responsive">
											<table class="table">
											<thead>
													<tr>
														<div class="col-lg-6">
															<th>S.No</th>
														</div> 
														<div class="col-lg-6">
															<th>&nbsp;&nbsp;&nbsp;&nbsp;Subject</th>
														</div>
														<div class="col-lg-6">
															<th>&nbsp;&nbsp;&nbsp;&nbsp;Marks Obtained</th>
														</div>
														<div class="col-lg-6">
															<th>&nbsp;&nbsp;&nbsp;&nbsp;Full Marks</th>
														</div>                               
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="col-lg-6">
																<label><span id="" style="color:grey">1</span></label>
															</div>
														</td>
														</div>
														<td>
															<div class="col-lg-6">
																<label>Math<span id="" style="font-size:11px;color:red">*</span></label>
															</div>
														</td>
														<td>
															<div class="col-lg-6">
																<input class="form-control"  type="text" name="marks1">
															</div>
														</td>
														<td>
															<div class="col-lg-6">
																<input class="form-control"  type="text" name="fmarks1">
															</div>
														</td>
													</tr>
													<tr> 
														<td>
															<div class="col-lg-6">
																<label><span id="" style="color:grey">2</span></label>
															</div>
														</td>
														<td>
															<div class="col-lg-6">
																<label>Physics<span id="" style="font-size:11px;color:red">*</span></label>
															</div>
														</td>
														<td>
															<div class="col-lg-6">
																<input class="form-control"  type="text" name="marks2">
															</div>
														</td>
														<td>
															<div class="col-lg-6">
																<input class="form-control"  type="text" name="fmarks2">
															</div>
														</td>
													</tr>
													<tr> 
														<td>
															<div class="col-lg-6">
																<label><span id="" style="color:grey">3</span></label>
															</div>
														</td>
														<td>
															<div class="col-lg-6">
																<label>Eng<span id="" style="font-size:11px;color:red">*</span></label>
															</div>
														</td>
														<td>
															<div class="col-lg-6">
																<input class="form-control"  type="text" name="marks3">
															</div>
														</td>
														<td>
															<div class="col-lg-6">
																<input class="form-control"  type="text" name="fmarks3">
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-lg-6">
						</div>
						<div class="col-lg-6"><br><br>
							<input type="submit" class="btn btn-primary" name="submit" value="Register"></button>
						</div>
					</div>			
				</div>
			</div>
			<br><br>
		</div>
	</div>
</form>

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"
	type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"
	type="text/javascript"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"
	type="text/javascript"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>

<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

$(document).ready(function(){
	$('#admdate').datepicker({
		dateFormat: "dd-mm-yy",
		maxDate: "0d",
		showButtonPanel: "true"
	});
});

function showState(val) {
    
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'id='+val,
	success: function(data){
	  // alert(data);
		$("#state").html(data);
	}
	});
}

function showDist(val) {
    
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'did='+val,
	success: function(data){
	  // alert(data);
		$("#dist").html(data);
	}
	});
	
}

function addSubject(sel) {
	var button = document.createElement("BUTTON");
	button.type = "button";
	button.className = "btn btn-primary";
	button.style = "margin: 1px;"
	button.value = sel.options[sel.selectedIndex].value;
	button.innerText = sel.options[sel.selectedIndex].text;
	button.addEventListener("click", function() {removeSubject(this)});
	document.getElementById("subjects").appendChild(button);
	sel.options[sel.selectedIndex].remove();
}

function removeSubject(btn) {
	var option = document.createElement("OPTION");
	option.value = btn.value;
	option.text = btn.innerText;
	//alert(btn.value + " " + btn.innerText);
	document.getElementById("sshort").options.add(option);
	btn.remove();
}

function showSub(val) {
    
    //alert(val);
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'cid='+val,
	success: function(data){
	  // alert(data);
		$("#c-full").val(data);
	}
	});
	
}
</script>



</body>

</html>
