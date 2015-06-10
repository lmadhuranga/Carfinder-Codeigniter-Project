<?php

class  admin_model extends MY_Model
{
    protected $_table_name      ='admin';
    protected $_primary_key     ='admin_id';
    protected $_order_by        ='admin_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                        array(
                            'field'=>'town_id',
                            'label'=>'Town id',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'user_name',
                            'label'=>'User name',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
                        array(
                            'field'=>'first_name',
                            'label'=>'First name',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
                        array(
                            'field'=>'last_name',
                            'label'=>'Last name',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
                        array(
                            'field'=>'email',
                            'label'=>'Email',
                            'rules'=>'required|trim|valid_email|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'mobile_no',
                            'label'=>'Mobile no',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'adress_1',
                            'label'=>'Adress 1',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
                        array(
                            'field'=>'adress_street',
                            'label'=>'Adress street',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
                        array(
                            'field'=>'status',
                            'label'=>'Status',
                            'rules'=>'required|trim|xss_clean|max_length[10]'
                        ),
                        array(
                            'field'=>'auth',
                            'label'=>'Auth',
                            'rules'=>'required|trim|xss_clean|max_length[200]'
                        ),
                        array(
                            'field'=>'user_password',
                            'label'=>'User password',
                            'rules'=>'required|trim|xss_clean|max_length[250]'
                        ),
                        array(
                            'field'=>'user_type',
                            'label'=>'User type',
                            'rules'=>'trim|xss_clean|max_length[1]'
                        ),
                        array(
                            'field'=>'image',
                            'label'=>'Admin Profile',
                            'rules'=>'trim|xss_clean|max_length[255]'
                        )
        );
    
     public $login_rules = array(
                                array(
                                    'field'=>'email',
                                    'label'=>'Email',
                                    'rules'=>'required|trim|valid_email|xss_clean|max_length[45]'
                                    ),
                                array(
                                    'field'=>'user_password',
                                    'label'=>'User password',
                                    'rules'=>'required|trim|xss_clean|max_length[250]'
                                ),
                            );
    // rules
    public $user_profile_rules = array(
                        array(
                            'field'=>'town_id',
                            'label'=>'Town id',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ), 
                        array(
                            'field'=>'first_name',
                            'label'=>'First name',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
                        array(
                            'field'=>'last_name',
                            'label'=>'Last name',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
                        array(
                            'field'=>'email',
                            'label'=>'Email',
                            'rules'=>'required|trim|valid_email|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'mobile_no',
                            'label'=>'Mobile no',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'adress_1',
                            'label'=>'Adress 1',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
                        array(
                            'field'=>'adress_street',
                            'label'=>'Adress street',
                            'rules'=>'required|trim|xss_clean|max_length[25]'
                        ), 
                        array(
                            'field'=>'image',
                            'label'=>'Admin Profile',
                            'rules'=>'trim|xss_clean|max_length[255]'
                        )
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
     * Purpose of the function           check currnt user is logged in
     * 
    */
    public function is_loggedin()
    { 
        return (bool) $this->session->userdata('loggedin');
    }
    /*---------------- ---------End of functionName()---------------------------*/
    

    
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function           check email is exist
     * 
    */
    public function is_email()
    {
        
    }
    /*---------------- ---------End of is_email()---------------------------*/
   

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function           check user name is valid
     * 
    */
    public function  get_current_username()
    {
        return  $this->session->userdata('user_name');
    }
    /*---------------- ---------End of is_username()---------------------------*/

            
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
    * Purpose of the function         return current user email
    * 
    */
   public function  get_current_user_email()
   {
       return  $this->session->userdata('user_email');
   }
   /*---------------- ---------End of get_current_user_email()---------------------------*/
   


   /**
    * @author                          Madhuranga Senadheera
    * Purpose of the function          check user admin
    * 
    */
   public function is_admin()
   {
  
        return (bool) $this->session->userdata('user_type') == 'admin';
   }
   /*---------------- ---------End of is_admin()---------------------------*/
   

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
     * Purpose of the function         admin user login function
     * 
    */
    public function user_login($email,$password)
    { 

        // echo ($this->hash_password($password)); exit('admin_model_file');


 
        // is not logged
        if (!$this->is_loggedin()) 
        { 
           // echo $this->hash_password($password).'<br/>'; 
            //exit('is admin ');
            // $this->admin_model->get_by($where='', $fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
            $user_data = $this->admin_model->get_by(array('email'=>$email,'user_password'=>$this->hash_password($password),'status'=>'A'), array('admin_id','user_name','first_name','last_name','image','email'),NULL , true,1);

            // user name and password corect
            if (count($user_data)==1) 
            {
                // set session data 
                $session_data = array(
                                        'user_id' => $user_data->admin_id,
                                        'user_name' => $user_data->user_name,
                                        'user_type' => 'admin',
                                        'first_name' => $user_data->first_name,
                                        'last_name' => $user_data->last_name,
                                        'user_email' => $user_data->email,
                                        'user_profile_image' => $user_data->image,
                                        'loggedin' => true,
                                     );
                $this->session->set_userdata($session_data); 

                // redirect home page
                redirect('admin/dashboard');
            }
            else 
            {  

                // redirect login page
                redirect('admin/user/login');
            } 
        }
        else  
        {
            // user log out
            redirect('admin/user/login');
             
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
  



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          JOin the table and return data
     * 
     */ 
    
    public function get_with_join($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->db->select($fields);
            // $this->db->from($this->_table_name);
            $this->db->join('town', 'town.town_id = '.$this->_table_name.'.town_id','left');
            // $this->db->join('admin', 'admin.admin_id = '.$this->_table_name.'.admin_id','left'); 
        }
        if($id != NULL)
        {
            $filter = $this->_primary_filter;
            // $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method =  'row';
        }
        elseif($single == TRUE)
        {
           
            $method = 'row';
        }
        else
        {
            $method = 'result';
        }

        // if(!count($this->db->ar_order_by))
        // {
        //  $this->db->order_by($this->_order_by);
        // }
        $this->db->limit($perpage,$start);
        return $this->db->get($this->_table_name)->$method($array); 
        
    }
     /*---------------- ---------End of get_with_join()---------------------------*/

    

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          JOin the table and return data
     * 
     */ 
    
    public function get_with_join_admin($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->db->select($fields);
            // $this->db->from($this->_table_name);
            $this->db->join('town', 'town.town_id = '.$this->_table_name.'.town_id','left');
            // $this->db->join('admin', 'admin.admin_id = '.$this->_table_name.'.admin_id','left'); 
        }
        if($id != NULL)
        {
            $filter = $this->_primary_filter;
            // $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method =  'row';
        }
        elseif($single == TRUE)
        {
           
            $method = 'row';
        }
        else
        {
            $method = 'result';
        }

        // if(!count($this->db->ar_order_by))
        // {
        //  $this->db->order_by($this->_order_by);
        // }
        $this->db->limit($perpage,$start);
        return $this->db->get($this->_table_name)->$method($array); 
        
    }
     /*---------------- ---------End of get_with_join()---------------------------*/

    



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          JOin the table and return data
     * 
     */ 
    
    public function get_with_join_driver($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->db->select($fields);
            // $this->db->from($this->_table_name);
            $this->db->join('town', 'town.town_id = '.$this->_table_name.'.town_id','left');
            $this->db->join('driver', 'driver.driver_id = '.$this->_table_name.'.driver_id','left'); 
        }
        if($id != NULL)
        {
            $filter = $this->_primary_filter;
            // $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method =  'row';
        }
        elseif($single == TRUE)
        {
           
            $method = 'row';
        }
        else
        {
            $method = 'result';
        }

        // if(!count($this->db->ar_order_by))
        // {
        //  $this->db->order_by($this->_order_by);
        // }
        $this->db->limit($perpage,$start);
        return $this->db->get($this->_table_name)->$method($array); 
        
    }
     /*---------------- ---------End of get_with_join()---------------------------*/

    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



