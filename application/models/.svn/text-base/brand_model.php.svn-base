<?php

class  brand_model extends MY_Model
{
    protected $_table_name      ='brand';
    protected $_primary_key     ='brand_id';
    protected $_order_by        ='brand_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'name',
                                	'label'=>'Name',
                                	'rules'=>'required|trim|xss_clean|max_length[10]'
                                ),
								array(
                                	'field'=>'image',
                                	'label'=>'Image',
                                	'rules'=>'required|trim|xss_clean|max_length[255]'
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



