<?php

/**
*
*
* @copyright  2014
* @license    None
* @version    1.0
* @link       None
* @since      Class available since Release 1.0
*
**/		
		
/***********************************************************************************/
/*                                                                                 */
/* File Name     : user.php                              */
/* Purpose       : 													           */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class user extends Driver_Controller
{
	function __construct()
	{
		parent::__construct();
	}


	/**
	 * @author                          Madhuranga Senadheera
	 * Purpose of the function          Description
	 * 
	 */
	public function index()
	{
	    
	}
	/*---------------- ---------End of index()---------------------------*/
	

	/**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     */
    public function registration()
    {
        
    }



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          User login
     * 
     */
    public function login()
    {
        // 

        $this->load->model('driver_model');
                // load form vadaiton
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        $this->form_validation->set_rules($this->driver_model->login_rules);
        // validate form
        if ($this->form_validation->run() == false)
        { 
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {
            $this->driver_model->user_login(set_value('user_name'),set_value('password'));

        }
         
        $this->data['meta_title'] = $this->data['meta_title'].' - Driver User login';

        $this->load->view('driver/login_view',$this->data);
    }
    /*---------------- ---------End of login()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * 
     */
    public function forget_password()
    {
        
    }
    /*---------------- ---------End of forget_password()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * 
     */
    public function reset_password()
    {
        
    }
    /*---------------- ---------End of reset_password()---------------------------*/
    



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * 
     */
    public function logout()
    {
        $array_items = array(
                            'user_id'           =>'',
                            'user_name'         =>'',
                            'user_type'         =>'',
                            'first_name'        =>'',
                            'last_name'         =>'',
                            'user_email'        =>'',
                            'user_profile_image'=>'',
                            'loggedin'          =>'',
                         );

        $this->session->unset_userdata($array_items);
        redirect('driver/user/login');
    }
    

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          user lgoout usign ajax requers
     * @return                          json
     */
    public function ajax_logout()
    {
        $json_return_array =array();

                                // is logged user  
        if($this->driver_model->is_loggedin())
        {
            $array_items = array(
                                'user_id'           =>'',
                                'user_name'         =>'',
                                'user_type'         =>'',
                                'first_name'        =>'',
                                'last_name'         =>'',
                                'user_email'        =>'',
                                'user_profile_image'=>'',
                                'loggedin'          =>'',
                             );

            $this->session->unset_userdata($array_items);
            
            $json_return_array['msg'] = 'User log out'; 
            $json_return_array['status'] = 'success'; 
            $json_return_array['status_code'] = 'logout_succes'; 
        }
        else
        {
            $json_return_array['msg'] = 'No loggedin user'; 
            $json_return_array['status'] = 'error'; 
            $json_return_array['status_code'] = 'logout_error';
        }
        
        echo json_encode($json_return_array);
        exit();

    }
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          ajax user authentication
     * 
     */
    public function ajax_driver_login()
    { 
        $json_return_array = array('msg'=>'','status'=>'');

        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->driver_model->login_rules);
        if ($this->form_validation->run() == false)
        { 
             $json_return_array['msg'] = 'Username or Password is not match'; 
             $json_return_array['status'] = 'error'; 
             $json_return_array['status_code'] = 'login_error'; 
        }
        else
        {
            // var_dump($this->driver_model->ajax_user_login($this->input->post('user_name'),$this->input->post('password'))==true);
            // exit();
            // check user is exist
            if($this->driver_model->ajax_user_login($this->input->post('user_name'),$this->input->post('password')))
            {
                $json_return_array['msg'] = 'Valid user'; 
                $json_return_array['status'] = 'success'; 
                $json_return_array['status_code'] = 'login_ok';
                $json_return_array['user_data'] = array('user_id'=>$this->driver_model->get_current_user_id() );

            }
            else
            {
                $json_return_array['msg'] = 'Username or Password is not match'; 
                $json_return_array['user'] = $this->driver_model->hash_password($this->input->post('password')); 
                $json_return_array['status'] = 'error'; 
                $json_return_array['status_code'] = 'login_error';
            } 
            
        } 
        // return json object for mobile
        echo(json_encode($json_return_array));
        exit();
        
    }
    /*---------------- ---------End of ajax_driver_login()---------------------------*/
     

}
/* End of file user.php */
/* Location: ./application/controllers/user.php */