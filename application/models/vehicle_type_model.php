<?php

class  vehicle_type_model extends MY_Model
{
    protected $_table_name      ='vehicle_type';
    protected $_primary_key     ='vehicle_type_id';
    protected $_order_by        ='vehicle_type_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'type',
                                	'label'=>'Type',
                                	'rules'=>'required|trim|xss_clean|max_length[10]'
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



