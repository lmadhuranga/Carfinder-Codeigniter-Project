<?php

class  vehicle_model extends MY_Model
{
    protected $_table_name      ='vehicle';
    protected $_primary_key     ='vehicle_id';
    protected $_order_by        ='vehicle_id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'register_no',
                                	'label'=>'Register no',
                                	'rules'=>'required|trim|xss_clean|max_length[15]'
                                ),
								array(
                                	'field'=>'color',
                                	'label'=>'Color',
                                	'rules'=>'required|trim|xss_clean|max_length[10]'
                                ),
								array(
                                	'field'=>'image',
                                	'label'=>'Image',
                                	'rules'=>'required|trim|xss_clean|max_length[100]'
                                ),
								array(
                                	'field'=>'tank_liter',
                                	'label'=>'Tank liter',
                                	'rules'=>'trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'brand_id',
                                	'label'=>'Brand id',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'vehicle_type_id',
                                	'label'=>'Vehicle type id',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'auth',
                                	'label'=>'Auth',
                                	'rules'=>'trim|xss_clean|max_length[200]'
                                ),
                                array(
                                    'field'=>'status',
                                    'label'=>'Status',
                                    'rules'=>'required|trim|xss_clean|max_length[1]'
                                ),
                                array(
                                    'field'=>'starting_km',
                                    'label'=>'Last maintained km',
                                    'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                    'field'=>'maintain_km',
                                	'label'=>'Next Maintain Km',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'fuel_type_id',
                                	'label'=>'Fuel type', 
                                	'rules'=>'required|trim|xss_clean|max_length[1]'
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
     * Purpose of the function          Get to day availabel vehicle count
     * @return_type                     return int
     */
    public function get_unavailable($start_date,$end_date)
    {
        $this->load->model('today_vehicle_driver_model');
        // get availabel vehicle ids
        $available_drivers = $this->today_vehicle_driver_model->get_today_available_drivers();
        if (count($available_drivers)>0) { 
            $driver_id_array = array();
            foreach ($available_drivers as $key => $driver) {
                array_push($driver_id_array, $driver['vehicle_id']);
            }
            $this->db->where_not_in('vehicle_id',$driver_id_array);
            return  (int)$this->get_by(array('vehicle.status'=>'A'),array('vehicle_id,count(vehicle.vehicle_id) AS unavailable_count'),NULL,TRUE)->unavailable_count;
            
        }
        return 0;
      
    }//Function End get_unavailable()---------------------------------------------------FUNEND()

 


    // with join
    public function get_with_join($fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array')
    {
        if ($fields !==NULL)
        {
            $this->db->select($fields);
            // $this->db->from($this->_table_name);
            $this->db->join('vehicle_type', 'vehicle_type.vehicle_type_id = '.$this->_table_name.'.vehicle_type_id','left');
            $this->db->join('brand', 'brand.brand_id = '.$this->_table_name.'.brand_id','left');
            $this->db->join('fuel_type', 'fuel_type.fuel_type_id = '.$this->_table_name.'.fuel_type_id','left');
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



