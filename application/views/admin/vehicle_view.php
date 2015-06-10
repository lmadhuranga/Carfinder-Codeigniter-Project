<style>
    .vehicle_img>img{
 
       
    }

    .vehicle-color{
        background-color: <?php echo $result->color; ?>; 
        width: 30px;
        height: 30px;
        border: solid black 2px;
    }


</style>
 

<div class="modal-header">
	<h3>View Vehicle </h3>
</div>
<div class='modal-body'>

    <div class="row">        
        <div class="col-sm-3 col-md-5 vehicle_img"> 
            <img src="<?php echo(base_url('upload/img/vehicle/'.$result->image)); ?>" alt="<?php echo $result->register_no ?>" class="img-rounded img-responsive" >
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <p><?php echo $result->register_no ?></p>  
                <small><cite title="Current location">Current city <i class="glyphicon glyphicon-map-marker"></i></cite></small>
                <small><cite title="Brand"><?php echo $result->brand_name ?><i class="glyphicon glyphicon-map-marker"></i></cite></small>
                <small><cite title="Energy type"><?php echo $result->fuel_type ?><i class="glyphicon glyphicon-map-marker"></i></cite></small>
                <small><cite title="Address">Current city <i class="glyphicon glyphicon-map-marker"></i></cite></small>
            </blockquote>

        </div>
    </div><!-- /.row -->


    <!-- /.end vehicle_img -->
    <table class="table table-bordered">
        <tr>
            <td><label>Register no</label></td>
            <td><label><?php echo $result->register_no ?></label></td>
        </tr>
   
        <tr>
           
            <td><label>Color</label></td>
            <td><div class="vehicle-color"></div></td>
        </tr>
     
        <tr>
            <td><label>Tank liter</label></td>
            <td><label><?php echo $result->tank_liter ?></label></td>
        </tr>
    
        <tr>
            <td><label>Brand</label></td>
            <td><label><?php echo $result->brand_name ?></label></td>
        </tr>
    
        <tr>
            <td><label>Vehicle type</label></td>
            <td><label><?php echo $result->vehicle_type ?></label></td>
        </tr>

        <tr>
            <td><label>Current Meter value</label></td>
            <td><label><?php echo $result->meter_value ?></label></td>
        </tr>
    
        <tr>
            <td><label>Last serviced meter km</label></td>
            <td><label><?php echo $result->starting_km ?></label></td>
        </tr>
    
        <tr>
            <td><label>Next Maintainable km</label></td>
            <td><label><?php echo $result->maintain_km ?></label></td>
        </tr>
    
        <tr>
            <?php $remain_km_sum = (int)$result->meter_value-(int)$result->starting_km-(int)$result->maintain_km; ?>
            <td><label>Remain km for service</label></td>
            <td>
                <label> 
                    <?php if ($remain_km_sum>1000): ?>
                        <span class="label label-success"><?php echo $remain_km_sum ?></span>
                    <?php elseif(($remain_km_sum<1000)&&(500<$remain_km_sum)): ?>
                        <span class="label label-warning"><?php echo $remain_km_sum ?></span>
                    <?php else: ?>
                        <span class="label label-danger"><?php echo $remain_km_sum ?></span>
                    <?php endif; ?> 
                </label>
            </td>
        </tr>
        
  

   <!--  
       <tr>
           <td><label>Auth</label></td>
           <td><label><?php echo $result->auth ?></label></td>
       </tr>
    -->
        <tr>
            <td><label>Status</label></td>
            <td>
                <label><?php echo status_manager($result->status); ?> </label>
            </td>
        </tr>
    
        <tr>
            <td><label>Fuel type</label></td>
            <td><label><?php echo $result->fuel_type ?></label></td>
        </tr>
    </table>

    
</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/vehicle'.'/edit/'.$result->vehicle_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/vehicle')) , 'Vehicle list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>

