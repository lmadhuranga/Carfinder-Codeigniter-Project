<?php

class Cash_log extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('cash_log_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('cash_log_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('driver/cash_log/index');
        $config['total_rows'] = $this->cash_log_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->cash_log_model->get_with_join('cash_log.cash_log_id,cash_log.cash,vehicle.register_no, driver.first_name, journey.end_place', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Cash log list';
        $this->data['sub_view'] = 'driver/cash_log_list';

        $this->load->view('driver/_layout_main',$this->data);

        // $this->load->view('driver/components/page_head');
        // $this->load->view('driver/driver/admin_nav');
        // // $this->load->view('driver/admin_body');
        // $this->load->view('cash_log_list', $this->data); 
        // $this->load->view('driver/components/page_tail');
        //$this->adminlate->load('content', 'cash_log_list', $this->data); // if have adminlate library , http://maestric.com/doc/php/codeigniter_adminlate

	}//Function End get()---------------------------------------------------FUNEND()


	
    /*************************Start Function add()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
    function add()
    {    
        // load form vadaiton
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
        $this->form_validation->set_rules($this->cash_log_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               

            // get form data        
            $data = $this->post_get_as_array(array('vehicle_id', 'driver_id', 'journey_id', 'cash', ));           

            // data save
            if ($this->cash_log_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('driver/cash_log/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Cash log ';

        $this->data['sub_view'] = 'driver/cash_log_add';

        $this->load->view('driver/_layout_modal',$this->data); 

    }//Function End add()---------------------------------------------------FUNEND()
    

    /*************************Start Function edit()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
    function edit($id1)
    {   
        $ID = $id1;

        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->cash_log_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('vehicle_id', 'driver_id', 'journey_id', 'cash', ));           
            
            // data save                      
            if ($this->cash_log_model->save($data, $this->input->post('cash_log_id')) == TRUE)
            {
                redirect(site_url('driver/cash_log/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->cash_log_model->get('cash_log_id,vehicle_id,driver_id,journey_id,cash', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Cash log';

        $this->data['sub_view'] = 'driver/cash_log_edit';
        // load view
        $this->load->view('driver/_layout_modal',$this->data);

    }//Function End edit()---------------------------------------------------FUNEND()
    

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
        $this->data['result'] = $this->cash_log_model->get_with_join('cash_log.cash_log_id,cash_log.vehicle_id,cash_log.driver_id,cash_log.journey_id,cash_log.cash,vehicle.register_no, driver.first_name, journey.end_place', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'driver/cash_log_view';
        // load view
        $this->load->view('driver/_layout_modal',$this->data);
    }

	
    function delete()
    {
        $ID =  $this->uri->segment(3);
        $this->cash_log_model->delete($ID);             
        redirect(site_url('driver/cash_log/index'));
    }
}

/* End of file cash_log.php */
/* Location: ./system/application/controllers/cash_log.php */