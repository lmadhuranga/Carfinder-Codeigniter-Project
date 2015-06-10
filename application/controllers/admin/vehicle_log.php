<?php

class Vehicle_log extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('vehicle_log_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('vehicle_log_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/vehicle_log/index');
        $config['total_rows'] = $this->vehicle_log_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->vehicle_log_model->get_with_join('vehicle_log_id,vehicle.register_no as vehicle,driver.last_name as Driver,vehicle_status.status as vehicle_status,vehicle_log.lat,vehicle_log.lon,town.name as town_name', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Vehicle log list';
        $this->data['sub_view'] = 'admin/vehicle_log_list';

        $this->load->view('admin/_layout_main',$this->data);

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
        $this->form_validation->set_rules($this->vehicle_log_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               
            // get form data        
           $data = $this->post_get_as_array(array('vehicle_id', 'driver_id', 'vehicle_status_id', 'vehicle_log.lat', 'lon','lat','town_id', ));
 
            // data save
            if ($this->vehicle_log_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('admin/vehicle_log/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Vehicle log ';

        $this->data['sub_view'] = 'admin/vehicle_log_add';

        $this->load->view('admin/_layout_modal',$this->data); 

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
        $this->form_validation->set_rules($this->vehicle_log_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
             // get form data        
            $data = $this->post_get_as_array(array('vehicle_id', 'driver_id', 'vehicle_status_id', 'lat', 'lon','town_id' ));

            // data save                      
            if ($this->vehicle_log_model->save($data, $this->input->post('vehicle_log_id')) == TRUE)
            {
                redirect(site_url('admin/vehicle_log/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->vehicle_log_model->get('vehicle_log_id,vehicle_id,driver_id,vehicle_status_id,vehicle_log.lat,vehicle_log.lon,town_id', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Vehicle log';

        $this->data['sub_view'] = 'admin/vehicle_log_edit';
        // load view
        $this->load->view('admin/_layout_modal',$this->data);

    }//Function End edit()---------------------------------------------------FUNEND()
    

    /*************************Start Function view()***********************************/
    //Owner : Madhuranga Senadheera
    // View individual 
    //@ type :
    //#return type :
    function view($id)
    {
 
        //  get data
        // get_with_join('vehicle_log_id,vehicle.register_no as vehicle,driver.last_name as Driver,vehicle_status.status as vehicle_status,vehicle_log.lat,lon',
        $this->data['result'] = $this->vehicle_log_model->get_with_join('vehicle_log_id,vehicle_log.vehicle_id,vehicle.register_no,vehicle_log.driver_id, driver.last_name as driver_name,vehicle_log.vehicle_status_id,vehicle_status.status as vehicle_status,vehicle_log.lat,vehicle_log.lon,town.name as town_name,vehicle_log.town_id', $id,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - View Vehicle log';
        $this->data['sub_view'] = 'admin/vehicle_log_view';
        // load view
        $this->load->view('admin/_layout_modal',$this->data);
    }

	

    /**
     * @author                             Madhuranga Senadheera
     * Purpose of the function          Delete items then redirect to list
     * 
     */

    function delete($id)
    { 
         // data removed                      
        if ($this->vehicle_log_model->delete($id)==TRUE)
        {
            redirect(site_url('admin/vehicle_log/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('admin/vehicle_log/index/?msg_error=Unsuccess full opertation'));

        }
     
    }
    /*--------------------------End of delete()---------------------------*/
 



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          View vehicles current locaiton map view
     * @return_type                     
     */
    public function current_locaitons()
    {
         
        //  get data
        // get_with_join('vehicle_log_id,vehicle.register_no as vehicle,driver.last_name as Driver,vehicle_status.status as vehicle_status,vehicle_log.lat,lon',
        // $this->data['result'] = $this->vehicle_log_model->get_with_join('vehicle_log_id,vehicle_log.vehicle_id,vehicle.register_no,vehicle_log.driver_id, driver.last_name as driver_name,vehicle_log.vehicle_status_id,vehicle_status.status as vehicle_status,vehicle_log.lat,lon', $id,TRUE,1,0);
        
        $this->data['result'] = $this->vehicle_log_model->get_with_join('vehicle_log_id,vehicle_log.vehicle_id,vehicle.register_no,vehicle_log.driver_id, driver.last_name as driver_name,vehicle_log.vehicle_status_id,vehicle_status.status as vehicle_status,vehicle_status.image as vehicle_status_image,vehicle_log.lat,vehicle_log.lon,vehicle_log.created', NULL,FALSE,15,0);
 
        $this->data['meta_title'] = $this->data['meta_title'].' - View Vehicle log';
        // $this->data['sub_view'] = 'admin/vehicle_log_current_locaitons_map_view';
        // load view
        // $this->load->view('admin/_layout_main',$this->data);
        $this->load->view('admin/vehicle_log_current_locaitons_map_view',$this->data);
    }
    /*---------------- ---------End of current_locaitons_map()---------------------------*/
    


    
}

/* End of file vehicle_log.php */
/* Location: ./system/application/controllers/vehicle_log.php */