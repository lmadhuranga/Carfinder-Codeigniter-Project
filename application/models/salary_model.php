<?php

class  salary_model extends MY_Model
{
    protected $_table_name      ='salary';
    protected $_primary_key     ='salary_id';
    protected $_order_by        ='salary_id';
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
           'field'=>'cash',
           'label'=>'Cash',
           'rules'=>'required|trim|integer|xss_clean|max_length[11]'
           ),
        array(
           'field'=>'paid_date',
           'label'=>'Paid date',
           'rules'=>'required|trim|xss_clean'
           ),
        array(
           'field'=>'note',
       'label'=>'Note',
           'rules'=>'trim|xss_clean|max_length[220]'
           ),
        array(
           'field'=>'type',
           'label'=>'Type',
           'rules'=>'trim|xss_clean|max_length[10]'
           ),
        array(
           'field'=>'status',
           'label'=>'Status',
           'rules'=>'trim|xss_clean|max_length[5]'
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
            $this->db->join('admin', 'admin.admin_id = '.$this->_table_name.'.admin_id','left');
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

        $this->db->order_by('salary.salary_id', 'desc');
          
        $this->db->limit($perpage,$start);
        return $this->db->get($this->_table_name)->$method($array); 

    }     // get_with_join()-----------------------------fun()



}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



