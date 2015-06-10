<?php

class Today_vehicle_driver extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('today_vehicle_driver_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('today_vehicle_driver_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/today_vehicle_driver/index');
        $config['total_rows'] = $this->today_vehicle_driver_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->today_vehicle_driver_model->get_with_join('today_vehicle_driver_id,vehicle.register_no,driver.first_name as driver_name,note,start_time,end_time', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Today vehicle driver list';
        $this->data['sub_view'] = 'admin/today_vehicle_driver_list';

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
        $this->form_validation->set_rules($this->today_vehicle_driver_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               

            // get form data        
            $data = $this->post_get_as_array(array('vehicle_id', 'driver_id', 'note', 'start_time', 'end_time', ));           

            // data save
            if ($this->today_vehicle_driver_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('admin/today_vehicle_driver/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Today vehicle driver ';

        $this->data['sub_view'] = 'admin/today_vehicle_driver_add';

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
        $this->form_validation->set_rules($this->today_vehicle_driver_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
                        // get form data        
            $data = $this->post_get_as_array(array('vehicle_id', 'driver_id', 'note', 'start_time', 'end_time', ));           

            // data save                      
            if ($this->today_vehicle_driver_model->save($data, $this->input->post('today_vehicle_driver_id')) == TRUE)
            {
                redirect(site_url('admin/today_vehicle_driver/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->today_vehicle_driver_model->get('today_vehicle_driver_id,vehicle_id,driver_id,note,start_time,end_time', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Today vehicle driver';

        $this->data['sub_view'] = 'admin/today_vehicle_driver_edit';
        // load view
        $this->load->view('admin/_layout_modal',$this->data);

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
        $this->data['result'] = $this->today_vehicle_driver_model->get_with_join('today_vehicle_driver_id,today_vehicle_driver.vehicle_id, vehicle.register_no, today_vehicle_driver.driver_id,vehicle.register_no, driver.first_name as driver_name,today_vehicle_driver.note,today_vehicle_driver.start_time,today_vehicle_driver.end_time', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'admin/today_vehicle_driver_view';
        // load view
        $this->load->view('admin/_layout_modal',$this->data);
    }

	
    /*************************Start Function delete()***********************************/
    //Owner :                           Madhuranga Senadheera
    //                                  status change  
    //@ type :
    //#return type :
    function delete($id)
    {
                  
        // status change                     
        if ($this->today_vehicle_driver_model->save(array('status'=>'D'),$id) == TRUE)
        {
            redirect(site_url('admin/today_vehicle_driver/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('admin/today_vehicle_driver/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        




    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          validate_today
     * @return_type                     return_type
     */
    public function validate_enter_exit_time()
    {
        $data = $this->post_get_as_array(array('start_time','end_time'));

        if (!is_null($data['end_time']) )
        {
            if (is_null($data['start_time']))
            {
                // Please enter start time
                $this->form_validation->set_message('validate_enter_exit_time', 'Please enter valid date'); 
                return FALSE;
            }
            else
            {
 
                // valide
                if ($this->is_back_date($data['start_time'],$data['end_time']))
                {
                    return TRUE;
                }
                // invalid
                else
                {
                    // End time should be past time
                    $this->form_validation->set_message('validate_enter_exit_time', 'End time should be past time..'); 
                    return FALSE;
                }
            }
        } 
        
        return TRUE;      

    }
    /*---------------- ---------End of validate_enter_exit_time()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          is availabel vehicle in today
     * @return_type                     return_type
     */
    public function vehicle_availability($vehicle_id)
    {
        
    }
    /*---------------- ---------End of vehicle_availability()---------------------------*/
    
     
}

/* End of file today_vehicle_driver.php */
/* Location: ./system/application/controllers/today_vehicle_driver.php */