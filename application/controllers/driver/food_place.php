<?php

class Food_place extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('food_place_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('food_place_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('driver/food_place/index');
        $config['total_rows'] = $this->food_place_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->food_place_model->get_with_join('food_place_id,food_place.image,food_place.name,town.name AS town_name', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Food place list';
        $this->data['sub_view'] = 'driver/food_place_list';

        $this->load->view('driver/_layout_main',$this->data);

        // $this->load->view('temp/components/page_head');
        // $this->load->view('temp/driver/temp_nav');
        // // $this->load->view('temp/temp_body');
        // $this->load->view('food_place_list', $this->data); 
        // $this->load->view('temp/components/page_tail');
        //$this->template->load('content', 'food_place_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template

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
        $this->form_validation->set_rules($this->food_place_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               
            // get form data        
            $data = $this->post_get_as_array(array('driver_id', 'town_id', 'town_id', 'name', 'lat', 'lon', 'note', 'd_reject', 'image', ));
           
            // data save
            if ($this->food_place_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('driver/food_place/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }

        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Food place ';

        $this->data['sub_view'] = 'driver/food_place_add';

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
        $this->form_validation->set_rules($this->food_place_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('driver_id', 'town_id', 'town_id', 'name', 'lat', 'lon', 'note', 'd_reject', 'image', ));
           
            // data save                      
            if ($this->food_place_model->save($data, $this->input->post('food_place_id')) == TRUE)
            {
                redirect(site_url('driver/food_place/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->food_place_model->get_with_join('food_place_id,food_place.driver_id,food_place.town_id,food_place.name,food_place.lat,food_place.lon,food_place.note,food_place.d_reject,food_place.image', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Food place';

        $this->data['sub_view'] = 'driver/food_place_edit';
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
        $this->data['result'] = $this->food_place_model->get_with_join('food_place_id,driver.first_name AS driver_name,food_place.name,food_place.lat,food_place.lon,note,d_reject,food_place.image,town.name AS town_name,food_place.town_id', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'driver/food_place_view';
        // load view
        $this->load->view('driver/_layout_modal',$this->data);
    }

	

    /**
     * @author                             Madhuranga Senadheera
     * Purpose of the function          Delete items then redirect to list
     * 
     */

    function delete($id)
    { 
         // data removed                      
        if ($this->food_place_model->delete($id)==TRUE)
        {
            redirect(site_url('driver/food_place/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('driver/food_place/index/?msg_error=Unsuccess full opertation'));

        }
     
    }
    /*--------------------------End of delete()---------------------------*/
 


        // do upload for athe ajax uploads
    function do_upload()
    {
        
        $config['upload_path'] = './upload/img/food_place/';
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

/* End of file food_place.php */
/* Location: ./system/application/controllers/food_place.php */