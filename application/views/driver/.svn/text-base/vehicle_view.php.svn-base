
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
                <small><cite title="Current location"><i class="glyphicon glyphicon-map-marker"></i></cite></small>
                <small><cite title="Brand"><?php echo $result->brand_name ?><i class="glyphicon glyphicon-map-marker"></i></cite></small>
                <small><cite title="Energy type"><?php echo $result->fuel_type ?><i class="glyphicon glyphicon-map-marker"></i></cite></small>
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
        <?php //echo anchor((site_url('driver/vehicle'.'/edit/'.$result->vehicle_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
        <?php echo anchor((site_url('driver/vehicle')) , 'Vehicle list', array('class'=>'btn btn-default')); ?>
    </div>
    <!-- right footer  -->
    <div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>

