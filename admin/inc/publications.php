<?php
	require_once '../class/publications.php';
	$publications = new publications();
	$uploadTo = '../images/publications/';
	chmod($uploadTo, 0777);
	$result;
	$action = @$_REQUEST['action'];
	if($action=='add'){
		if(@$_POST['submited']){
			$title = @$_POST['title'];
			$type =@$_POST['type'];
			$status =@$_POST['status'];
			$cover =@basename($_FILES["cover"]["tmp_name"]);
			$outline =@$_POST['outline'];
			$content =@$_POST['content'];
			$isSuccess = false;
			if($title&&$type&&$status&&$cover&&$outline&&$content){
				if(pathinfo(basename($_FILES["cover"]["name"]),PATHINFO_EXTENSION)=="jpg"){
					if(getimagesize($_FILES["cover"]["tmp_name"])){
						if($publicationsID = $publications->add($title,$type,$status,$outline,$content)){
							$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> Publications was added. (Publications ID : '.$publicationsID.')</div></div></div>';
							mkdir($uploadTo.$publicationsID);
							$isSuccess = true;
							if(!move_uploaded_file($_FILES["cover"]["tmp_name"], $uploadTo.$publicationsID.'/cover.jpg')) $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-danger"><strong>Error!</strong> Fail to upload cover image.</div></div></div>';
						} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to add publications. Please contact Administrator.</div></div></div>';
					} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> File is not an image.</div></div></div>';
				} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Sorry, only JPG files are allowed.</div></div></div>';
			} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Please fill in all fields.</div></div></div>';
			echo "<script>window.top.window.setResult('$result');";
			if($isSuccess) echo "window.top.window.addSuccess();";
			echo "</script>";
		} else {
	?>
			<form method="POST" id="form" enctype="multipart/form-data" action="?modal=true&page=publications&action=add" target="operator">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Add Publications</h4>
					</div>
					<div class="panel-body">
						<div class="col-sm-12" id="result"></div>
						<div class="form-group">
							<label for="title">Title:</label>
							<input type="text" class="form-control" id="title" name="title">
						</div>
						<div class="form-group">
							<label for="type">Type:</label><br/>
							<div class="btn-group btn-group-justified" data-toggle="buttons" id="type">
								<label class="btn btn-default">
									<input type="radio" name="type" value="S">Student's
								</label>
								<label class="btn btn-default">
									<input type="radio" name="type" value="I">Instructor's
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="status">Status:</label><br/>
							<div class="btn-group btn-group-justified" data-toggle="buttons" id="status">
								<label class="btn btn-default active">
									<input type="radio" name="status" value="A" checked="">Active
								</label>
								<label class="btn btn-default">
									<input type="radio" name="status" value="D">Draft
								</label>
								<label class="btn btn-default">
									<input type="radio" name="status" value="I">Inactive
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="cover">Cover Image:</label><br/>
							<input id="cover" type="file" class="file-loading" name="cover" accept="image/jpg">
						</div>
						<label for="outline">Outline:</label><br/>
						<div class="jumbotron" style="padding:20px;border-radius: 15px;">
							<textarea class="textarea" placeholder="Enter Outline ..." id="outline" name="outline" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;"></textarea>
						</div>
						<label for="content">Content:</label><br/>
						<div class="jumbotron" style="padding:20px;border-radius: 15px;">
							<textarea class="textarea" placeholder="Enter Content ..." id="content" name="content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;"></textarea>
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
				$('.textarea').wysihtml5();
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
		}
	} elseif($action=="edit"){
		$publicationsID = @$_REQUEST['publicationsID'];
		if(@$_POST['submited']){
			$title = @$_POST['title'];
			$type =@$_POST['type'];
			$status =@$_POST['status'];
			$datetime =@$_POST['datetime'];
			$cover =@basename($_FILES["cover"]["tmp_name"]);
			$outline =@$_POST['outline'];
			$content =@$_POST['content'];
			if(!empty($_FILES["cover"]["tmp_name"])){
				$isSuccess = false;
				if(pathinfo(basename($_FILES["cover"]["name"]),PATHINFO_EXTENSION)=="jpg"){
					if(getimagesize($_FILES["cover"]["tmp_name"])){
						if(!move_uploaded_file($_FILES["cover"]["tmp_name"], $uploadTo.$publicationsID.'/cover.jpg')) $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-danger"><strong>Error!</strong> Fail to upload cover image.</div></div></div>';
						else $isSuccess = true;
					} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> File is not an image.</div></div></div>';
				} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Sorry, only JPG files are allowed.</div></div></div>';
			}
			$isSuccess = false;
			if($title&&$type&&$status&&$outline&&$content){
				if($publications->edit($publicationsID,$title,$type,$status,$outline,$content,$datetime)){
					$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> Publications was edited. (Publications ID : '.$publicationsID.')</div></div></div>';
					//mkdir($uploadTo.$publicationsID);
					$isSuccess = true;
				} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to edit publications. Please contact Administrator.</div></div></div>';
			} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Please fill in all fields.</div></div></div>';
			echo "<script>window.top.window.setResult('$result');";
			if($isSuccess) echo "window.top.window.editSuccess();";
			echo "</script>";
		} else {
			if(!$data = $publications->getpublications($publicationsID,'row')) echo "<script>window.top.window.location.reload(1);</script>";
?>
			<form method="POST" id="form" enctype="multipart/form-data" action="?modal=true&page=publications&action=edit&publicationsID=<?php echo $data['publicationsID'];?>" target="operator">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Edit Publications</h4>
					</div>
					<div class="panel-body">
						<div class="col-sm-12" id="result"></div>
						<div class="form-group col-sm-12">
							<label for="title">Title:</label>
							<input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title'];?>">
						</div>
						<div class="form-group col-sm-12">
							<label for="datetimepicker">Date&Time:</label>
							<div class='input-group date'>
								<input type='text' class="form-control" id='datetimepicker' name="datetime" data-format="yyyy-MM-dd hh:mm:ss" />
								<span class="input-group-addon" onclick="$('#datetimepicker').focus();">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="form-group col-sm-12">
							<label for="type">Type:</label><br/>
							<div class="btn-group btn-group-justified" data-toggle="buttons" id="type">
								<label class="btn btn-default<?php echo $data['type']=="S"?' active""':'';?>">
									<input type="radio" name="type" value="S"<?php echo $data['type']=="S"?' checked=""':'';?>>Student's
								</label>
								<label class="btn btn-default<?php echo $data['type']=="I"?' active""':'';?>">
									<input type="radio" name="type" value="I"<?php echo $data['type']=="I"?' checked=""':'';?>>Instructor's
								</label>
							</div>
						</div>
						<div class="form-group col-sm-12">
							<label for="status">Status:</label><br/>
							<div class="btn-group btn-group-justified" data-toggle="buttons" id="status">
								<label class="btn btn-default<?php echo $data['status']=="A"?' active""':'';?>">
									<input type="radio" name="status" value="A"<?php echo $data['status']=="A"?' checked=""':'';?>>Active
								</label>
								<label class="btn btn-default<?php echo $data['status']=="D"?' active""':'';?>">
									<input type="radio" name="status" value="D"<?php echo $data['status']=="D"?' checked=""':'';?>>Draft
								</label>
								<label class="btn btn-default<?php echo $data['status']=="I"?' active""':'';?>">
									<input type="radio" name="status" value="I"<?php echo $data['status']=="I"?' checked=""':'';?>>Inactive
								</label>
							</div>
						</div>
						<div class="form-group col-xs-4">
							<img src="../images/32blank.png" style="background:url('../images/publications/<?php echo $data['publicationsID'];?>/cover.jpg') no-repeat top center;background-size:cover;width:100%;" alt="<?php echo $data['title'];?>" data-url="../images/publications/<?php echo $data['publicationsID'];?>/cover.jpg" class="publicationsImg">
						</div>
						<div class="form-group col-xs-8">
							<label for="cover">Cover Image:</label><br/>
							<input id="cover" type="file" class="file-loading" name="cover" accept="image/jpg">
						</div>
						<div class="form-group col-sm-12">
							<label for="outline">Outline:</label><br/>
							<div class="jumbotron" style="padding:20px;border-radius: 15px;">
								<textarea class="textarea" placeholder="Enter Outline ..." id="outline" name="outline" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;"><?php echo $data['outline'];?></textarea>
							</div>
						</div>
						<div class="form-group col-sm-12">
							<label for="content">Content:</label><br/>
							<div class="jumbotron" style="padding:20px;border-radius: 15px;">
								<textarea class="textarea" placeholder="Enter Content ..." id="content" name="content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;"><?php echo $data['content'];?></textarea>
							</div>
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
				$('.textarea').wysihtml5();
				$("#cover").fileinput({
						initialPreviewAsData: true,
						autoReplace: true,
						maxFileCount: 1,
						allowedFileExtensions: ["jpg"]
				});
				$('#submitBtn').click(function(){$('#form').submit();})
				$(function() {
					$.datetimepicker.setLocale('en');
					$('#datetimepicker').datetimepicker({
						format: 'Y-m-d h:i:00'
					});
				});
				function setResult(t){
					$('#result').html(t);
				}
				function editSuccess(){
					$('#submitBtn,#cancelBtn').prop('disabled', true);
					setTimeout(function(){$('#modalDialog').modal('hide');window.location.reload(1);},3000);
				}
			</script>
<?php
		}
	} elseif($action=='inactive'||$action=='active'){
		$publicationsID = @$_REQUEST['publicationsID'];
		if(@$_POST['submited']){
			$isSuccess = false;
			if($action=='active'){
				if($publications->inactive($publicationsID)){
					$isSuccess = true;
					$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> Publications status was changed to Inactive. (Publications ID : '.$publicationsID.')</div></div></div>';
				} else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to change publications\'s status. Please contact Administrator.</div></div></div>';
			} elseif($action=='inactive'){
				if($publications->active($publicationsID)){
					$isSuccess = true;
					$result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> Publications status was changed to Active. (Publications ID : '.$publicationsID.')</div></div></div>';
				}	else $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to change publications\'s status. Please contact Administrator.</div></div></div>';
			}
			echo "<script>window.top.window.setResult('$result');";
			if($isSuccess) echo "window.top.window.changeSuccess();";
			echo "</script>";
		} else {
			$data = $publications->getpublications($publicationsID,'row');
?>
			<form method="POST" id="form" enctype="multipart/form-data" action="?modal=true&page=publications&action=<?php echo $action=='active'?'inactive':'active';?>&publicationsID=<?php echo $data['publicationsID'];?>" target="operator">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<h4>Make publications <?php echo $action=='active'?'Active':'Inactive';?>.</h4>
					</div>
					<div class="panel-body">
						<div class="col-sm-12" id="result"></div>
						<div style="width:100%;text-align:center;padding-bottom:20px;">
							<img src="../images/32blank.png" style="background:url('../images/publications/<?php echo $data['publicationsID'];?>/cover.jpg') no-repeat top center;background-size:cover;width:50%;" alt="<?php echo $data['title'];?>" data-url="../images/publications/<?php echo $data['publicationsID'];?>/cover.jpg" class="publicationsImg">
						</div>
						<p>Are you sure you want to make "<?php echo $data['title']; ?>", publications's ID : <?php echo $data['publicationsID']; ?> status as <?php echo $action=='active'?'Active':'Inactive';?>?</p>
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
				<h1 class="page-header">Publicatios</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-bullhorn fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $publications->count('S'); ?></div>
								<div>Student's Publications</div>
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
			<div class="col-lg-6 col-md-6">
				<div class="panel panel-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-group fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $publications->count('I'); ?></div>
								<div>Instructor's Publications</div>
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
						Publications List
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
							<thead>
								<tr>
									<th>No.</th>
									<th style="width:100px;">Pic</th>
									<th>Type</th>
									<th>Title</th>
									<th>Outline</th>
									<th style="width:100px;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $publications->getPublicationsListAdmin(); ?>
							</tbody>
						</table>
						<!-- /.table-responsive -->
					</div>
					<!-- /.panel-body -->
					<div class="panel-footer" style="padding-bottom: 30px;">
						<div class="col-md-4 col-md-offset-4">
							<div class="col-xs-4 status" style="border:1px solid black;">Normal</div>
							<div class="col-xs-4 status draft" style="border:1px solid black;">Draft</div>
							<div class="col-xs-4 status inactive" style="border:1px solid black;">Inactive</div>
						</div>
					</div>
					<!-- /.panel-footer -->
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
						<h4 class="modal-title">Publications</h4>
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
			<button type="button" class="btn btn-info btn-circle btn-lg od" data-target="#modalDialog" data-href="?modal=true&page=publications&action=add"><i class="fa fa-plus"></i></button>
		</div>
<?php
	}
 ?>
