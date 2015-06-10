<style>
.driver_pro_img{
    
}
</style>
<div class="modal-header">
    <h3>View Driver </h3>
</div>
<div class="modal-body">

    <div class="row">        
        <div class="col-sm-2 col-md-2 driver_pro_img"> 
            <img src="<?php echo(base_url('upload/img/driver/'.$result->image)); ?>" alt="<?php echo $result->first_name ?>" class="img-rounded img-responsive" >
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <p><?php echo $result->first_name; ?>&nbsp;<?php echo $result->last_name; ?></p> 
                <small title="Telphone number">+94<?php echo $result->m_tel ?></small>
                <small><cite title="Address"><?php echo $result->address_1 ?> &nbsp; <?php echo $result->address_2 ?>  <i class="glyphicon glyphicon-map-marker"></i></cite></small>
            </blockquote>

        </div>
    </div><!-- /.row -->
        <table class="table table-bordered">

            <tr>
                <td><label>User name</label></td>
                <td><label><?php echo $result->user_name ?></label></td>
            </tr>


            <tr>
                <td><label>Nic</label></td>
                <td><label><?php echo $result->nic ?></label></td>
            </tr>

            <tr>
                <td><label>Licen no</label></td>
                <td><label><?php echo $result->licen_no ?></label></td>
            </tr>

            <tr>
                <td><label>License Type</label></td>
                <td><label><?php echo status_manager($result->license_type); ?></label></td>
            </tr>


            <tr>
                <td><label>Home tel</label></td>
                <td><label><?php echo $result->h_tel ?></label></td>
            </tr>
            <!-- 
            <tr >
            <td><label>Auth code</label></td>
            <td><label><?php echo $result->auth_code ?></label></td>
            </tr> -->

            <tr>
                <td><label>Status</label></td>
                <td><label><?php echo status_manager($result->status); ?> </label></td>
            </tr>

            <tr>
                <td><label>Dob</label></td>
                <td><label><?php echo $result->dob ?></label></td>
            </tr>
            <?php if ($result->leave_date!='0000-00-00 00:00:00'): ?>
                <tr>
                    <td><label>Leave date</label></td>
                    <td><label><?php echo $result->leave_date ?></label></td>
                </tr>
            <?php endif ?>

            <?php if ($result->licen_expire_date!='0000-00-00 00:00:00'): ?>
            <tr>
                <td><label>Licen expire date</label></td>
                <td><label><?php echo $result->licen_expire_date ?></label></td>
            </tr>
            <?php endif ?>
        </table>

</div>
<div class="modal-footer" class="clearfix">
    <!-- left footer -->
    <div class="pull-left">
        <?php // echo anchor((site_url('driver/driver'.'/edit/'.$result->driver_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
        <?php echo anchor((site_url('driver/driver')) , 'Cancel', array('class'=>'btn btn-default')); ?>
    </div>
    <!-- right footer  -->
    <div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
