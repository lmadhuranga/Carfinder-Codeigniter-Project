<div class="modal-header">
	<h3>View Inform car </h3>
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
            <td><label>Picke near town</label></td>
            <td><label><?php echo $result->town_id ?></label></td>
        </tr>

        <tr>
            <td><label>From address</label></td>
            <td><pre><?php echo $result->address_1 ?></pre></td>
        </tr>

        <?php if ($result->address_2!=''): ?>
            <tr>
                <td><label>To address</label></td>
                <td><pre><?php echo $result->address_2 ?></pre></td>
            </tr>
        <?php endif ?>

        <tr>
            <td><label>Telephone</label></td>
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

        <?php if ($result->admin_note!=''): ?>
            <tr>
                <td><label>Note</label></td>
                <td><pre><?php echo $result->admin_note ?></pre></td>
            </tr>
        <?php endif ?>

        <tr> 
            <td><label>Status</label></td>
            <td><label><?php echo  status_manager($result->status);?></label></td>
        </tr>
 
        <tr>
            <td><label>Picking driver </label></td>
            <td><label><?php echo anchor('admin/driver/view/'.$result->driver_id, $result->driver_name);  ?></label></td>
        </tr> 

        <tr>
            <td><label>Added admin user </label></td> 
            <td><label><?php echo anchor('admin/admin/view/'.$result->admin_id, $result->admin_name);  ?></label></td>
        </tr>

        <?php if ($result->website_booking_id!=''): ?>
            <tr>
                <td><label>Website booking link</label></td>
                <td><label><?php echo linkme($result->website_booking_id,'Visit link')  ?></label></td>
            </tr>
        <?php endif ?>

    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/inform_car'.'/edit/'.$result->inform_car_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/inform_car')) , 'Inform car list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
