<?php

class  chat_model extends MY_Model
{
    protected $_table_name      ='chat';
    protected $_primary_key     ='chat_id';
    protected $_order_by        ='chat_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                        array(
                            'field'=>'admin_id',
                            'label'=>'Admin User',
                            'rules'=>'trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'driver_id',
                            'label'=>'Driver User',
                            'rules'=>'trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'massage',
                            'label'=>'Massage',
                            'rules'=>'trim|xss_clean|max_length[45]'
                        ),
                        array(
                            'field'=>'status',
                            'label'=>'Status',
                            'rules'=>'trim|xss_clean|max_length[1]'
                        ),
                        array(
                            'field'=>'read',
                            'label'=>'Read',
                            'rules'=>'trim|xss_clean|max_length[1]'
                        )
                    );
    public $rules_admin_ajax_get = array(
                        array(
                        	'field'=>'last_chat_id',
                        	'label'=>'Last Chat Id',
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
            $this->db->where(array('chat.status'=>"A"));
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

        $this->db->order_by($this->_order_by,'asc'); 

        $this->db->limit($perpage,$start);
        return $this->db->get($this->_table_name)->$method($array); 

    }     // get_with_join()-----------------------------fun()

 

       // with join
    public function get_with_join_driver($last_read_chat_id=0,$fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $startdate = $this->data['today'];
            $enddate = $this->data['tomorrow'];
            $this->db->select($fields);
  
            $this->db->where("(chat.chat_id > '".$last_read_chat_id."') AND (chat.status='A') AND (chat.created BETWEEN ('".$startdate."') AND ('".$enddate."'))");
 

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

        $this->db->order_by('chat.created', 'desc');
        $this->db->limit($perpage,$start);
        return $this->db->get($this->_table_name)->$method($array); 

    }     // get_with_join()-----------------------------fun()

 
    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



