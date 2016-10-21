<?php
$action = @$_REQUEST['action'];
if($action=='add'){

} elseif($action=='edit'){

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
                        <i class="fa fa-bullhorn fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo 0; ?></div>
                        <div>Uni-News</div>
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
                        <div class="huge"><?php echo 0; ?></div>
                        <div>Local-News</div>
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
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo 0; ?></div>
                        <div>Events</div>
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
<div class="share-wrapper">
  <button type="button" class="btn btn-info btn-circle btn-lg" id="addinstructor"><i class="fa fa-plus"></i></button>
</div>
<?php
}
?>
