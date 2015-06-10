<?php

class  website_news_model extends MY_Model
{
    protected $_table_name      ='website_news';
    protected $_primary_key     ='website_news_id';
    protected $_order_by        ='website_news_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                                array(
                                    'field'=>'content',
                                    'label'=>'Content',
                                    'rules'=>'required|trim|xss_clean|max_length[250]'
                                ),
                                array(
                                	'field'=>'title',
                                	'label'=>'Title',
                                	'rules'=>'required|trim|xss_clean|max_length[30]'
                                ),
								array(
                                	'field'=>'pub_date',
                                	'label'=>'Pub date',
                                	'rules'=>'required|trim|xss_clean|max_length[45]'
                                ),
								array(
                                	'field'=>'status',
                                	'label'=>'Status',
                                	'rules'=>'required|trim|xss_clean|max_length[1]'
                                ),
								array(
                                	'field'=>'exp_date',
                                	'label'=>'Exp date',
                                	'rules'=>'trim|xss_clean'
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



