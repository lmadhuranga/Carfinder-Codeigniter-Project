<div class="modal-header">
	<h3>View Website news </h3>
</div>
<div class="modal-body">
 
    <h2><?php echo $result->title ?></h2>
	<table class="table ">
		
        <tr>
            <td><label>Content</label></td>
            <td><?php echo $result->content ?></td>
        </tr>

        <tr>
            <td><label>Pub date</label></td>
            <td><label><?php echo $result->pub_date ?></label></td>
        </tr>

        <tr>
            <td><label>Status</label></td>
            <td><label><?php echo ($result->status=="A")?("Active"):("Inactive") ?></label></td>
        </tr>

        <tr>
            <td><label>Exp date</label></td>
            <td><label><?php echo $result->exp_date ?></label></td>
        </tr>
    </table>
    
</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/website_news'.'/edit/'.$result->website_news_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/website_news')) , 'Website news list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
