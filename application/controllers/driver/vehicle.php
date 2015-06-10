<?php

class Vehicle extends Driver_Controller
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
        $config['base_url'] = site_url('driver/vehicle/index/');
        $config['total_rows'] = $this->vehicle_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->vehicle_model->get_with_join('vehicle_id,register_no,vehicle.image,auth,status,vehicle_type.type as vehicle_type', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Vehicle list';
        $this->data['sub_view'] = 'driver/vehicle_list';
        $this->load->view('driver/_layout_main',$this->data);

        // $this->load->view('temp/components/page_head');
        // $this->load->view('temp/driver/temp_nav');
        // // $this->load->view('temp/temp_body');
        // $this->load->view('vehicle_list', $this->data); 
        // $this->load->view('temp/components/page_tail');
        //$this->template->load('content', 'vehicle_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template

	}

 
	
  /*  function add()
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
            $data = $this->post_get_as_array(array('register_no', 'color', 'image', 'tank_liter', 'brand_id', 'vehicle_type_id', 'auth', 'status', 'fuel_type_id', ));
           
			if ($this->vehicle_model->save($data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(site_url('driver/vehicle/index'));
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Vehicle ';
        $this->data['sub_view'] = 'driver/vehicle_add';
        $this->data['result'] = array();
        $this->load->view('driver/_layout_modal',$this->data);
 
    }   
    
    function edit($id)
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
            $data = $this->post_get_as_array(array('register_no', 'color', 'image', 'tank_liter', 'brand_id', 'vehicle_type_id', 'auth', 'status', 'fuel_type_id', ));
           
            if ($this->vehicle_model->save($data, $this->input->post('vehicle_id')) == TRUE)
            {
                redirect(site_url('driver/vehicle/index/'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }

        $this->data['result'] = $this->vehicle_model->get('vehicle_id,register_no,color,vehicle.image,tank_liter,brand_id,vehicle_type_id,auth,status,fuel_type_id', $id,TRUE,1,0);
        // echo($this->db->last_query());
        // exit();
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Vehicle';
        $this->data['sub_view'] = 'driver/vehicle_edit';
        $this->load->view('driver/_layout_modal',$this->data);

        // $this->load->view('temp/components/page_head');
        // $this->load->view('temp/driver/temp_nav');
        // // $this->load->view('temp/temp_body');
        // $this->load->view('vehicle_edit', $this->data);      
        // $this->load->view('temp/components/page_tail');
        //$this->template->load('content', 'vehicle_edit', $this->data);
    }
*/

    function view($id)
    {
        // $ID =  $this->uri->segment(3);
        // var_dump($this->uri->segment(3));
 
 // 'vehicle_id,register_no,vehicle.image,auth,status,vehicle_type.type as vehicle_type', NULL, FALSE,$config['per_page'],$this->uri->segment(3)
        $this->data['result'] = $this->vehicle_model->get_with_join('vehicle_id,register_no,color,vehicle.image,tank_liter,brand.name AS brand_name,vehicle_type.vehicle_type_id,auth,status,fuel_type.name AS fuel_type,vehicle_type.type as vehicle_type', $id,TRUE,1,0);
        // echo($this->db->last_query());
        // exit();
        $this->data['sub_view'] = 'driver/vehicle_view';
        $this->load->view('driver/_layout_modal',$this->data);
    }


    /**
     * @author                             Madhuranga Senadheera
     * Purpose of the function          Delete items then redirect to list
     * 
     */

    function delete($id)
    { 
         //     data not remove                       
        redirect(site_url('driver/vehicle/index/?msg_error=Access Deny')); 
    }
    /*--------------------------End of delete()---------------------------*/
   
}
/* End of file vehicle.php */
/* Location: ./system/application/controllers/vehicle.php */