<?php

class Salary extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('salary_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('salary_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('driver/salary/index');
        $config['total_rows'] = $this->salary_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->salary_model->get_with_join('salary_id,driver.first_name AS driver_name,cash,paid_date,note', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Salary list';
        $this->data['sub_view'] = 'driver/salary_list';

        $this->load->view('driver/_layout_main',$this->data);

        // $this->load->view('temp/components/page_head');
        // $this->load->view('temp/driver/temp_nav');
        // // $this->load->view('temp/temp_body');
        // $this->load->view('salary_list', $this->data); 
        // $this->load->view('temp/components/page_tail');
        //$this->template->load('content', 'salary_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template

	}//Function End get()---------------------------------------------------FUNEND()
 

    /*************************Start Function view()***********************************/
    //Owner : Madhuranga Senadheera
    // View individual 
    //@ type :
    //#return type :
    function view($id1)
    {
        // $ID =  $this->uri->segment(3);
        $ID = $id1;
        //  get data
        $this->data['result'] = $this->salary_model->get_with_join('salary_id,driver.first_name AS driver_name,cash,paid_date,note', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'driver/salary_view';
        // load view
        $this->load->view('driver/_layout_modal',$this->data);
    }

	 
}

/* End of file salary.php */
/* Location: ./system/application/controllers/salary.php */