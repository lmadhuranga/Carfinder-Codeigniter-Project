<div class="modal-header">
    <h3>View Website package </h3>
</div>
<div class="modal-body">
    
        
<!--         <tr>
    <td><label>Admin </label></td>
    <td><label><?php echo $website_package->admin_id ?></label></td>
</tr>
 -->
        <div class="row">
            <div class="col-md-6">
                <?php if (!(($website_package->image=='default.jpg')||($website_package->image==''))): ?>
                    <tr> 
                        <td colspan="2">
                            <div class="thumbnail">
                                <img  src='<?php echo(base_url('upload/img/website_package/'.image_set_value($website_package->image))); ?>'  style="  height: 200px;">
                                <!-- <div class="caption">
                                    <h3>Package : &nbsp; <?php echo $website_package->title ?></h3>
                                </div> -->
                            </div>
                        </td> 
                    </tr>
                <?php endif ?>
                
            </div>
            <div class="col-md-6">
                <table class="table ">
                    <tr>
                        <td><label>Title</label></td>
                        <td><label><?php echo $website_package->title ?></label></td>
                    </tr>

                    <tr>
                        <td><label>Pub date</label></td>
                        <td><label><?php echo $website_package->pub_date ?></label></td>
                    </tr>
                    
                    <?php if ($website_package->exp_date!='0000-00-00 00:00:00'): ?>
                        <tr>
                            <td><label>Exp date</label></td>
                            <td><label><?php echo $website_package->exp_date ?></label></td>
                        </tr>
                    <?php endif ?>


                    <tr>
                        <td><label>Content</label></td>
                        <td><content><?php echo $website_package->content ?></content></td>
                    </tr>

                    <tr>
                        <td><label>Status</label></td>
                        <td><label><?php echo ($website_package->status=="A")?("Availabel"):("Expired")?></label></td>
                    </tr>
             
                </table>
                
            </div>
        </div>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php //echo anchor((site_url('admin/website_package'.'/edit/'.$website_package->website_package_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('website_package')) , 'Back', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
