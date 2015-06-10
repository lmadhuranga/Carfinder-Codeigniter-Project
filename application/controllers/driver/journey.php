<?php

class Journey extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');        
        $this->load->helper(array('form','url','codegen_helper'));
        $this->load->model('journey_model');
    }   
    
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
    function index()
    {
 
        // $this->load->model('journey_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('driver/journey/index');
        $config['total_rows'] = $this->journey_model->count();
        $config['per_page'] = 10;   
        $this->pagination->initialize($config);     
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->db->order_by('created', 'desc');
        $this->data['results'] = $this->journey_model->get_with_join('journey_id,journey.start_time,journey.start_place,journey.end_place,journey.km,driver.last_name as driver_name, vehicle.register_no', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
 
        $this->data['meta_title'] = $this->data['meta_title'].' - Journey list';
        $this->data['sub_view'] = 'driver/journey_list';

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
        $this->form_validation->set_rules($this->journey_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               
            // get form data        
            $data = $this->post_get_as_array(array('start_time', 'end_time', 'start_place', 'end_place', 'vehicle_id', 'driver_id', 'start_town_id', 'end_town_id', 'km', 'pasenger_count', 'cash', 'note', 'start_lat', 'start_lon', 'end_lat', 'end_lon','meter_value' ));
            

            // data save
            if ($this->journey_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('driver/journey/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

            }
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Journey ';

        $this->data['sub_view'] = 'driver/journey_add';

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
        $this->form_validation->set_rules($this->journey_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('start_time', 'end_time', 'start_place', 'end_place', 'vehicle_id', 'driver_id', 'start_town_id', 'end_town_id', 'km' , 'pasenger_count', 'cash', 'note', 'start_lat', 'start_lon', 'end_lat', 'end_lon','meter_value' ));
        // data save                      
            if ($this->journey_model->save($data, $this->input->post('journey_id')) == TRUE)
            {
                redirect(site_url('driver/journey/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->journey_model->get('journey_id,start_time,end_time,start_place,end_place,vehicle_id,driver_id,start_town_id,end_town_id,km,pasenger_count,cash,note,start_lat,start_lon,end_lat,end_lon,meter_value', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Journey';

        $this->data['sub_view'] = 'driver/journey_edit';
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
        $this->data['result'] = $this->journey_model->get_with_join('journey_id,journey.start_time,journey.start_town_id,journey.end_town_id,journey.end_time,journey.start_place,journey.end_place,journey.vehicle_id,journey.driver_id,journey.km,journey.pasenger_count,journey.note,driver.first_name as driver_name, vehicle.register_no,meter_value', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'driver/journey_view';
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
        if ($this->journey_model->save(array('status'=>'D'),$id) == TRUE)
        {
            redirect(site_url('driver/journey/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('driver/journey/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        

     


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get list of journey list
     * @return                          json
     */
    public function ajax_get_journey_list()
    {
        // json array
        $json_return_array = array('msg'=>'','status'=>'');
        $this->db->order_by('created', 'desc');
        $data = $this->journey_model->get(array('start_place','end_place','start_time','end_time','cash'),NULL,FALSE,10);

        if (count($data)) {
            $json_return_array['journeys'] = $data;
        }
        else
        {
            $json_return_array['msg'] = 'no data';
            $json_return_array['status'] = 'no_data';
            $json_return_array['error_code'] = 'no_data';

        }
        
        echo(json_encode($json_return_array));

    }
    /*---------------- ---------End of ajax_get_journey_list()---------------------------*/
   

    


    /*************************Start Function add()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :                Ajax jouerny added
    function ajax_add()
    {    
        // json array
        $json_return_array = array('msg'=>'','status'=>'');

        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->journey_model->ajax_rules);
        if ($this->form_validation->run() == false)
        { 
             $json_return_array['msg'] = validation_errors(); 
             $json_return_array['status'] = 'error'; 
             $json_return_array['status_code'] = 'validation_errors'; 
        }
        else
        {
            // /get post data to array
            $data = $this->post_get_as_array(array('start_place','end_place','start_town_id','end_town_id','km','pasenger_count','cash','note'));
            $data['start_time']  = $this->get_now();
            $data['vehicle_id']  = $this->driver_model->get_current_vehicle_id();
            $data['driver_id']  = $this->driver_model->get_current_user_id();
 
            
            // data save
            if ($this->journey_model->save($data) == TRUE)
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

    }//Function End add()---------------------------------------------------FUNEND()
    
}

/* End of file journey.php */
/* Location: ./system/application/controllers/journey.php */