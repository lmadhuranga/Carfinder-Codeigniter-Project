<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $meta_title ?></title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url('asset/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo base_url('asset/css/plugins/morris/morris-0.4.3.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/css/plugins/timeline/timeline.css') ?>" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url('asset/css/sb-admin.css') ?>" rel="stylesheet">
    <style>
        /*Ci form errors*/
        .form_error{
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;

        }
        .ci_error{
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
        .thum_img>img {
            width: 28px;
            border-radius: 32px;
        }
    </style>

    <script src="<?php echo base_url('asset/js/jquery-1.11.0.js') ?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.ui.widget.js') ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(jQuery) {
            
            jQuery('.control-group').addClass('form-group');
            jQuery('.control-group').removeClass('control-group');

            jQuery('.controls').removeClass('controls');

            jQuery('.form-group').find('input:text').addClass('form-control');
            // set width
            
            
            // set class to dropdown
            jQuery('.form-group').find('select').addClass('form-control');

            // jQuery('.form-group').find('input:email').addClass('form-control');

            jQuery('[type=number]').addClass('form-control');

            
        });
    </script>
 
</head>

<body>