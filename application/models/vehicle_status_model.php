<?php

class  vehicle_status_model extends MY_Model
{
    protected $_table_name      ='vehicle_status';
    protected $_primary_key     ='vehicle_status_id';
    protected $_order_by        ='vehicle_status_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                        array(
                        	'field'=>'status',
                        	'label'=>'Status',
                        	'rules'=>'required|trim|xss_clean|max_length[10]'
                            ),
						array(
                        	'field'=>'image',
                        	'label'=>'Image',
                        	'rules'=>'trim|xss_clean|max_length[45]'
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

    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



