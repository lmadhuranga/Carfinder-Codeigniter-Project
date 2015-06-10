<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');




function p($a)
{
    echo '<pre>';
    print_r($a);
    echo '</pre>';

}
function v($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';

}


function clean_header($array){
    $CI = get_instance();
    $CI->load->helper('inflector');
    foreach($array as $a){
        $arr[] = humanize($a);
    }
    return $arr;
}

function reduce_word_length($word,$length=9)
{
    return substr_replace($word,'',0,($length));
}

function emailto($email,$text=null)
{
    if ($text==null) {
        
        return "<a href='mailto:".$email."' alt='".$email."'>".$email."<a/>";
    }
    else
    {
        return "<a href='mailto:".$email."' alt='".$text."'>".$text."<a/>";
    }
}

function linkme($link,$text=null)
{
    if ($text==null) {
        
        return "<a href='".$link."' alt='".$link."'>".$link."<a/>";
    }
    else
    {
        return "<a href='".$link."'  alt='".$text."'>".$text."<a/>";
    }
}


function erro_suclink($link,$text=null)
{
    if ($text==null) {
        
        return "<a href='".$link."' alt='".$link."'>".$link."<a/>";
    }
    else
    {
        return "<a href='".$link."'  alt='".$text."'>".$text."<a/>";
    }
}

// set value replace by this
function image_set_value($path,$default='default.jpg')
{
    $path = trim($path);
    if (empty($path))                  // comment here  
    {
        return  $default;
    }
    else                    // comment here
    {
        return $path;
    } 
}



/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          Description
 * @return_type                     Money formting
 */
function money_formator($value)
{
    return 'Rs '.$value.' /=';
}
/*---------------- ---------End of money_formator()---------------------------*/


 
 /**
  * @author                          Madhuranga Senadheera
  * Purpose of the function          get time form date
  * @return_type                     return_type
  */
function get_time_24($date_with_time)
{ 
    $phpdate = strtotime( $date_with_time );
    return date('H:i', $phpdate );
}
 /*---------------- ---------End of get_time()---------------------------*/
 
 
 /**
  * @author                          Madhuranga Senadheera
  * Purpose of the function          get time form date with am pm
  * @return_type                     return_type
  */
function get_time_12($date_with_time)
{ 
    $phpdate = strtotime( $date_with_time );
    return date('h:i a', $phpdate );
}
 /*---------------- ---------End of get_time()---------------------------*/
 


 

/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          Set status per label
 * @return_type                     return_type
 */
function status_manager($status)
{
    if (is_null($status)||empty($status)) {
        return '<span class="label label-default">none</span class="label">';
    } $status_array = array(
                            'A' => 'Available',
                            'ADVANCE' => 'Advance',
                            'B' => 'Break down',
                            'C' => 'Cancel',
                            'D' => 'Delete',
                            'H' => 'Hire',
                            'HEAVY' => 'Hire',
                            'I' => 'Not available',
                            'IVU' =>'In valid user',
                            'L' => 'Lite',
                            'LITE' => 'Lite',
                            'LOAN'=>'Loan',
                            'IT'=>'Informed the Vehicle',
                            'O' => 'Offline',
                            'P' => 'Publish',
                            'N' => 'Not Publish',
                            'NTR' => 'Not Read',
                            'R' => 'Read',
                            'S'=> 'Send a Vehicle', 
                            'SV'=> 'Send a Vehicle', 
                            'SALARY' =>'Salary',
                            'VU' =>' Valid User',
                            'W'=> 'Heavy',
                            );
    switch ($status)
    { 

        case 'A':
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;

        case 'ADVANCE':
            return '<span class="label label-warning">'.$status_array[$status].'</span class="label">';
            break;

        case 'B':
            return '<span class="label label-default">'.$status_array[$status].'</span class="label">';
            break;

        case 'C':
            return '<span class="label label-warning">'.$status_array[$status].'</span class="label">';
            break;

        case 'D':
            return '<span class="label label-danger">'.$status_array[$status].'</span class="label">';
            break;

        case 'H':
            return '<span class="label label-default">'.$status_array[$status].'</span class="label">';
            break;

        case 'I':
            return '<span class="label label-danger">'.$status_array[$status].'</span class="label">';
            break;

        case 'IVU':
            return '<span class="label label-danger">'.$status_array[$status].'</span class="label">';
            break;

        case 'IT':
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;

        case 'O':
            return '<span class="label label-default">'.$status_array[$status].'</span class="label">';
            break;
            
        case 'L':
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;
            
        case 'LOAN':
            return '<span class="label label-danger">'.$status_array[$status].'</span class="label">';
            break;


        case 'P':
            return '<span class="label label-default">'.$status_array[$status].'</span class="label">';
            break;

        case 'N':
            return '<span class="label label-default">'.$status_array[$status].'</span class="label">';
            break;

        case 'NTR':
            return '<span class="label label-default">'.$status_array[$status].'</span class="label">';
            break;

        case 'R':
            return '<span class="label label-default">'.$status_array[$status].'</span class="label">';
            break;
    
        case 'S':
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;

        case 'SV':
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;

        case 'SALARY':
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;

        case 'VU':
            return '<span class="label label-warning">'.$status_array[$status].'</span class="label">';
            break;

        case 'W':
            return '<span class="label label-warning">'.$status_array[$status].'</span class="label">';
            break;

        default:
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;
        /*
         <span class="label label-default">Default</span>
        <span class="label label-primary">Primary</span>
        <span class="label label-success">Success</span>
        <span class="label label-info">Info</span>
        <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span>*/
    }
}
/*---------------- ---------End of status_manager_()---------------------------*/



/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          get month name when given month id
 * @return_type                     return_type
 */
function get_month_name($id)
{
    $array_month_name = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    return $array_month_name[($id-1)];
}
/*---------------- ---------End of get_month_name()---------------------------*/


/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          Send email 
 * @return_type                     return_type
 */
/*public function send_email($to,$subject,$content,$debug_enable=NULL)
{
    $config['protocol'] = 'sendmail';
    $config['mailpath'] = '/usr/sbin/sendmail';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;

    $CI->email->initialize($config);

    $CI->load->library('email');

    $CI->email->from('senadheera@gmail.com', 'Senadheera Taxi');
    $CI->email->to($to); 

    $CI->email->subject($subject);
    $CI->email->message($content);  

    return (bool)$CI->email->send();

    if ($debug_enable!=NULL) {
        echo $CI->email->print_debugger();
    }
    
}*/
/*---------------- ---------End of send_email()---------------------------*/
