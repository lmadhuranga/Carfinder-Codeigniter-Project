<?php $this->load->view('template/driver/header'); ?>
<div class="modal show">
      <div class="modal-dialog" style="">
        <div class="modal-content">
          <?php $this->load->view($sub_view,$result); // Subview is set in controller ?> 
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<?php  $this->load->view('template/driver/footer'); ?>    