<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Edit Website booking</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Website_booking</h2> -->


	<?php echo $custom_error; ?>

    <input type="hidden" value="<?php echo $result->website_booking_id; ?>" id="website_booking_id" name="website_booking_id">
    <input type="hidden" value="<?php echo $current_user_id; ?>" id="admin_id" name="admin_id">

    <div class="control-group">
        <label class="control-label" for="title">Title<span class="required">*</span></label>                                
        <div class="controls"> 
            <?php echo
                form_dropdown('title', array(''=>'Select title','Mr'=>'Mr','Miss'=>'Miss','Mis'=>'Mis'),$result->title,''); 
            ?>
            <?php echo form_error('title','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



    <div class="control-group">
        <label class="control-label" for="first_name">First name<span class="required">*</span></label>                     
        <div class="controls">
            <input id="first_name" name="first_name" type="text" value="<?php echo $result->first_name ?>"  maxlength="45"  required='required'/>
            <?php echo form_error('first_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="last_name">Last name</label>                                
        <div class="controls">
            <input id="last_name" name="last_name" type="text" value="<?php echo $result->last_name ?>"  maxlength="45" />
            <?php echo form_error('last_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



    <div class="control-group">
        <label for="town_id">Pick Nearest Town<span class="required">*</span></label> 
        <div class="controls">
            <?php 
                $CI->load->model('town_model');
                echo $CI->town_model->get_as_dropdown('town_id',$result->town_id,array('town_id','name'),'Town','');
            ?>
            <?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
       <label for="address_1">From<span class=""></span></label> 
        <div class="controls">
             <textarea  id="address_1" name="address_1"   style="width:100%"><?php echo $result->address_1; ?></textarea>
            <?php echo form_error('address_1','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 


    <div class="control-group">
       <label for="address_2">To<span class=""></span></label> 
        <div class="controls">
             <textarea  id="address_2" name="address_2"   style="width:100%"><?php echo $result->address_2; ?></textarea>
            <?php echo form_error('address_2','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 


    <div class="control-group">
        <label class="control-label" for="m_tel">Telephone<span class="required">*</span></label>               
        <div class="controls">
            <input id="m_tel" name="m_tel" type="text" value="<?php echo $result->m_tel ?>"  maxlength="15"  required='required'/>
            <?php echo form_error('m_tel','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="email">Email</label>                                
        <div class="controls">
            <input id="email" name="email" type="email" class="form-control" value="<?php echo $result->email ?>"  maxlength="45" />
            <?php echo form_error('email','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="request_date">Request date<span class="required">*</span></label>       
        <div class="controls">
            <input id="request_date" name="request_date" type="text" value="<?php echo $result->request_date ?>"  maxlength=""  required='required'/>
            <?php echo form_error('request_date','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="request_time">Request time</label>                                
        <div class="controls">
            <input id="request_time" name="request_time" type="text" value="<?php echo $result->request_time ?>"  maxlength="" />
            <?php echo form_error('request_time','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



    <?php if (trim($result->note)!=''): ?>
        <div class="control-group">
           <label for="note">Customer note<span class=" "></span></label> 
            <div class="controls">
                  <pre><?php echo $result->note ?></pre>
                <?php echo form_error('note','<div class="ci_error">','</div>'); ?>
                <p class="help-block"></p>
            </div>
        </div> 
    <?php endif ?>



    <div class="control-group">
        <label class="control-label" for="status">Status</label>                                
        <div class="controls">
            <?php echo
                form_dropdown('status', array(''=>'Select Status','R'=> 'Read only', 'SV'=> 'Send a Vehicle', 'I'=> 'Ignore','IT'=>'Informed the Vehicle'), $result->status,''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="user_verify">User verify</label>                                
        <div class="controls">
            <?php echo
                form_dropdown('user_verify', array(''=>'User verify status','VU' =>' Valid User', 'IVU' =>'In valid user' ), $result->user_verify,''); 
            ?>
            <?php echo form_error('user_verify','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="admin_note">Admin note</label> 
        <div class="controls">
            <textarea  id="admin_note" name="admin_note"   style="width:100%"><?php echo $result->admin_note; ?></textarea>
            <?php echo form_error('admin_note','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

 
    <div class="modal-footer">
        <div class="clearfix">
         <div class="pull-left">
            <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
            <?php echo anchor((site_url('admin/website_booking')) , 'Website booking list', array('class'=>'btn btn-default')); ?>
        </div>
        <div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
        </div>
    </div>
<?php echo form_close(); ?>

