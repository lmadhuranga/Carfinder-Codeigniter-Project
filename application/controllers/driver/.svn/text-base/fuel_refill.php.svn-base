<?php

class Fuel_refill extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('fuel_refill_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('fuel_refill_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('driver/fuel_refill/index');
        $config['total_rows'] = $this->fuel_refill_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->fuel_refill_model->get_with_join('fuel_refill_id,driver.first_name AS driver_name,register_no AS vehicle,fuel_center.name AS fuel_center_name ,fuel_refill.note, DATE(date) AS date,liter,fuel_unit_price,reciept_img', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Fuel refill list';
        $this->data['sub_view'] = 'driver/fuel_refill_list';

        $this->load->view('driver/_layout_main',$this->data);

        // $this->load->view('driver/components/page_head');
        // $this->load->view('driver/driver/temp_nav');
        // // $this->load->view('driver/temp_body');
        // $this->load->view('fuel_refill_list', $this->data); 
        // $this->load->view('driver/components/page_tail');
        //$this->template->load('content', 'fuel_refill_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template

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
        $this->form_validation->set_rules($this->fuel_refill_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               
            // get form data        
            $data = $this->post_get_as_array(array('driver_id','vehicle_id','fuel_center_id','note','date','liter','fuel_unit_price','reciept_img',));
           
            // data save
            if ($this->fuel_refill_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('driver/fuel_refill/index/?msg_success=Successfully details updated/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Fuel refill ';

        $this->data['sub_view'] = 'driver/fuel_refill_add';

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
        $this->form_validation->set_rules($this->fuel_refill_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('driver_id','vehicle_id','fuel_center_id','note','date','liter','fuel_unit_price','reciept_img',));
           
            // data save                      
            if ($this->fuel_refill_model->save($data, $this->input->post('fuel_refill_id')) == TRUE)
            {
                redirect(site_url('driver/fuel_refill/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->fuel_refill_model->get('fuel_refill_id,driver_id,fuel_center_id,note,date,liter,fuel_unit_price,reciept_img,vehicle_id', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Fuel refill';

        $this->data['sub_view'] = 'driver/fuel_refill_edit';
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
        $this->data['result'] = $this->fuel_refill_model->get_with_join('fuel_refill_id,driver.first_name AS driver_name,register_no,fuel_center.name AS fuel_center_name,fuel_refill.note,date,liter,fuel_unit_price,reciept_img,fuel_refill.vehicle_id', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'driver/fuel_refill_view';
        // load view
        $this->load->view('driver/_layout_modal',$this->data);
    }

	
    /*************************Start Function delete()***********************************/
    //Owner :                           Madhuranga Senadheera
    //                                  status change  
    //@ type :
    //#return type :
    function delete($id)
    {
                  
        // status change                     
        if ($this->fuel_refill_model->save(array('status'=>'I'),$id) == TRUE)
        {
            redirect(site_url('driver/fuel_refill/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('driver/fuel_refill/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          add as fuel refill descript using phone app
     * @return_type                     json
     */
    public function ajax_add()
    {
        $this->load->model('driver_model');
        // json array
        $json_return_array = array();

        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->fuel_refill_model->rules_ajax_add);
        if ($this->form_validation->run() == false)
        { 
             $json_return_array['msg'] = validation_errors(); 
             $json_return_array['status'] = 'error'; 
             $json_return_array['status_code'] = 'validation_errors'; 
        }
        else
        {
            // /get post data to array
            $data = $this->post_get_as_array(array('driver_id','vehicle_id','fuel_center_id','note','date','liter','fuel_unit_price'));
            $data['date']  = $this->get_now();
            $data['vehicle_id']  = $this->driver_model->get_current_vehicle_id();
            $data['driver_id']  = $this->driver_model->get_current_user_id();  
                // $json_return_array['msg'] = $data; 
                    
             
            // // data save
            if ($this->fuel_refill_model->save($data)==TRUE)
            {
 
                $json_return_array['msg'] = 'Successfully updated'; 
                $json_return_array['status'] = 'success'; 
                $json_return_array['status_code'] = 'data_inserted';
            }
            else
            {
                // no save error display
                $json_return_array['msg'] = 'Unsuccessfully operation'; 
                $json_return_array['status'] = 'error'; 
                $json_return_array['status_code'] = 'data_not_insert';

            }
 
            
        } 

        // return json object for mobile
        echo(json_encode($json_return_array));
        exit();
    }
    /*---------------- ---------End of ajax_add()---------------------------*/
    



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get last 10 chat list
     * @return_type                     json
     */
    public function ajax_get()
    {

        $json_return_array = array();
        // load form valition 
 
        $this->db->where(array('fuel_refill.driver_id'=> $data['driver_id']  = $this->driver_model->get_current_user_id()));
        $result = $this->fuel_refill_model->get_with_join('fuel_refill_id,driver.first_name AS driver_name,register_no AS vehicle,fuel_center.name AS fuel_center_name ,fuel_refill.note,date,liter,fuel_unit_price,reciept_img', NULL, FALSE,10);
        if (count($result)>0) {
 
            $json_return_array['status']    = 'success';
            // get last 10 chat convertions
            $json_return_array['refill_history']= $result;
        }
        else
        {
             // validation error
            $json_return_array['msg']       = 'No chat data';
            $json_return_array['status']    = 'no_data';
            $json_return_array['error_code']= 'no_data';
        }
 

        
        // var_dump($json_return_array);

        echo(json_encode($json_return_array));
        exit();
    }
    /*---------------- ---------End of ajax_add()---------------------------*/
    
     
}

/* End of file fuel_refill.php */
/* Location: ./system/application/controllers/fuel_refill.php */