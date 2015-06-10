<?php

class  website_booking_model extends MY_Model
{
    protected $_table_name      ='website_booking';
    protected $_primary_key     ='website_booking_id';
    protected $_order_by        ='website_booking_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                        array(
                            'field'=>'title',
                            'label'=>'Title',
                            'rules'=>'trim|required|xss_clean|max_length[5]'
                        ),
                        array(
                            'field'=>'first_name',
                            'label'=>'First name',
                            'rules'=>'trim|required|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'last_name',
                            'label'=>'Last name',
                            'rules'=>'trim|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'address_1',
                            'label'=>'From ',
                            'rules'=>'trim|required|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'address_2',
                            'label'=>'To ',
                            'rules'=>'trim|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'town_id',
                            'label'=>'Town id',
                            'rules'=>'trim|integer|required|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'m_tel',
                            'label'=>'Telephone number',
                            'rules'=>'trim|xss_clean|required|max_length[15]'
                        ),
                        array(
                            'field'=>'request_date',
                            'label'=>'Request date',
                            'rules'=>'trim|required|xss_clean'
                        ),
                        array(
                            'field'=>'request_time',
                            'label'=>'Request time',
                            'rules'=>'trim|xss_clean'
                        ),
                        array(
                            'field'=>'note',
                            'label'=>'Note',
                            'rules'=>'trim|xss_clean|max_length[225]'
                        ),
                        array(
                            'field'=>'admin_note',
                            'label'=>'Admin note',
                            'rules'=>'trim|xss_clean|max_length[255]'
                        ),
                        array(
                            'field'=>'email',
                            'label'=>'Email',
                            'rules'=>'trim|valid_email|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'status',
                            'label'=>'Status',
                            'rules'=>'trim|xss_clean|max_length[3]'
                        ),
                        array(
                            'field'=>'user_verify',
                            'label'=>'User verify',
                            'rules'=>'trim|xss_clean|max_length[5]'
                        ),
                        array(
                            'field'=>'admin_id',
                            'label'=>'Admin id',
                            'rules'=>'trim|integer|xss_clean|max_length[11]'
                        )
        );

    // rules
    public $home_quicbokking = array(
                        array(
                        	'field'=>'title',
                        	'label'=>'Title',
                        	'rules'=>'trim|required|xss_clean|max_length[5]'
                        ),
						array(
                        	'field'=>'first_name',
                        	'label'=>'First name',
                        	'rules'=>'trim|required|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'last_name',
                        	'label'=>'Last name',
                        	'rules'=>'trim|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'address_1',
                        	'label'=>'From ',
                        	'rules'=>'trim|required|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'address_2',
                        	'label'=>'To ',
                        	'rules'=>'trim|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'town_id',
                        	'label'=>'Town id',
                        	'rules'=>'trim|integer|required|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'m_tel',
                        	'label'=>'Telephone number',
                        	'rules'=>'trim|xss_clean|required|max_length[15]'
                        ),
						array(
                        	'field'=>'request_date',
                        	'label'=>'Request date',
                        	'rules'=>'trim|required|xss_clean'
                        ),
						array(
                        	'field'=>'request_time',
                        	'label'=>'Request time',
                        	'rules'=>'trim|xss_clean'
                        ),
						array(
                        	'field'=>'note',
                        	'label'=>'Note',
                        	'rules'=>'trim|xss_clean|max_length[225]'
                        ),
						array(
                        	'field'=>'admin_note',
                        	'label'=>'Admin note',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'email',
                        	'label'=>'Email',
                        	'rules'=>'trim|valid_email|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'status',
                        	'label'=>'Status',
                        	'rules'=>'trim|xss_clean|max_length[3]'
                        ),
						array(
                        	'field'=>'user_verify',
                        	'label'=>'User verify',
                        	'rules'=>'trim|xss_clean|max_length[2]'
                        ),
						array(
                        	'field'=>'admin_id',
                        	'label'=>'Admin id',
                        	'rules'=>'trim|integer|xss_clean|max_length[11]'
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
     * Purpose of the function          Get unreaded booking count
     * @return_type                     int
     */
    public function get_unreaded_booking_count()
    {
        return (int)$this->get_by(array('status'=>'NTR'),array('count(website_booking_id) as website_booking_count'),NULL,TRUE)->website_booking_count;
    }//Function End get_unreaded_booking_count()---------------------------------------------------FUNEND()



    // with join
    public function get_with_join($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->db->select($fields);
            // $this->db->from($this->_table_name);
            $this->db->join('town', 'town.town_id = '.$this->_table_name.'.town_id','left'); 
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


    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



