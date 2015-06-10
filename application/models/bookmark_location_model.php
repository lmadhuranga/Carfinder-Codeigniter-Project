<?php

class  bookmark_location_model extends MY_Model
{
    protected $_table_name      ='bookmark_location';
    protected $_primary_key     ='bookmark_location_id';
    protected $_order_by        ='bookmark_location_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                                array(
                                	'field'=>'driver_id',
                                	'label'=>'Driver id',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'town_id',
                                	'label'=>'Town id',
                                	'rules'=>'trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'name',
                                	'label'=>'Name',
                                	'rules'=>'required|trim|xss_clean|max_length[20]'
                                ),
								array(
                                	'field'=>'note',
                                	'label'=>'Note',
                                	'rules'=>'trim|xss_clean|max_length[100]'
                                ),
								array(
                                	'field'=>'priority',
                                	'label'=>'Priority',
                                	'rules'=>'trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'lat',
                                	'label'=>'Lat',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'lon',
                                	'label'=>'Lon',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'status',
                                	'label'=>'Status',
                                	'rules'=>'trim|xss_clean|max_length[1]'
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
            $this->db->join('driver', 'driver.driver_id = '.$this->_table_name.'.driver_id','left');
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



