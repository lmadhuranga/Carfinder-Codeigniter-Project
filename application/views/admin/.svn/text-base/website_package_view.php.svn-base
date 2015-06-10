<div class="modal-header">
	<h3>View Website package </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
<!--         <tr>
    <td><label>Admin </label></td>
    <td><label><?php echo $result->admin_id ?></label></td>
</tr>
 -->
        <tr>
            <td><label>Title</label></td>
            <td><label><?php echo $result->title ?></label></td>
        </tr>

        <tr>
            <td><label>Pub date</label></td>
            <td><label><?php echo $result->pub_date ?></label></td>
        </tr>

        <tr>
            <td><label>Exp date</label></td>
            <td><label><?php echo $result->exp_date ?></label></td>
        </tr>

        <?php if (!(($result->image=='default.jpg')||($result->image==''))): ?>
            <tr> 
                <td colspan="2">
                    <div class="thumbnail">
                        <img  src='<?php echo(base_url('upload/img/website_package/'.image_set_value($result->image))); ?>'  style="  height: 150px;">
                        <div class="caption">
                            <h3>Package : &nbsp; <?php echo $result->title ?></h3>
                        </div>
                    </div>
                </td> 
            </tr>
        <?php endif ?>

        <tr>
            <td><label>Content</label></td>
            <td><content><?php echo $result->content ?></content></td>
        </tr>

        <tr>
            <td><label>Status</label></td>
            <td><label><?php echo ($result->status=="A")?("Active"):("Inactive")?></label></td>
        </tr>

        <tr>
            <?php $type_array = array('1'=>'Wedding','2'=>'Taxi'); ?>
            <td><label>Type</label></td>
            <td><label><?php echo  $type_array[$result->type]; ?></label></td>
        </tr>
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/website_package'.'/edit/'.$result->website_package_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/website_package')) , 'Website package list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
