<?php

class  driver_model extends MY_Model
{
    protected $_table_name      ='driver';
    protected $_primary_key     ='driver_id';
    protected $_order_by        ='driver_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                        array(
                        	'field'=>'user_name',
                        	'label'=>'User name',
                        	'rules'=>'required|trim|xss_clean|max_length[20]'
                        ),
    					array(
                        	'field'=>'first_name',
                        	'label'=>'First name',
                        	'rules'=>'required|trim|xss_clean|max_length[50]'
                        ),
    					array(
                        	'field'=>'last_name',
                        	'label'=>'Last name',
                        	'rules'=>'required|trim|xss_clean|max_length[50]'
                        ),
    					array(
                        	'field'=>'address_1',
                        	'label'=>'Address 1',
                        	'rules'=>'required|trim|xss_clean|max_length[100]'
                        ),
    					array(
                        	'field'=>'address_2',
                        	'label'=>'Address 2',
                        	'rules'=>'trim|xss_clean|max_length[100]'
                        ),
    					array(
                        	'field'=>'nic',
                        	'label'=>'Nic',
                        	'rules'=>'required|callback_valiate_nic|trim|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'licen_no',
                            'label'=>'License no',
                            'rules'=>'required|trim|xss_clean|max_length[20]'
                        ),                        array(
                            'field'=>'license_type',
                            'label'=>'License type',
                            'rules'=>'required|trim|xss_clean|max_length[5]'
                        ),
    					array(
                        	'field'=>'m_tel',
                        	'label'=>'Mobile tel',
                        	'rules'=>'required|trim|xss_clean|max_length[20]'
                        ),
    					array(
                        	'field'=>'h_tel',
                        	'label'=>'Home tel',
                        	'rules'=>'required|trim|xss_clean|max_length[20]'
                        ),
    					// array(
    //                         	'field'=>'auth_code',
    //                         	'label'=>'Auth code',
    //                         	'rules'=>'required|trim|xss_clean|max_length[200]'
    //                         ),
    					array(
                        	'field'=>'status',
                        	'label'=>'Status',
                        	'rules'=>'required|trim|xss_clean|max_length[1]'
                        ),
    					// array(
    //                         	'field'=>'password',
    //                         	'label'=>'Password',
    //                         	'rules'=>'required|trim|xss_clean|max_length[50]'
    //                         ),
    					array(
                        	'field'=>'new_password',
                        	'label'=>'New password',
                        	'rules'=>'trim|xss_clean|max_length[50]'
                        ),
    					array(
                        	'field'=>'dob',
                        	'label'=>'Date of birth',
                        	'rules'=>'callback_check_birthday|trim|xss_clean'
                        ),
    					array(
                        	'field'=>'leave_date',
                        	'label'=>'Leave date',
                        	'rules'=>'trim|xss_clean'
                        ),
    					array(
                        	'field'=>'new_password_requst_date',
                        	'label'=>'New password requst date',
                        	'rules'=>'trim|xss_clean'
                        ),
                        array(
                            'field'=>'licen_expire_date',
                            'label'=>'Licen expire date',
                            'rules'=>'trim|xss_clean'
                        ),
    					array(
                        	'field'=>'image',
                        	'label'=>'Driver Profile image',
                        	'rules'=>'trim|xss_clean'
                        )
        );

       public $login_rules = array(
                                array(
                                    'field'=>'user_name',
                                    'label'=>'User name',
                                    'rules'=>'required|trim|xss_clean|max_length[15]'
                                ),
                                array(
                                    'field'=>'password',
                                    'label'=>'Password',
                                    'rules'=>'required|trim|xss_clean|max_length[15]'
                                ),
                            );


    /*********************Construct()****************************/
    function __construct()
    {
        parent::__construct();
    }

    function count(){
        return $this->db->count_all($this->_table_name);
    }


     /**
      * @author                          Madhuranga Senadheera
      * Purpose of the function          get no hire dirver list
      * @return_type                     return_type
      */
     public function get_no_hire_driver_count()
     {
         $this->load->model('vehicle_log_model');
         $hiring_driver_list = $this->vehicle_log_model->get_hiring_driver_list();
         $driver_array = array();
         foreach ($hiring_driver_list as $key => $value) {
             array_push($driver_array, $value['driver_id']);
         }

         $this->db->where_not_in('driver_id',$driver_array );

         $this->get('driver_id',NULL,FALSE,10);
         echo $this->db->last_query();
                            // get($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    
     }
     /*---------------- ---------End of get_no_hire_driver_count()---------------------------*/
 



    
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function           check currnt user is logged in
     * 
    */
    public function is_loggedin()
    { 
        return (bool) $this->session->userdata('loggedin');
    }
    /*---------------- ---------End of is_loggedin()---------------------------*/
   

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function           check user name is valid
     * 
    */
    public function  get_current_username()
    {
        return  $this->session->userdata('user_name');
    }
    /*---------------- ---------End of get_current_username()---------------------------*/

            
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          return current user name
     * 
    */
    public function get_current_first_name()
    {
        return  $this->session->userdata('first_name');
    }
    /*---------------- ---------End of get_current_first_name()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          return last name
     * 
    */
    public function get_current_last_name()
    {
        return   $this->session->userdata('last_name');
    }
    /*---------------- ---------End of get_current_last_name()---------------------------*/
     


    
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          return current user id
     * 
    */
    public function get_current_user_id()
    {
        return  $this->session->userdata('user_id');
    }
    /*---------------- ---------End of get_current_user_id()---------------------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get current user vehicle id
     * 
     */
    public function get_current_vehicle_id()
    {
        $this->load->model('today_vehicle_driver_model');

        // return  $this->session->userdata('vehicle_id');
        $return = $this->today_vehicle_driver_model->get_by(array('driver_id'=>$this->get_current_user_id()),array('vehicle_id'),NULL,TRUE,1);
        // var_dump($return);
        if (!@is_null($result->vehicle_id)) {
            return $result->vehicle_id;
        }

        return '1';
        
        // return 

    }
    /*---------------- ---------End of get_current_vehicle_id()---------------------------*/
    
    

   
   /**
    * @author                          Madhuranga Senadheera
    * Purpose of the function         return current user email
    * 
    */
   // public function  get_current_user_email()
   // {
   //     return  $this->session->userdata('user_email');
   // }
   /*---------------- ---------End of get_current_user_email()---------------------------*/
   


   /**
    * @author                          Madhuranga Senadheera
    * Purpose of the function          check user driver
    * 
    */
   public function is_driver()
   {
  
        return (bool) $this->session->userdata('user_type') == 'driver';
   }
   /*---------------- ---------End of is_driver()---------------------------*/
   

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get user type
     * 
     */
    public function get_user_type()
    {
        return $this->session->userdata('user_type');
    }
    /*---------------- ---------End of get_user_type()---------------------------*/
    
 



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function         driver user athonticate using ajax
     * 
    */
    public function ajax_user_login($user_name,$password)
    { 

        // is not logged
        if (!$this->is_loggedin()) 
        { 
             
            $user_data = $this->driver_model->get_by(array('user_name'=>$user_name,'password'=>$this->hash_password($password),'status'=>'A'), array('driver_id','user_name','first_name','last_name','image','status'),NULL , true,1);
            // user name and password corect
            if (count($user_data)==1) 
            {
                // set session data 
                $session_data = array(
                                        'user_id'       => $user_data->driver_id,
                                        'user_name'     => $user_data->user_name,
                                        'user_type'     => 'driver',
                                        'first_name'    => $user_data->first_name,
                                        'last_name'     => $user_data->last_name,
                                        'user_profile_image' => $user_data->image,
                                        'user_status'   => $user_data->status,
                                        'loggedin' => true,
                                     );
                $this->session->set_userdata($session_data); 

                // valida user 
                // var_dump('1');
                return true;

            }
            else 
            { 
                // redirect login page
                // var_dump('2');
                return false;
            }
             
        }
        else  
        { 
            // goto home page
            // var_dump('3');
            return true;
        }
         
        
    }
    /*---------------- ---------End of user_login()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function         driver user login function
     * 
    */
    public function user_login($user_name,$password)
    {
 
        // is not logged
        if (!$this->is_loggedin()) 
        { 
             
            $user_data = $this->driver_model->get_by(array('user_name'=>$user_name,'password'=>$this->hash_password($password),'status'=>'A'), array('driver_id','user_name','first_name','last_name','image'),NULL , true,1);
            // user name and password corect
            if (count($user_data)==1) 
            {
                // set session data 
                $session_data = array(
                                        'user_id'       => $user_data->driver_id,
                                        'user_name'     => $user_data->user_name,
                                        'user_type'     => 'driver',
                                        'first_name'    => $user_data->first_name,
                                        'last_name'     => $user_data->last_name,
                                        'user_profile_image' => $user_data->image,
                                        'loggedin' => true,
                                     );
                $this->session->set_userdata($session_data); 

                // redirect home page
                redirect('driver/journey');
            }
            else 
            { 
                // redirect login page
                redirect('driver/user/login');
            }
             
        }
        else  
        { 
            // goto home page
            redirect('driver/journey');
        }
         
        
    }
    /*---------------- ---------End of user_login()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Hass password
     * 
     */
    public function hash_password($password)
    {
        return  md5($password). $this->config->item('encryption_key');
    }
    /*---------------- ---------End of hash_password()---------------------------*/
  


    public function report_driver_cash_today($startdate='0000-00-00',$enddate='0000-00-00')
    {
        $this->db->select("SUM(journey.cash) as cash_sum,journey.driver_id, first_name  , last_name, journey.start_time");
        $this->db->where("journey.start_time BETWEEN ('".$startdate."') AND ('".$enddate."')");
        $this->db->join('journey', 'journey.driver_id = '.$this->_table_name.'.driver_id','left');        
        $this->db->group_by('journey.driver_id');
        $this->db->group_by('DATE(journey.start_time)');
        return $this->db->get('driver')->result();
    }

    public function report_driver_km_today($startdate='0000-00-00',$enddate='0000-00-00')
    {
        $this->db->select("SUM(journey.km) as km_sum,journey.driver_id, first_name, count(journey_id) hire_sum, last_name, journey.start_time");
        $this->db->where("journey.start_time BETWEEN ('".$startdate."') AND ('".$enddate."')");
        $this->db->join('journey', 'journey.driver_id = '.$this->_table_name.'.driver_id','left');        
        $this->db->group_by('journey.driver_id');
        $this->db->group_by('DATE(journey.start_time)');
        return $this->db->get('driver')->result();
    }


    public function report_driver_by_date($startdate='0000-00-00',$enddate='0000-00-00')
    {
        $this->db->select("SUM(journey.cash) as cash_sum,journey.driver_id, first_name as driver_name, first_name as driver_first_name, last_name as driver_last_name, journey.start_time, DATE(journey.start_time) as pay_day");
        $this->db->where("journey.start_time BETWEEN ('".$startdate."') AND ('".$enddate."')");
        $this->db->join('journey', 'journey.driver_id = '.$this->_table_name.'.driver_id','left');        
        $this->db->group_by('journey.driver_id');
        $this->db->group_by('DATE(journey.start_time)');
        return $this->db->get('driver')->result();
    }

    public function report_driver_by_month($startdate='0000-00-00',$enddate='0000-00-00')
    {
        $this->db->select("SUM(journey.cash) as cash_sum,journey.driver_id, COUNT(journey.journey_id) AS hire_count, SUM(journey.km) AS travel_distance, first_name as driver_first_name, last_name as driver_last_name, journey.start_time , MONTH(journey.start_time) AS month_id");
        $this->db->order_by('journey.start_time', 'asc');
        $this->db->where("journey.start_time BETWEEN ('".$startdate."') AND ('".$enddate."')");
        $this->db->join('journey', 'journey.driver_id ='.$this->_table_name.'.driver_id','left');        
        $this->db->group_by('journey.driver_id');
        $this->db->group_by('MONTH(journey.start_time)');
        return $this->db->get('driver')->result();
    }


    public function report_driver_cash_today_sum($startdate='0000-00-00',$enddate='0000-00-00')
    {
        $this->db->select("SUM(cash) total");
        $this->db->where("start_time BETWEEN ('".$startdate."') AND ('".$enddate."')");
        // $this->db->group_by('driver_id');
        return $this->db->get('journey')->result();
    }
    
    public function report_driver_by_date_sum($startdate='0000-00-00',$enddate='0000-00-00')
    {
        $this->db->select("SUM(cash) total");
        $this->db->where("start_time BETWEEN ('".$startdate."') AND ('".$enddate."')");
        // $this->db->group_by('driver_id');
        return $this->db->get('journey')->result();
    }

    public function report_driver_by_month_sum($startdate='0000-00-00',$enddate='0000-00-00')
    {
        $this->db->select("SUM(cash) total");
        $this->db->where("start_time BETWEEN ('".$startdate."') AND ('".$enddate."')");
        // $this->db->group_by('MONTH(journey.start_time)');
        return $this->db->get('journey')->result();
    }


    // Get drive count of the selected time range
    public function get_driver_count_by_date_range($startdate='2014-01-01',$enddate='2015-01-01')
    {
 
        $this->db->where("journey.start_time BETWEEN ('".$startdate."') AND ('".$enddate."')");
         $this->db->join('journey', 'journey.driver_id ='.$this->_table_name.'.driver_id','left');    
        $this->db->group_by('journey.driver_id');
        $result = $this->get(array('count(journey.driver_id) AS driver_count'), $id = NULL, $single = TRUE);
 
        if (@is_null($result->driver_count))
        {
            return '0';
        }
        else
        { 
            return $result->driver_count;

        }
    }

    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera 