<?php

class Website_booking extends Frontend_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');        
        $this->load->helper(array('form','url','codegen_helper'));
        $this->load->model('website_booking_model');
    }   
 
    /*************************Start Function ajax_add()****************/
    //Owner : Madhuranga Senadheera
    //  
    //@ type :
    //#return type :
    function ajax_add()
    {    
        // json array
        $json_return_array = array('msg'=>'','status'=>'');

        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->website_booking_model->home_quicbokking);
        if ($this->form_validation->run() == false)
        { 
             $json_return_array['msg'] = validation_errors(); 
             $json_return_array['status'] = 'error'; 
             $json_return_array['status_code'] = 'validation_errors'; 
        }
        else
        {
            // /get post data to array
            $data = $this->post_get_as_array(array('title','first_name','last_name','m_tel','address_1','town_id','address_2','request_date','request_time'));
 
            // $data['jsondata'] = $data;
            $json_return_array['jsondata'] = $data;

            // data save
            if ($this->website_booking_model->save($data) == TRUE)
            {
                $json_return_array['msg'] = 'Successfully updated'; 
                $json_return_array['status'] = 'success'; 
                $json_return_array['status_code'] = 'data_inserted';
            }
            else
            {
                // no save error display
                $json_return_array['msg'] = 'Unsuccessfully operation'; 
                $json_return_array['status'] = 'error'; 
                $json_return_array['status_code'] = 'data_not_insert';

            }
            
            
        } 
        // return json object for mobile
        echo(json_encode($json_return_array));
        exit();

    
    }//Function End ajax_add()----------------------------------FUNEND()
            
        
     
}

/* End of file website_booking.php */
/* Location: ./system/application/controllers/website_booking.php */