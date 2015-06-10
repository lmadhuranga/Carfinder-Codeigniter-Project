<?php

class  device_model extends MY_Model
{
    protected $_table_name      ='device';
    protected $_primary_key     ='device_id';
    protected $_order_by        ='device_id';
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
                    	'field'=>'status',
                    	'label'=>'Status',
                    	'rules'=>'required|trim|xss_clean|max_length[10]'
                    ),
					array(
                    	'field'=>'authenticate_code',
                    	'label'=>'Authenticate code',
                    	'rules'=>'required|trim|xss_clean|max_length[250]'
                    ),
					array(
                    	'field'=>'device_expire_date',
                    	'label'=>'Device expire date',
                    	'rules'=>'trim|xss_clean'
                    ),
					array(
                    	'field'=>'imei',
                    	'label'=>'Imei',
                    	'rules'=>'required|trim|xss_clean|max_length[20]'
                    ),
					array(
                    	'field'=>'note',
                    	'label'=>'Note',
                    	'rules'=>'trim|xss_clean|max_length[120]'
                    ),
					array(
                    	'field'=>'image',
                    	'label'=>'Image',
                    	'rules'=>'trim|xss_clean|max_length[100]'
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

        $this->db->limit($perpage,$start);
        return $this->db->get($this->_table_name)->$method($array); 
        
    }
    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



