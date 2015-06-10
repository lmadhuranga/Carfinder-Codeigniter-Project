<?php

class  inform_car_model extends MY_Model
{
    protected $_table_name      ='inform_car';
    protected $_primary_key     ='inform_car_id';
    protected $_order_by        ='inform_car_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
        array(
           'field'=>'title',
           'label'=>'Title',
           'rules'=>'trim|xss_clean|max_length[5]'
           ),
        array(
           'field'=>'first_name',
           'label'=>'First name',
           'rules'=>'required|trim|xss_clean|max_length[45]'
           ),
        array(
           'field'=>'last_name',
           'label'=>'Last name',
           'rules'=>'trim|xss_clean|max_length[45]'
           ),
        array(
           'field'=>'town_id',
           'label'=>'Town id',
           'rules'=>'required|trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'address_1',
           'label'=>'Address 1',
           'rules'=>'required|trim|xss_clean|max_length[45]'
           ),
        array(
           'field'=>'address_2',
           'label'=>'Address 2',
           'rules'=>'trim|xss_clean|max_length[45]'
           ),
        array(
           'field'=>'m_tel',
           'label'=>'Mobile tel',
           'rules'=>'required|trim|xss_clean|max_length[15]'
           ),
        array(
           'field'=>'request_date',
           'label'=>'Request date',
           'rules'=>'required|trim|xss_clean'
           ),
        array(
           'field'=>'request_time',
           'label'=>'Request time',
           'rules'=>'required|trim|xss_clean'
           ),
        array(
           'field'=>'admin_note',
           'label'=>'Admin note',
           'rules'=>'trim|xss_clean|max_length[255]'
           ),
        array(
           'field'=>'status',
           'label'=>'Status',
           'rules'=>'trim|xss_clean|max_length[3]'
           ),
        array(
           'field'=>'admin_id',
           'label'=>'Admin id',
           'rules'=>'trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'website_booking_id',
           'label'=>'Website booking id',
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

    // with join
    public function get_with_join($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->db->select($fields);
            // $this->db->from($this->_table_name);
            $this->db->join('town', 'town.town_id = '.$this->_table_name.'.town_id','left'); 
            $this->db->join('admin', 'admin.admin_id = '.$this->_table_name.'.admin_id','left'); 
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



}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



