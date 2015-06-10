<?php
/**
*
*
* @copyright  2014
* @license    None
* @version    1.0
* @link       None
* @since      Class available since Release 1.0
*
**/		

/***********************************************************************************/
/*                                                                                 */
/* File Name     : dashboard.php                              					   */
/* Purpose       : 													           	   */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/



class Dashboard extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('journey_model');
        $this->load->model('vehicle_log_model');
	}



	/**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     */

    public function index() 
    {
 
        $this->load->model('driver_model');
        $this->data['sub_view'] = 'admin/dashboard_view';
        // formating monthly earn value



        $return = $this->journey_model->get_year_hire_count();
 
        $year_value_array = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0);
        foreach ($return as $key => $month_value) {
            $chart_month = ((int)$month_value['month']-1);
            $year_value_array[$chart_month] = (int)$month_value['jouney_count'];
        }

        $this->data['get_year_hire_count'] = json_encode($year_value_array);


        // formating monthly travel distance 
        $return = $this->journey_model->get_year_km_count(TRUE);     
        $year_earns_by_month = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0);
        $year_value_array = array();
        foreach ($return as $key => $value)
        {
            $driver_id = (int)$value['driver_id'];
            $year_value_array[$driver_id]['data'] = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0);

        }



 

        foreach ($return as $key => $month_value)
        {
            $chart_month = ((int)$month_value['month']-1);
            //$year_earns_by_month[$chart_month] = $year_earns_by_month[$month_value['month']]+(int)$month_value['km_count'];
            $driver_id = (int)$month_value['driver_id'];
            $year_value_array[$driver_id]['data'][ $chart_month] = (int)$month_value['km_count'];
            $year_value_array[$driver_id]['name']  =  $month_value['driver_name'];
        } 



        $value_of_traveled_distance = array();
        foreach ($year_value_array as $key => $value) {

            array_push($value_of_traveled_distance ,  $value);
        }
 
      

        $sum_km_array = array('name'=>'Total1','data'=>$year_earns_by_month) ; 

        // array_push($value_of_traveled_distance, $sum_km_array);

    	$this->data['get_year_km_count'] = json_encode($value_of_traveled_distance);

        /// get journey count
        $this->data['today_hired_count'] =   $this->journey_model->today_get_hired_count(); 

        $this->data['offline_vehicle_count'] =   $this->vehicle_log_model->get_offline_user_count($this->data['today'],$this->data['tomorrow']); 

        $this->data['driver_count_by_date_range'] =   $this->driver_model->get_driver_count_by_date_range($this->data['today'],$this->data['tomorrow']); 

    	$this->data['meta_title'] = 'Dashboard';
 

       	$this->load->view('admin/_layout_main',$this->data);      

    }
 



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @return_type                     
     */

    public function get_dashbord_summery_count_row()
    {  


        $this->load->model('vehicle_model');
        $this->load->model('website_booking_model');

        $json_return_array = array(); 
        $json_return_array['get_unavailable'] = $this->vehicle_model->get_unavailable($start_date=$this->data['today'],$end_date=$this->data['tomorrow']);
        $json_return_array['unreaded_booking_count'] = $this->website_booking_model->get_unreaded_booking_count($start_date=$this->data['today'],$end_date=$this->data['tomorrow']);

        // return the massage
        echo(json_encode($json_return_array));
        exit();
    }//Function End get_dashbord_summery_count_row()---------------------------------------------------FUNEND()   


}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */

 ?>