<div class="modal-header">
	<h3>View Admin </h3>
</div>
<div class="modal-body"> 
    <!-- front image block -->
    <div class="row">        
        <div class="col-sm-2 col-md-2 admin_pro_img"> 
            <img src="<?php echo(base_url('upload/img/admin/'.$result->image)); ?>" alt="<?php echo $result->first_name ?>" class="img-rounded img-responsive" >
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <!-- first name -->
                <p><?php echo $result->first_name; ?>&nbsp;<?php echo $result->last_name; ?></p> 
                <!-- telphoen -->
                <small title="Telphone number">+94<?php echo $result->mobile_no ?></small>
                <!-- city -->
                <small><cite title="Address"><?php echo $result->adress_1 ?> &nbsp; <?php echo $result->adress_street ?>  </cite></small>
                <!-- town -->
                <small title="Town"><?php echo $result->town_name ?><i class="glyphicon glyphicon-map-marker"></i></small>
            </blockquote>
        </div>
    </div><!-- /.row -->
	<table class="table ">
		
        <tr>
            <td><label>User name</label></td>
            <td><label><?php echo $result->user_name ?></label></td>
        </tr>
 
        <tr>
            <td><label>Email</label></td>
            <td><label><?php echo $result->email ?></label></td>
        </tr>
        <tr>
            <td><label>Status</label></td>
            <td><label><?php echo  status_manager($result->status);; ?> </label></td>
        </tr>

        <tr>
            <td><label>Auth</label></td>
            <td><label><?php echo $result->auth ?></label></td>
        </tr>
 

<!--         <tr>
    <td><label>User type</label></td>
    <td><label><?php echo $result->user_type ?></label></td>
</tr> -->
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/admin'.'/edit/'.$result->admin_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/admin')) , 'Home', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
