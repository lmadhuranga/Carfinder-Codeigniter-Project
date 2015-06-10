<?php

class  journey_model extends MY_Model
{
    protected $_table_name      ='journey';
    protected $_primary_key     ='journey_id';
    protected $_order_by        ='journey_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                    'field'=>'start_time',
                                    'label'=>'Start time',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'end_time',
                                    'label'=>'End time',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'start_place',
                                    'label'=>'Start place',
                                    'rules'=>'required|trim|xss_clean|max_length[45]'
                                ),
                                array(
                                    'field'=>'end_place',
                                    'label'=>'End place',
                                    'rules'=>'trim|xss_clean|max_length[45]'
                                ),
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
                                    'field'=>'start_town_id',
                                    'label'=>'Start town id',
                                    'rules'=>'trim|integer|xss_clean|max_length[11]'
                                ),
                                array(
                                    'field'=>'end_town_id',
                                    'label'=>'End town id',
                                    'rules'=>'trim|integer|xss_clean|max_length[11]'
                                ),
                                array(
                                    'field'=>'km',
                                    'label'=>'Traveled distance',
                                    'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
                                array(
                                    'field'=>'pasenger_count',
                                    'label'=>'Passenger count',
                                    'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
                                array(
                                    'field'=>'cash',
                                    'label'=>'Cash',
                                    'rules'=>'trim|integer|xss_clean|max_length[11]'
                                ),
                                array(
                                    'field'=>'meter_value',
                                    'label'=>'Current Meter value',
                                    'rules'=>'trim|integer|xss_clean|max_length[155]'
                                ),
                                array(
                                    'field'=>'note',
                                    'label'=>'Note',
                                    'rules'=>'trim|xss_clean|max_length[65535]'
                                ),
                                array(
                                    'field'=>'start_lat',
                                    'label'=>'Start lat',
                                    'rules'=>'trim|xss_clean|max_length[45]'
                                ),
                                array(
                                    'field'=>'start_lon',
                                    'label'=>'Start lon',
                                    'rules'=>'trim|xss_clean|max_length[45]'
                                ),
                                array(
                                    'field'=>'end_lat',
                                    'label'=>'End lat',
                                    'rules'=>'trim|xss_clean|max_length[45]'
                                ),
                                array(
                                    'field'=>'end_lon',
                                    'label'=>'End lon',
                                    'rules'=>'trim|xss_clean|max_length[45]'
                                )
        );

    // ajax validtion rules
    public $ajax_rules = array(
                        array(
                        	'field'=>'start_time',
                        	'label'=>'Start time',
                        	'rules'=>'trim|xss_clean'
                        ),
						array(
                        	'field'=>'end_time',
                        	'label'=>'End time',
                        	'rules'=>'trim|xss_clean'
                        ),
						array(
                        	'field'=>'start_place',
                        	'label'=>'Start place',
                        	'rules'=>'required|trim|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'end_place',
                        	'label'=>'End place',
                        	'rules'=>'trim|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'vehicle_id',
                        	'label'=>'Vehicle id',
                        	'rules'=>'trim|integer|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'driver_id',
                        	'label'=>'Driver id',
                        	'rules'=>'trim|integer|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'start_town_id',
                        	'label'=>'Start town id',
                        	'rules'=>'trim|integer|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'end_town_id',
                        	'label'=>'End town id',
                        	'rules'=>'trim|integer|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'km',
                        	'label'=>'Traveled distance',
                        	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'pasenger_count',
                        	'label'=>'Passenger count',
                        	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'cash',
                        	'label'=>'Cash',
                        	'rules'=>'trim|integer|xss_clean|max_length[11]'
                        ),
						array(
                        	'field'=>'note',
                        	'label'=>'Note',
                        	'rules'=>'trim|xss_clean|max_length[65535]'
                        ),
						array(
                        	'field'=>'start_lat',
                        	'label'=>'Start lat',
                        	'rules'=>'trim|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'start_lon',
                        	'label'=>'Start lon',
                        	'rules'=>'trim|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'end_lat',
                        	'label'=>'End lat',
                        	'rules'=>'trim|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'end_lon',
                        	'label'=>'End lon',
                        	'rules'=>'trim|xss_clean|max_length[45]'
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
     * Purpose of the function          get meter value each vehicle
     * @return_type                     return_type
     */
    public function get_vehicle_meter_value($id)
    {
        $this->db->order_by('journey_id', 'desc');
        return $this->get_by(array('vehicle_id'=>$id),array('meter_value'),$id,TRUE,1,0); 
    }
    /*---------------- ---------End of get_vehicle_meter_value()---------------------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @return_type                     return_type
     */
    public function get_year_hire_count($start_year='2014-01-01',$end_year='2015-01-01')
    {
        $this->db->group_by('MONTH(journey.start_time)');
        $this->db->where("journey.start_time BETWEEN ('".$start_year."') AND ('".$end_year."')");
        $this->db->join('driver', 'journey.driver_id = driver.driver_id', 'left');
        return $this->get_by(array('journey.status'=>'A'), array('driver.driver_id,MONTH(journey.start_time) as month ,count(journey_id) as jouney_count'), $id = NULL, $single = FALSE, $perpage=100);
 
    }//Function End get_year_hire_count()---------------------------------------------------FUNEND()

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @return_type                     return_type
     */
    public function get_year_km_count($driver=NULL,$start_year='2014-01-01',$end_year='2015-01-01')
    {
        $select = array('MONTH(journey.start_time) AS month' ,'SUM(journey.km) AS km_count');
        
        if (!is_null($driver)) {
            array_push($select, 'journey.driver_id');
            array_push($select, 'driver.last_name AS driver_name');
            $this->db->group_by('journey.driver_id,MONTH(journey.start_time)');
        }
        else {
            $this->db->group_by('MONTH(start_time)');
        }
         
        $this->db->join('driver', 'journey.driver_id = driver.driver_id', 'left');
        $this->db->where("journey.start_time BETWEEN ('".$start_year."') AND ('".$end_year."')");
        return $this->get_by(array('journey.status'=>'A'),$select , $id = NULL, $single = FALSE, $perpage=100);
 
    }//Function End get_year_hire_count()---------------------------------------------------FUNEND()


        // with join
    public function get_with_join($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->db->select($fields);
            // $this->db->from($this->_table_name);
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

        $this->db->order_by('journey_id', 'desc');
        $this->db->limit($perpage,$start);
        return $this->db->get($this->_table_name)->$method($array); 
        
    }



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get today hired user
     * @return_type                     return_type
     */
    public function today_get_hired_count()
    {
         $this->db->where("journey.start_time BETWEEN ('".$this->data['today']."') AND ('".$this->data['tomorrow']."')");
         // $this->db->where("journey.created BETWEEN ('2014-09-09') AND ('2014-09-10')");
        $this->db->join('driver', 'journey.driver_id = driver.driver_id', 'left');
        $result = $this->get_by(array('journey.status'=>'A'), array(' count(journey_id) as jouney_count'), $id = NULL, $single = TRUE, $perpage=100);
 
        return($result->jouney_count);
 
    }
    /*---------------- ---------End of today_get_hired()---------------------------*/
    
    

    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



