<?php

class Report extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{ 
        $this->data['meta_title'] = $this->data['meta_title'].' - Admin list';
        $this->data['sub_view'] = 'admin/report_list';

        $this->load->view('admin/_layout_main',$this->data);
 

    }//Function End get()---------------------------------------------------FUNEND()

     
    
    /*************************Start Function driver_present()****************/
    //Owner : Madhuranga Senadheera
    // report generate 
    //@ type :
    //#return type :
    function report_driver_cash_month($pdf_requers=NULL)
    {   $startdate='2014-01-01';
        $enddate='2015-01-01';
        $this->load->model('driver_model');
       

        $this->data['results']  = $this->driver_model->report_driver_by_month($startdate,$enddate);

        $this->data['results2'] = $this->driver_model->report_driver_by_month_sum($startdate,$enddate);        

        $this->data['sub_view'] = 'admin/report_driver_cash_month';

        $this->data['file_name'] = 'report_driver_cash_month';
        
         // downlod report
        if (!is_null($pdf_requers)) { 
            $pdf_name = $this->mpdf_creater($this->data);  
            redirect(base_url('downloads/pdf/'.$pdf_name));
            exit();
        }
        $this->load->view('admin/_layout_main',$this->data);       

    }//Function End driver_present()----------------------------------FUNEND()
         
    
    /*************************Start Function driver_present()****************/
    //Owner : Madhuranga Senadheera
    // report generate 
    //@ type :
    //#return type :
    function report_driver_km_today($pdf_requers=NULL)
    {     
        $this->load->model('driver_model');
 
        $startdate  = $this->data['today'];
        $enddate   = $this->data['tomorrow'];

        $this->data['results']  = $this->driver_model->report_driver_km_today($startdate,$enddate);        

        // $this->data['results2'] = $this->driver_model->report_driver_cash_today_sum($startdate,$enddate);        
        

        $this->data['sub_view'] = 'admin/report_driver_km_today';
            
        // downlod report
        if (!is_null($pdf_requers)) { 
            $pdf_name = $this->mpdf_creater($this->data);  
            redirect(base_url('downloads/pdf/'.$pdf_name));
            exit();
        }
        $this->load->view('admin/_layout_main',$this->data);       

    }//Function End driver_present()----------------------------------FUNEND()
    
    
    /*************************Start Function driver_present()****************/
    //Owner : Madhuranga Senadheera
    // report generate 
    //@ type :
    //#return type :
    function report_driver_cash_date($pdf_requers=NULL)
    {     
        $this->load->model('driver_model');
 
        $startdate  = '2014-05-01';
        $enddate   = '2014-10-01';

        $this->data['results']  = $this->driver_model->report_driver_by_date($startdate,$enddate);        

        $this->data['results2'] = $this->driver_model->report_driver_by_date_sum($startdate,$enddate);        
        $this->data['sub_view'] = 'admin/report_driver_cash_date';

        
        // downlod report
        if (!is_null($pdf_requers)) { 
            $pdf_name = $this->mpdf_creater($this->data);  
            redirect(base_url('downloads/pdf/'.$pdf_name));
            exit();
        }

        $this->load->view('admin/_layout_main',$this->data);       

    }//Function End driver_present()----------------------------------FUNEND()
    



    /*************************Start Function driver_present()****************/
    //Owner : Madhuranga Senadheera
    // report generate 
    //@ type :
    //#return type :
    function report_earns_in_year_highchart($start=NUll,$end_data=NULL)
    {     


        $this->load->model('driver_model');
        $this->load->model('cash_log_model');
        // $this->data['results'] = $this->journey_model->get_by($where='', $fields = NULL, $id = NULL, $single = FALSE, $perpage=0, $start=0, $array='array');
        
        // $this->data['results'] = $this->driver_model->report_driver_by_date();
        $startdate  = '2014-01-01';
        $enddate   = '2015-01-01';

        $return =  $this->driver_model->report_driver_by_month($startdate,$enddate);

        $json = array();
        foreach ($return as $key => $value) {
            // var_dump($value);
            $timstamp = (human_to_unix($value->start_time).'000');

            array_push($json, array(($timstamp*1),intval($value->cash_sum)));
        }
 
        $this->data['results_json']  = $json;
        // $this->data['results2'] = $this->driver_model->report_driver_by_date_sum($startdate,$enddate);        
        
        $this->data['sub_view'] = 'admin/report_earns_in_year_highchart';
        
        $this->load->view('admin/_layout_main',$this->data);       

    }//Function End driver_present()----------------------------------FUNEND()
    

    /*************************Start Function today_earn()****************/
    //Owner : Madhuranga Senadheera
    //              Show today earn money
    //@ type :
    //#return type :
    function today_earn_value_driver_wise($pdf_requers=NULL)
    { 
        $this->load->model('driver_model');
        
        $startdate  = $this->data['today'];
        $enddate    = $this->data['tomorrow'];
        // get data for table view 
        $this->data['results']  = $this->driver_model->report_driver_by_date($startdate,$enddate);

        // format data for pie chart
        $this->data['piechart_json_array']  = array();
        foreach ($this->data['results'] as $key => $value) {
            array_push($this->data['piechart_json_array'] , array('name'=>$value->driver_name,'y'=>(int) $value->cash_sum));
        }
        // send sum for the table
        $this->data['results2'] = $this->driver_model->report_driver_by_date_sum($startdate,$enddate);        
        // load vies
        $this->data['sub_view'] = 'admin/today_earn_value_driver_wise';
        $this->data['title'] = 'today_earn_value_driver_wise';

        // downlod report
        if (!is_null($pdf_requers)) { 
            $pdf_name = $this->mpdf_creater($this->data);  
            redirect(base_url('downloads/pdf/'.$pdf_name));
            exit();
        }
        
        $this->load->view('admin/_layout_main',$this->data);       

    }//Function End today_earn()----------------------------------FUNEND()
    

    
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin.php */


