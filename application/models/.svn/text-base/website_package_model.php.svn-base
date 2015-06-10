<?php

class  website_package_model extends MY_Model
{
    protected $_table_name      ='website_package';
    protected $_primary_key     ='website_package_id';
    protected $_order_by        ='website_package_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                                array(
                                    'field'=>'admin_id',
                                    'label'=>'Admin id',
                                    'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
                                array(
                                	'field'=>'title',
                                	'label'=>'Title',
                                	'rules'=>'required|trim|xss_clean|max_length[15]'
                                ),
								array(
                                	'field'=>'pub_date',
                                	'label'=>'Pub date',
                                	'rules'=>'required|trim|xss_clean|max_length[45]'
                                ),
								array(
                                	'field'=>'exp_date',
                                	'label'=>'Exp date',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'content',
                                	'label'=>'Content',
                                	'rules'=>'required|trim|xss_clean|max_length[250]'
                                ),
								array(
                                	'field'=>'image',
                                	'label'=>'Image',
                                	'rules'=>'trim|xss_clean|max_length[255]'
                                ),
								array(
                                	'field'=>'status',
                                	'label'=>'Status',
                                	'rules'=>'required|trim|xss_clean|max_length[1]'
                                ),
								array(
                                	'field'=>'type',
                                	'label'=>'Type',
                                	'rules'=>'requered|trim|integer|xss_clean|max_length[11]'
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



