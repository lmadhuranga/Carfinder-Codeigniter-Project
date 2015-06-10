<?php

class  fuel_center_model extends MY_Model
{
    protected $_table_name      ='fuel_center';
    protected $_primary_key     ='fuel_center_id';
    protected $_order_by        ='fuel_center_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                        array(
                            'field'=>'town_id',
                            'label'=>'Town id',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'name',
                            'label'=>'Name',
                            'rules'=>'trim|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'lat',
                            'label'=>'Lat',
                            'rules'=>'trim|xss_clean|max_length[15]'
                        ),
                        array(
                            'field'=>'lon',
                            'label'=>'Lon',
                            'rules'=>'trim|xss_clean|max_length[15]'
                        ),
                        array(
                            'field'=>'d_reject',
                            'label'=>'D reject',
                            'rules'=>'trim|xss_clean|max_length[1]'
                        ),
                        array(
                            'field'=>'note',
                            'label'=>'Note',
                            'rules'=>'trim|xss_clean|max_length[65535]'
                        )
                    );

    public $ajax_rules = array(
                        array(
                        	'field'=>'town_id',
                        	'label'=>'Town id',
                        	'rules'=>'trim|xss_clean|max_length[11]'
                        ),
						array(
                            'field'=>'name',
                            'label'=>'Name',
                            'rules'=>'required|trim|xss_clean|max_length[45]'
                        ),
                        array(
                        	'field'=>'lat',
                        	'label'=>'Lat',
                        	'rules'=>'required|trim|xss_clean|max_length[15]'
                        ),
						array(
                        	'field'=>'lon',
                        	'label'=>'Lon',
                        	'rules'=>'required|trim|xss_clean|max_length[15]'
                        ),
						array(
                        	'field'=>'d_reject',
                        	'label'=>'D reject',
                        	'rules'=>'trim|xss_clean|max_length[1]'
                        ),
						array(
                        	'field'=>'note',
                        	'label'=>'Note',
                        	'rules'=>'trim|xss_clean|max_length[65535]'
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



