<?php

class Chat extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('chat_model');
	}	
	
      
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          add chat using ajax
     * @return_type                     json
     */
    public function ajax_add()
    {
        $json_return_array = array();
        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->chat_model->rules);
        if ($this->form_validation->run() == false)
        {
            
            // validation error
            $json_return_array['msg']       = 'Please fill requered field';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors();
            $json_return_array['error_code']= 'validation_faile';
            
        }
        else
        {

            // get form data
            $data = $this->post_get_as_array(array('massage'));
            $data['driver_id'] =$this->driver_model->get_current_user_id();

            // data save in db
            if ($this->chat_model->save($data))
            {
                $json_return_array['msg']           = 'System success fully updated';
                $json_return_array['status']        = 'success'; 
                $json_return_array['success_status']= 'system_update_success'; 
            }
            else
            {
                // data not save in db 
                $json_return_array['msg']       = 'System update unsuccess';
                $json_return_array['status']    = 'error';
                $json_return_array['error_code']= 'system_update_unsuccessfull'; 
            }
        }
        // return the massage
        echo(json_encode($json_return_array));
        exit();
    }
    /*---------------- ---------End of ajax_add()---------------------------*/
    

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get last 10 chat list
     * @return_type                     json
     */
    public function ajax_get()
    {
        $json_return_array = array();
        // load form valition
        // formt the json object
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('last_read_chat_id', 'Last chat ID', 'trim|required|max_length[12]|xss_clean');

        if ($this->form_validation->run()==false)
        {   
            // validation error
            $json_return_array['msg']       = 'Please fill requered field';
            $json_return_array['status']    = 'error';
            $json_return_array['validation_msg'] = validation_errors();
            $json_return_array['error_code']= 'validation_faile';
            
        }
        else
        {
            $last_read_chat_id = $this->input->post('last_read_chat_id');

 
            $result = $this->chat_model->get_with_join_driver($last_read_chat_id,'chat.chat_id,chat.admin_id, admin.first_name as admin_name,chat.driver_id,driver.last_name as driver_name,massage,driver.status,read,driver.image as driver_image, chat.created', $ID=NULL,FALSE,10,0);
            if (count($result)>0) {
                # code...
                foreach ($result as $key => $value) {
                    $result[$key]['created'] = get_time_12($result[$key]['created']);
                    if (!is_null($result[$key]['admin_id'])) 
                    {
                        $result[$key]['user_name'] = 'Admin';
                        $result[$key]['user_type'] = 'admin';
                    }
                    elseif(!is_null($result[$key]['driver_id'])) 
                    {
                        $result[$key]['user_name'] = $value['driver_name'];
                        $result[$key]['user_type'] = 'driver';
                    }
                    else
                    {
                        unset($result[$key]);
                    }
                }
                $json_return_array['status']    = 'success';
                // get last 10 chat convertions
                $json_return_array['chat_history']= $result;
            }
            else
            {
                 // validation error
                $json_return_array['msg']       = 'No chat data';
                $json_return_array['status']    = 'no_data';
                $json_return_array['error_code']= 'no_data';
            }

        }
 

        
        // var_dump($json_return_array);

        echo(json_encode($json_return_array));
        exit();
    }
    /*---------------- ---------End of ajax_add()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @return_type                     return_type
     */
    public function test()
    {
        echo get_time_12('2014-08-18 18:53:36');
    }
    /*---------------- ---------End of test()---------------------------*/
    

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get list of journey list
     * @return                          json
     */
    // public function ajax_get()
    // {
    //     // json array
    //     $json_return_array = array('msg'=>'','status'=>'');
    //     $data = $this->chat_model->get_with_join(array('chat_id','admin.first_name as admin_name','driver.first_name as driver_name','massage','status','read','created'),NULL,FALSE,10);

    //     if (count($data)) {
    //         $json_return_array['chats'] = $data;
    //     }
    //     else
    //     {
    //         $json_return_array['msg'] = 'no data';
    //         $json_return_array['status'] = 'no_data';
    //         $json_return_array['error_code'] = 'no_data';

    //     }
        
    //     echo(json_encode($json_return_array));

    // }
    /*---------------- ---------End of ajax_get_journey_list()---------------------------*/
   


}

/* End of file chat.php */
/* Location: ./system/application/controllers/chat.php */