<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>View Website booking </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
        <tr>
            <td><label>Title</label></td>
            <td><label><?php echo $result->title ?></label></td>
        </tr>

        <tr>
            <td><label>First name</label></td>
            <td><label><?php echo $result->first_name ?></label></td>
        </tr>

        <tr>
            <td><label>Last name</label></td>
            <td><label><?php echo $result->last_name ?></label></td>
        </tr>

        <tr>
            <td><label>From town</label></td>
            <td>
                <label>
                    <a href="<?php echo(site_url('admin/town/view/'.$result->town_id)); ?>">
                        <?php echo $result->town_name ?>
                    </a>
                </label>
            </td>
        </tr>

        <tr>
            <td><label>From </label></td>
            <td><label><?php echo $result->address_1 ?></label></td>
        </tr>

        <tr>
            <td><label>To</label></td>
            <td><label><?php echo $result->address_2 ?></label></td>
        </tr>


        <tr>
            <td><label>Telephone number</label></td>
            <td><label><?php echo $result->m_tel ?></label></td>
        </tr>

        <tr>
            <td><label>Request date</label></td>
            <td><label><?php echo $result->request_date ?></label></td>
        </tr>

        <tr>
            <td><label>Request time</label></td>
            <td><label><?php echo $result->request_time ?></label></td>
        </tr>

        <tr>
            <td><label>Customer Note</label></td>
            <td><pre><?php echo $result->note ?></pre></td>
        </tr>

        <tr>
            <td><label>Email</label></td>
            <td><label><?php echo emailto($result->email) ?></label></td>
        </tr>

        <tr> 
            <td><label>Status</label></td>
            <td><label><?php echo status_manager($result->status); ?></label></td>
        </tr>

        <tr> 
            <td><label>User verify</label></td>
            <td><label><?php echo status_manager($result->user_verify);?></label></td>
        </tr>


        <tr>
            
            <td><label>View by Admin </label></td>
            <td>
                <label>
                    <a href="<?php echo(site_url('admin/admin/view/'.$result->admin_id)); ?>">
                        <?php 
                            $CI->load->model('admin_model');  
                            echo $CI->admin_model->get('first_name',$result->admin_id,true,1)->first_name;
                        ?>
                    </a>
                </label>
            </td>
        </tr>


        <tr>
            <td><label>Admin note</label></td>
            <td><pre><?php echo $result->admin_note ?></pre></td>
        </tr>
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/website_booking'.'/edit/'.$result->website_booking_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/website_booking')) , 'Website booking list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
