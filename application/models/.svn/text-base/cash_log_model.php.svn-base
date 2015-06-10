<?php

class  cash_log_model extends MY_Model
{
    protected $_table_name      ='cash_log';
    protected $_primary_key     ='cash_log_id';
    protected $_order_by        ='cash_log_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'vehicle_id',
                                	'label'=>'Vehicle id',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'driver_id',
                                	'label'=>'Driver id',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'journey_id',
                                	'label'=>'Journey id',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'cash',
                                	'label'=>'Cash',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
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
            $this->db->join('vehicle', 'vehicle.vehicle_id = '.$this->_table_name.'.vehicle_id','left');
            $this->db->join('journey', 'journey.journey_id = '.$this->_table_name.'.journey_id','left');
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



