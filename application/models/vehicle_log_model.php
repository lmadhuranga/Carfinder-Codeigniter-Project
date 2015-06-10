<?php

class  vehicle_log_model extends MY_Model
{
    protected $_table_name      ='vehicle_log';
    protected $_primary_key     ='vehicle_log_id';
    protected $_order_by        ='vehicle_log_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                         array(
                            'field'=>'vehicle_id',
                            'label'=>'Vehicle id',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'driver_id',
                            'label'=>'Driver id',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'town_id',
                            'label'=>'Town name',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
                        array(
                            'field'=>'vehicle_status_id',
                            'label'=>'Vehicle status id',
                            'rules'=>'required|trim|integer|xss_clean|max_length[11]'
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
                        )
                    );

    public $ajax_rules = array(
                        array(
                        	'field'=>'town_id',
                        	'label'=>'Town name',
                        	'rules'=>'trim|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'vehicle_status_id',
                        	'label'=>'Vehicle status id',
                        	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
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


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get currentyly hireding people
     * @return_type                     return_type
     */
    public function get_hiring_driver_list()
    {
        return $this->vehicle_log_model->get_by(array('vehicle_status_id'=>'7'),array('driver_id'),$id=NULL,FALSE,20);

    }
    /*---------------- ---------End of get_hiring_peoples()---------------------------*/
    

    // with join
    public function get_with_join($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->_order_by = 'vehicle_id';

            $this->db->select($fields);
            $this->db->join('driver', 'driver.driver_id = '.$this->_table_name.'.driver_id','left');
            $this->db->join('vehicle', 'vehicle.vehicle_id = '.$this->_table_name.'.vehicle_id','left');
            $this->db->join('town', 'town.town_id = '.$this->_table_name.'.town_id','left');
            $this->db->join('vehicle_status', 'vehicle_status.vehicle_status_id = '.$this->_table_name.'.vehicle_status_id','left');
            $this->db->group_by('vehicle.vehicle_id');
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

        /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Get offlin user count
     * @return_type                     return_type
     */
    public function get_offline_user_count($start_time,$end_time)
    {

        $this->db->where("created BETWEEN ('".$start_time."') AND ('".$end_time."')");
        $this->get_by(array('vehicle_status_id'=>'2'), array('count(vehicle_id) as offline_count'), $id = NULL, $single = FALSE, $perpage=100);
        if (@is_null($return->offline_count))
        {
            return 0;
        } else {
            # code...
            return $return->offline_count;
        }
        
 
    }//Function End get_year_hire_count()---------------------------------------------------FUNEND()



    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera
