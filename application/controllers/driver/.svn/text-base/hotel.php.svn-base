<?php

class Hotel extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('hotel_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('hotel_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('driver/hotel/index');
        $config['total_rows'] = $this->hotel_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->hotel_model->get_with_join('hotel_id,hotel.name,address,driver.first_name AS driver_name,town.name AS town_name,hotel.lat,hotel.lon,rating,room_available,hotel.note', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Hotel list';
        $this->data['sub_view'] = 'driver/hotel_list';

        $this->load->view('driver/_layout_main',$this->data);
 
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
        $this->form_validation->set_rules($this->hotel_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               
            // get form data        
            $data = $this->post_get_as_array(array('name' , 'address' , 'driver_id' , 'town_id' , 'lat' , 'lon' , 'rating' , 'room_available' , 'note' , ));
           
            // data save
            if ($this->hotel_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('driver/hotel/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Hotel ';

        $this->data['sub_view'] = 'driver/hotel_add';

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
        $this->form_validation->set_rules($this->hotel_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('name' , 'address' , 'driver_id' , 'town_id' , 'lat' , 'lon' , 'rating' , 'room_available' , 'note' , ));
            // data save                      
            if ($this->hotel_model->save($data, $this->input->post('hotel_id')) == TRUE)
            {
                redirect(site_url('driver/hotel/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->hotel_model->get_with_join('hotel_id,hotel.name,address,hotel.driver_id,town.town_id,hotel.lat,hotel.lon,rating,room_available,hotel.note', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Hotel';

        $this->data['sub_view'] = 'driver/hotel_edit';
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
        $this->data['result'] = $this->hotel_model->get_with_join('hotel_id,hotel.name,address,driver.first_name AS driver_name,town.name AS town_name,hotel.lat,hotel.lon,rating,room_available,hotel.note', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'driver/hotel_view';
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
        if ($this->hotel_model->delete($id)==TRUE)
        {
            redirect(site_url('driver/hotel/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('driver/hotel/index/?msg_error=Unsuccess full opertation'));

        }
     
    }
    /*--------------------------End of delete()---------------------------*/
 
}

/* End of file hotel.php */
/* Location: ./system/application/controllers/hotel.php */