<?php
  require_once '../class/news.php';
  $news = new news();
  $uploadTo = '../images/news/';
  chmod($uploadTo, 0777);
  $result;
  if(@$_POST['submited']){
    $title = @$_POST['title'];
    $type =@$_POST['type'];
    $status =@$_POST['status'];
    $cover =@basename($_FILES["cover"]["tmp_name"]);
    $outline =@$_POST['outline'];
    $content =@$_POST['content'];
    if($title&&$type&&$status&&$cover&&$outline&&$content){
      if(pathinfo(basename($_FILES["cover"]["name"]),PATHINFO_EXTENSION)=="jpg"){
        if(getimagesize($_FILES["cover"]["tmp_name"])){
          if($newsID = $news->add($title,$type,$status,$outline,$content)){
            $result = '<div class="row"><div class="col-lg-12"><div class="alert alert-success"><strong>Success!</strong> News was added. (News ID : '.$newsID.')</div></div></div>';
            mkdir($uploadTo.$newsID);
            if(!move_uploaded_file($_FILES["cover"]["tmp_name"], $uploadTo.$newsID.'/cover.jpg')) $result .= '<div class="row"><div class="col-lg-12"><div class="alert alert-danger"><strong>Error!</strong> Fail to upload cover image.</div></div></div>';
          } else $result = '<div class="row"><div class="col-lg-12"><div class="alert alert-Danger"><strong>Error!</strong> Fail to add news. Please contact Administrator.</div></div></div>';
        } else $result = '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> File is not an image.</div></div></div>';
      } else $result = '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Sorry, only JPG files are allowed.</div></div></div>';

    } else $result = '<div class="row"><div class="col-lg-12"><div class="alert alert-warning"><strong>Warning!</strong> Please fill in all fields.</div></div></div>';
  }
?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add News</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <?php echo $result; ?>
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" id="form" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="form-group">
                <label for="type">Type:</label><br/>
                <div class="btn-group btn-group-justified" data-toggle="buttons" id="type">
                    <label class="btn btn-default">
                        <input type="radio" name="type" value="U">Uni-News
                    </label>
                    <label class="btn btn-default">
                        <input type="radio" name="type" value="D">Local-News
                    </label>
                    <label class="btn btn-default">
                        <input type="radio" name="type" value="E">Events
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
              <button type="button" class="btn btn-primary" id="submitBtn">Save</button>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#cancelConfirm">Cancel</button>
            </form>
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
                        <button type="button" class="btn btn-default" id="cancelBtn">Yes</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
