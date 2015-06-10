<?php

class Vehicle extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('vehicle_model');
	}	
	
	function index()
	{

        // $this->load->model('vehicle_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/vehicle/index');
        $config['total_rows'] = $this->vehicle_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->vehicle_model->get_with_join('vehicle_id,register_no,vehicle.image,status,vehicle_type.type as vehicle_type', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Vehicle list';
        $this->data['sub_view'] = 'admin/vehicle_list';
        $this->load->view('admin/_layout_main',$this->data);
 
	}
 
	
    function add()
    {        
        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
        $this->form_validation->set_rules($this->vehicle_model->rules);
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        }
        else
        { 

            // get form data        
            $data = $this->post_get_as_array(array('register_no', 'color', 'image', 'tank_liter', 'brand_id', 'vehicle_type_id', 'auth', 'status', 'fuel_type_id','starting_km','maintain_km' ));
			if ($this->vehicle_model->save($data) == TRUE)
			{ 
				// or redirect
				redirect(site_url('admin/vehicle/index/?msg_success=Successfully details updated')); 
 			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Vehicle ';
        $this->data['sub_view'] = 'admin/vehicle_add';
        $this->data['result'] = array();
        $this->load->view('admin/_layout_modal',$this->data);
         
    }   
    
    function edit($id)
    {   
        $this->load->model('journey_model'); 
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        $this->form_validation->set_rules($this->vehicle_model->rules);
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        }
        else
        {                            
            // get form data        
            $data = $this->post_get_as_array(array('register_no', 'color', 'image', 'tank_liter', 'brand_id', 'vehicle_type_id', 'auth', 'status', 'fuel_type_id','starting_km','maintain_km' ));
           
            if ($this->vehicle_model->save($data, $this->input->post('vehicle_id')) == TRUE)
            {
                redirect(site_url('admin/vehicle/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';
                redirect(site_url('admin/vehicle/index/?msg_error=Vehicle details not updated'));

            }
        }

        $this->data['result'] = $this->vehicle_model->get('vehicle_id,register_no,color,vehicle.image,tank_liter,brand_id,vehicle_type_id,auth,status,fuel_type_id,starting_km,maintain_km',  $id,TRUE,1,0);
        $this->data['result']->meter_value = (int)$this->journey_model->get_vehicle_meter_value($id)->meter_value; 
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Vehicle';
        $this->data['sub_view'] = 'admin/vehicle_edit';
        $this->load->view('admin/_layout_modal',$this->data);

 
    }


    function view($id)
    {
        // laod the view of vehicle
        $this->load->model('journey_model'); 

        $this->data['result'] = $this->vehicle_model->get_with_join('vehicle_id,register_no,color,vehicle.image,tank_liter,brand.name AS brand_name,vehicle_type.vehicle_type_id,auth,status,fuel_type.name AS fuel_type,vehicle_type.type as vehicle_type,starting_km,maintain_km', $id,TRUE,1,0);

        $this->data['result']->meter_value = (int) @$this->journey_model->get_vehicle_meter_value($id)->meter_value; 
 
        $this->data['sub_view'] = 'admin/vehicle_view';
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
        if ($this->vehicle_model->save(array('status'=>'I'),$id) == TRUE)
        {
            redirect(site_url('admin/vehicle/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('admin/vehicle/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        

     

    // do upload for athe ajax uploads
    function do_upload()
    {
        
        $config['upload_path'] = './upload/img/vehicle/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '60000';
        $config['max_width']  = '16000';
        $config['max_height']  = '11000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileupload'))
        {  
            echo json_encode(array('status'=>'error','ci_error' => $this->upload->display_errors()));

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            echo json_encode(array('status'=>'success','image_name'=>$data['upload_data']['client_name']));
        }
    }

}

/* End of file vehicle.php */
/* Location: ./system/application/controllers/vehicle.php */