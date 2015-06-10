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
/* File Name     : Admin_Controller.php                              */
/* Purpose       : 													           */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class Admin_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['meta_title'] = 'Car finder';

        $this->load->model('admin_model');
        
        // Login check
        $exception_uris = array(
            'admin/user/login', 
            'admin/user/logout'
        );
 

        if (in_array(uri_string(), $exception_uris) == false) 
        {
            // is logged user
            if (($this->admin_model->is_loggedin() == false))
            {
                // redicret to login page
                redirect('admin/user/login');
            }
            else
            {
                // redirect to admin
                if (($this->admin_model->get_user_type() != 'admin'))
                {
                    // redirect driver dashboard
                    redirect('driver/dashboard');
                }

                // set user id
                $this->data['current_user_id'] = $this->admin_model->get_current_user_id();
            }
        }  
 
	}

	/**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     */
    public function index()
    {
        
    }


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * 
     */
    public function load_view($layout,$data)
    {
     // $this->load->view('admin/main', $data, FALSE);
    	
        $this->load->view($layout, $data);

        
    }
    /*---------------- ---------End of load_view()---------------------------*/
    
}
/* End of file Admin_Controller.php */
/* Location: ./application/controllers/Admin_Controller.php */