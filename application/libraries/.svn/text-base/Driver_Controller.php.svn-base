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
/* File Name     : Driver_Controller.php                              */
/* Purpose       : 													           */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class Driver_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
 
		$this->data['meta_title'] = 'Car finder';

		$this->load->model('driver_model');
        
        // Login check
        $exception_uris = array(
            'driver/user/ajax_driver_login', 
            'driver/user/login', 
            'driver/user/logout'
        );
 

        if (in_array(uri_string(), $exception_uris) == false)
        {
            // is logged user
            if (($this->driver_model->is_loggedin() == false))
            { 
                // redicret to login page
                redirect('driver/user/login');
            }
            else
            {
                // redirect to admin
                if (($this->driver_model->get_user_type() != 'driver'))
                {
                    // redirect driver dashboard
                    redirect('admin/dashboard');
                }


                 // set user id
                $this->data['current_user_id'] = $this->driver_model->get_current_user_id();
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
    

}
/* End of file Driver_Controller.php */
/* Location: ./application/controllers/Driver_Controller.php */