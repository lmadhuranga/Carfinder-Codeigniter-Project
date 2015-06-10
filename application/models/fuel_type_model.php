<?php

class  fuel_type_model extends MY_Model
{
    protected $_table_name      ='fuel_type';
    protected $_primary_key     ='fuel_type_id';
    protected $_order_by        ='fuel_type_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'name',
                                	'label'=>'Name',
                                	'rules'=>'required|trim|xss_clean|max_length[45]'
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



