<?php

class  fuel_refill_model extends MY_Model
{
    protected $_table_name      ='fuel_refill';
    protected $_primary_key     ='fuel_refill_id';
    protected $_order_by        ='fuel_refill_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
        array(
           'field'=>'driver_id',
           'label'=>'Driver id',
           'rules'=>'required|trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'vehicle_id',
           'label'=>'Vehicle',
           'rules'=>'required|trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'fuel_center_id',
           'label'=>'Fuel center',
           'rules'=>'trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'note',
           'label'=>'Note',
           'rules'=>'trim|xss_clean|max_length[100]'
           ),
        array(
           'field'=>'date',
           'label'=>'Date',
           'rules'=>'required|trim|xss_clean'
           ),
        array(
           'field'=>'liter',
           'label'=>'Liter',
           'rules'=>'required|trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'fuel_unit_price',
           'label'=>'Fuel unit price',
           'rules'=>'trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'reciept_img',
           'label'=>'Reciept img',
           'rules'=>'required|trim|xss_clean|max_length[100]'
           )
        );

    public $rules_ajax_add = array(
 
                                array(
                                   'field'=>'fuel_center_id',
                                   'label'=>'Fuel center id',
                                   'rules'=>'trim|integer|xss_clean|max_length[11]'
                                   ),
                                array(
                                   'field'=>'note',
                                   'label'=>'Note',
                                   'rules'=>'trim|xss_clean|max_length[100]'
                                   ),
 
                                array(
                                   'field'=>'liter',
                                   'label'=>'Liter',
                                   'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                   ),
                                array(
                                   'field'=>'fuel_unit_price',
                                   'label'=>'Fuel unit price',
                                   'rules'=>'trim|integer|xss_clean|max_length[11]'
                                   ),
 
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
            $this->db->join('fuel_center', 'fuel_center.fuel_center_id = '.$this->_table_name.'.fuel_center_id','left');
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



