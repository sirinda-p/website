<?php
require_once '../class/instructors.php';
$action = @$_REQUEST['action'];
$uploadTo = '../images/ins/';
chmod($uploadTo, 0777);
$result;
$ins = new instructors();
if($action=='add'){
	if(@$_POST['submited']){
		$firstname =@$_POST['firstname'];
		$lastname =@$_POST['lastname'];
		$email =@$_POST['email'];
		$website =@$_POST['website'];
		$post =@$_POST['post'];
		$course =@$_POST['course'];
		$picture =@basename($_FILES["picture"]["tmp_name"]);
		$isSuccess = false;
		if($firstname&&$lastname&&$post&&$course){
			if(strtolower(pathinfo(basename($_FILES["picture"]["name"]),PATHINFO_EXTENSION))=="jpg"){
				if(getimagesize($_FILES["picture"]["tmp_name"])){
					if($instructorID = $ins->addIns($firstname,$lastname,$email,$website,$post,$course)){
						$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> Instructor info was added. (Instructor ID : '.$instructorID.')</div></div></div>';
						//mkdir($uploadTo);
						$isSuccess = true;
						if(!move_uploaded_file($_FILES["picture"]["tmp_name"], $uploadTo.$instructorID.'.jpg')) $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-danger"><strong>Error!</strong> Fail to upload picture.</div></div></div>';
					} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to add instructor info. Please contact Administrator.</div></div></div>';
				} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> File is not an image.</div></div></div>';
			} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Sorry, only JPG files are allowed.</div></div></div>';
		} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Please fill in all fields.</div></div></div>';
		echo "<script>window.top.window.setResult('$result');";
		if($isSuccess) echo "window.top.window.addSuccess();";
		echo "</script>";
	}
?>
<form method="POST" id="form" enctype="multipart/form-data" action="?modal=true&page=instructors&action=add" target="operator">
	<div class="panel panel-default">
		<div class="panel-heading">
				<h4>Add Instructor</h4>
		</div>
		<div class="panel-body">
			<div class="col-sm-12" id="result"></div>
			<div class="form-group col-sm-6">
				<label for="firstname">Fristname:</label>
				<input type="text" class="form-control" id="firstname" name="firstname">
			</div>
			<div class="form-group col-sm-6">
				<label for="lastname">Lastname:</label>
				<input type="text" class="form-control" id="lastname" name="lastname">
			</div>
			<div class="form-group col-sm-6">
				<label for="email">E-Mail:</label>
				<input type="text" class="form-control" id="email" name="email">
			</div>
			<div class="form-group col-sm-6">
				<label for="website">Website:</label>
				<input type="text" class="form-control" id="website" name="website">
			</div>
			<div class="form-group col-md-12">
				<label for="post">Post:</label>
				<select class="form-control" name="post">
					<?php echo $ins->getFormPostList("select"); ?>
				</select>
			</div>
			<div class="form-group col-md-12">
				<label for="course">Course:</label>
				<select class="form-control" name="course">
					<?php echo $ins->getFormCourseList("select"); ?>
				</select>
			</div>
			<div class="form-group col-lg-12">
				<label for="picture">Picture:</label><br/>
				<input id="cover" type="file" class="file-loading" name="picture" accept=".jpg">
			</div>
			<input type="hidden" name="submited" value="1">
		</div>
		<div class="panel-footer">
			<button type="button" class="btn btn-primary" id="submitBtn">Save</button>
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#cancelConfirm" onclick="">Cancel</button>
		</div>
	</div>
</form>
<iframe name="operator" id="operator"></iframe>
<style>
	.panel {
		margin-bottom: 0px !important;
	}
	#operator {
		display: none;
	}
</style>
<script>
	$("#cover").fileinput({
			initialPreviewAsData: true,
			autoReplace: true,
			maxFileCount: 1,
			allowedFileExtensions: ["jpg"]
	});
	$('#submitBtn').click(function(){$('#form').submit();})
	function setResult(t){
		$('#result').html(t);
	}
	function addSuccess(){
		$('#submitBtn,#cancelBtn').prop('disabled', true);
		setTimeout(function(){$('#modalDialog').modal('hide');window.location.reload(1);},3000);
	}
</script>
<?php
} elseif($action=='edit'){
	$instructorID = @$_REQUEST['instructorID'];
	if(@$_POST['submited']){
		$firstname =@$_POST['firstname'];
		$lastname =@$_POST['lastname'];
		$email =@$_POST['email'];
		$website =@$_POST['website'];
		$post =@$_POST['post'];
		$course =@$_POST['course'];
		$picture =@basename($_FILES["picture"]["tmp_name"]);
		if(!empty($_FILES["picture"]["tmp_name"])){
			$isSuccess = false;
			if(strtolower(pathinfo(basename($_FILES["picture"]["name"]),PATHINFO_EXTENSION))=="jpg"){
				if(getimagesize($_FILES["picture"]["tmp_name"])){
					if(!move_uploaded_file($_FILES["picture"]["tmp_name"], $uploadTo.$instructorID.'.jpg')){
						$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-danger"><strong>Error!</strong> Fail to upload picture.</div></div></div>';
					} else $isSuccess = true;
				} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> File is not an image.</div></div></div>';
			} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Sorry, only JPG files are allowed.</div></div></div>';
		} else echo 'no photo'.$picture;
		$isSuccess = false;
		if($instructorID&&$firstname&&$lastname&&$post&&$course){
			if($ins->editIns($instructorID,$firstname,$lastname,$email,$website,$post,$course)){
				$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> Instructor info was edited.</div></div></div>';
				$isSuccess = true;
			} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to edit instructor info. Please contact Administrator.</div></div></div>';
		} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Please fill in all fields.</div></div></div>';
		echo "<script>window.top.window.setResult('$result');";
		if($isSuccess) echo "window.top.window.editSuccess();";
		echo "</script>";
	}
	$data = $ins->getInsInfo($instructorID);
?>
<form method="POST" id="form" enctype="multipart/form-data" action="?modal=true&page=instructors&action=edit&instructorID=<?php echo $data['instructorID'];?>" target="operator">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Edit Instructor</h4>
		</div>
		<div class="panel-body">
			<div class="col-sm-12" id="result">
			</div>
			<div class="form-group col-sm-12">
				<label for="instructorID">Instructor ID:</label>
				<input type="text" class="form-control" id="instructorID" name="instructorID" disabled value="<?php echo $data['instructorID'];?>">
			</div>
			<div class="form-group col-sm-6">
				<label for="firstname">Fristname:</label>
				<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $data['firstname'];?>">
			</div>
			<div class="form-group col-sm-6">
				<label for="lastname">Lastname:</label>
				<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $data['lastname'];?>">
			</div>
			<div class="form-group col-sm-6">
				<label for="email">E-Mail:</label>
				<input type="text" class="form-control" id="email" name="email" value="<?php echo $data['email'];?>">
			</div>
			<div class="form-group col-sm-6">
				<label for="website">Website:</label>
				<input type="text" class="form-control" id="website" name="website" value="<?php echo $data['website'];?>">
			</div>
			<div class="form-group col-md-6">
				<label for="post">Post:</label>
				<select class="form-control" name="post">
					<?php echo $ins->getFormPostList("select",$data['post']); ?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="course">Course:</label>
				<select class="form-control" name="course">
					<?php echo $ins->getFormCourseList("select",$data['courseID']); ?>
				</select>
			</div>
			<div class="form-group col-xs-3">
				<img src="../images/ins/cover.png" style="background:url('../images/ins/index.php?instructorID=<?php echo $data['instructorID'];?>') no-repeat top center;background-size:cover;width:100%;" alt="<?php echo $data['firstname'].'  '.$data['lastname'];?>" data-url="../images/ins/index.php?instructorID=<?php echo $data['instructorID'];?>" class="insImg">
			</div>
			<div class="form-group col-xs-9">
				<label for="picture">Picture:</label><br/>
				<input id="cover" type="file" class="file-loading" name="picture" accept=".jpg">
			</div>
			<input type="hidden" name="submited" value="1">
		</div>
		<div class="panel-footer">
			<button type="button" class="btn btn-primary" id="submitBtn">Save</button>
			<button type="button" class="btn btn-default" id="cancelBtn" data-toggle="modal" data-target="#cancelConfirm" onclick="">Cancel</button>
		</div>
	</div>
</form>
<iframe name="operator" id="operator"></iframe>
<style>
	.panel {
		margin-bottom: 0px !important;
	}
	#operator {
		display: none;
	}
</style>
<script>
	$("#cover").fileinput({
			initialPreviewAsData: true,
			autoReplace: true,
			maxFileCount: 1,
			allowedFileExtensions: ["jpg"]
	});
	$('#submitBtn').click(function(){$('#form').submit();})
	function setResult(t){
		$('#result').html(t);
	}
	function editSuccess(){
		$('#submitBtn,#cancelBtn').prop('disabled', true);
		$.each($('.insImg'),function(k,i){
			var url = $(this).data('url');
			$(this).css("background-image", "url(" + url + "&random=" + (Math.random()) + ")");
		})
		setTimeout(function(){$('#modalDialog').modal('hide');},3000);
	}
</script>
<?php
} elseif($action=='inactive'||$action=='active'){
	$instructorID = @$_REQUEST['instructorID'];
	if(@$_POST['submited']){
		$isSuccess = false;
		if($action=='active'){
			if($ins->inactive($instructorID)){
				$isSuccess = true;
				$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> Instructor status was changed to Inactive. (Instructor ID : '.$instructorID.')</div></div></div>';
			} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to change instructor\'s status. Please contact Administrator.</div></div></div>';
		} elseif($action=='inactive'){
			if($ins->active($instructorID)){
				$isSuccess = true;
				$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> Instructor status was changed to Active. (Instructor ID : '.$instructorID.')</div></div></div>';
			}	else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to change instructor\'s status. Please contact Administrator.</div></div></div>';
		}
		echo "<script>window.top.window.setResult('$result');";
		if($isSuccess) echo "window.top.window.changeSuccess();";
		echo "</script>";
	} else {
		$data = $ins->getInsInfo($instructorID);
?>
<form method="POST" id="form" enctype="multipart/form-data" action="?modal=true&page=instructors&action=<?php echo $action=='active'?'inactive':'active';?>&instructorID=<?php echo $data['instructorID'];?>" target="operator">
	<div class="panel panel-yellow">
		<div class="panel-heading">
			<h4>Make instructor <?php echo $action=='active'?'Active':'Inactive';?>.</h4>
		</div>
		<div class="panel-body">
			<div class="col-sm-12" id="result"></div>
			<p>Are you sure you want to make "<?php echo $data['post'].$data['firstname'].'  '.$data['lastname']; ?>", instructor's ID : <?php echo $data['instructorID']; ?> status as <?php echo $action=='active'?'Active':'Inactive';?>?</p>
		</div>
		<input type="hidden" name="submited" value="1">
		<div class="panel-footer">
			<button type="button" class="btn btn-primary" id="submitBtn">Yes</button>
			<button type="button" class="btn btn-default" id="cancelBtn" data-toggle="modal" data-target="#modalDialog" onclick="">Cancel</button>
		</div>
	</div>
</form>
<iframe name="operator" id="operator"></iframe>
<style>
	.panel {
		margin-bottom: 0px !important;
	}
	#operator {
		display: none;
	}
</style>
<script>
	$('#submitBtn').click(function(){$('#form').submit();})
	function setResult(t){
		$('#result').html(t);
	}
	function changeSuccess(){
		$('#submitBtn,#cancelBtn').prop('disabled', true);
		setTimeout(function(){$('#modalDialog').modal('hide');window.location.reload(1);},3000);
	}
</script>
<?php
	}
} else {
?>
<div class="row">
		<div class="col-lg-12">
				<h1 class="page-header">Instructors</h1>
		</div>
		<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
		<div class="col-lg-4 col-md-6">
				<div class="panel panel-primary">
						<div class="panel-heading">
								<div class="row">
										<div class="col-xs-3">
												<i class="fa fa-group fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
												<div class="huge"><?php echo $ins->count("degree","B"); ?></div>
												<div>Bachelor Degree</div>
										</div>
								</div>
						</div>
						<?php /*<a href="#">
								<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
								</div>
						</a>*/?>
				</div>
		</div>
		<div class="col-lg-4 col-md-6">
				<div class="panel panel-green">
						<div class="panel-heading">
								<div class="row">
										<div class="col-xs-3">
												<i class="fa fa-group fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
												<div class="huge"><?php echo $ins->count("degree","M"); ?></div>
												<div>Master Degree</div>
										</div>
								</div>
						</div>
						<?php /*<a href="#">
								<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
								</div>
						</a> */?>
				</div>
		</div>
		<div class="col-lg-4 col-md-6">
				<div class="panel panel-yellow">
						<div class="panel-heading">
								<div class="row">
										<div class="col-xs-3">
												<i class="fa fa-group fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
												<div class="huge"><?php echo $ins->count("degree","O"); ?></div>
												<div>Other</div>
										</div>
								</div>
						</div>
						<?php /*<a href="#">
								<div class="panel-footer">
										<span class="pull-left">View Details</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
								</div>
						</a> */?>
				</div>
		</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Instructor List
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
					<thead>
						<tr>
							<th>No.</th>
							<th>Pic</th>
							<th>Post</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Course</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $ins->getInsList('%','tr'); ?>
					</tbody>
				</table>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div id="modalDialog" class="modal fade" role="dialog" id="modalDialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" id="modalDialogContent">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Instructor</h4>
      </div>
      <div class="modal-body">
        <p>Loading</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="cancelConfirm" tabindex="-1" role="dialog" aria-labelledby="cancelConfirmLabel" aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content panel-yellow">
						<div class="modal-header panel-heading">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="cancelConfirmLabel">Confirmation</h4>
						</div>
						<div class="modal-body">
								Are you sure you want to exit without saving?
						</div>
						<div class="modal-footer panel-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#modalDialog').modal('hide');">Yes</button>
								<button type="button" class="btn btn-primary" data-target="#cancelConfirm" data-dismiss="modal">No</button>
						</div>
				</div>
				<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="share-wrapper">
	<button type="button" class="btn btn-info btn-circle btn-lg od" data-target="#modalDialog" data-href="?modal=true&page=instructors&action=add"><i class="fa fa-plus"></i></button>
</div>
<?php
}
?>
