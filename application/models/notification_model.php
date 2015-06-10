<?php

class  notification_model extends MY_Model
{
    protected $_table_name      ='notification';
    protected $_primary_key     ='notification_id';
    protected $_order_by        ='notification_id';
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
           'field'=>'driver_id',
           'label'=>'Driver id',
           'rules'=>'required|trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'messsage',
           'label'=>'Messsage',
           'rules'=>'required|trim|xss_clean|max_length[180]'
           ),
        array(
           'field'=>'call_center_id',
           'label'=>'Call center id',
           'rules'=>'required|trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'status',
           'label'=>'Status',
           'rules'=>'required|trim|xss_clean|max_length[1]'
           ),
        array(
           'field'=>'d_reject',
           'label'=>'D reject',
           'rules'=>'trim|xss_clean|max_length[1]'
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
            // $this->db->join('town', 'town.town_id = '.$this->_table_name.'.town_id','left');
            $this->db->join('admin', 'admin.admin_id = '.$this->_table_name.'.admin_id','left');
            // $this->db->join('call_center', 'call_center.call_center_id = '.$this->_table_name.'.call_center_id','left');
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



