<?php

class  today_vehicle_driver_model extends MY_Model
{
    protected $_table_name      ='today_vehicle_driver';
    protected $_primary_key     ='today_vehicle_driver_id';
    protected $_order_by        ='today_vehicle_driver_id';
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
                                	'field'=>'note',
                                	'label'=>'Note',
                                	'rules'=>'trim|xss_clean|max_length[65535]'
                                ),
								array(
                                	'field'=>'start_time',
                                	'label'=>'Start time',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'end_time',
                                	'label'=>'End time',
                                	'rules'=>'callback_validate_enter_exit_time|trim|xss_clean'
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


    //SELECT * FROM `vehicle` 
    //WHERE vehicle_id NOT IN (SELECT  vehicle_id FROM today_vehicle_driver WHERE `start_time`  BETWEEN '2014-08-26 00:00:00' and '2014-08-27 00:00:00')



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get today avalilbel drivers id list
     * @return_type                     return array
     */
    public function get_today_available_drivers($start_time = "2014-08-26 00:00:00",$end_time ="2014-08-27 00:00:00")
    {
        return $this->get_by("`start_time`  BETWEEN '".$start_time."' AND '".$end_time."'",array('vehicle_id'),NULL,FALSE,0);
    }
    /*---------------- ---------End of available_drivers()---------------------------*/
    



    // with join
    public function get_with_join($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->db->select($fields);
            // $this->db->from($this->_table_name);
            $this->db->join('driver', 'driver.driver_id = '.$this->_table_name.'.driver_id','left');
            $this->db->join('vehicle', 'vehicle.vehicle_id = '.$this->_table_name.'.vehicle_id','left');
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



