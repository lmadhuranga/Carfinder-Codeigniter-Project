<?php

class  town_model extends MY_Model
{
    protected $_table_name      ='town';
    protected $_primary_key     ='town.town_id';
    protected $_order_by        ='town.town_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                        array(
                           'field'=>'name',
                           'label'=>'Town name',
                           'rules'=>'required|trim|xss_clean|max_length[45]'
                           ),
                        array(
                           'field'=>'lat',
                           'label'=>'Latitude',
                           'rules'=>'required|trim|xss_clean|max_length[15]'
                           ),
                        array(
                           'field'=>'lon',
                           'label'=>'Longitude',
                           'rules'=>'required|trim|xss_clean|max_length[15]'
                           ),
                        array(
                           'field'=>'driver_id',
                           'label'=>'Driver id',
                           'rules'=>'trim|integer|xss_clean|max_length[11]'
                           )
                        );

    public $ajax_rules = array(
                            array(
                               'field'=>'name',
                               'label'=>'Town name',
                               'rules'=>'required|trim|xss_clean|max_length[45]'
                               ),
                            array(
                               'field'=>'lat',
                               'label'=>'Latitude',
                               'rules'=>'required|trim|xss_clean|max_length[15]'
                               ),
                            array(
                               'field'=>'lon',
                               'label'=>'Longitude',
                               'rules'=>'required|trim|xss_clean|max_length[15]'
                               ),
                            array(
                               'field'=>'driver_id',
                               'label'=>'Driver id',
                               'rules'=>'trim|integer|xss_clean|max_length[11]'
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
            $this->db->join('driver', 'driver.driver_id = '.$this->_table_name.'.driver_id','left');
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

    }     // get_with_join()-----------------------------fun()


    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



