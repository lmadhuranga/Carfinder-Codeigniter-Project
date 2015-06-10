<?php

class Town extends Driver_Controller
// class Town extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');        
        $this->load->helper(array('form','url','codegen_helper'));
        $this->load->model('town_model');
    }   
    
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
    function index()
    {
        // $this->load->model('town_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('driver/town/index');
        $config['total_rows'] = $this->town_model->count();
        $config['per_page'] = 10;   
        $this->pagination->initialize($config);     
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->town_model->get_with_join('town.town_id,name,lat,lon,driver.first_name AS driver', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Town list';
        $this->data['sub_view'] = 'driver/town_list';

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
        $this->form_validation->set_rules($this->town_model->rules);
        // validate form
        if ($this->form_validation->run()==false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {
            // get form data        
            $data = $this->post_get_as_array(array('name' , 'lat' , 'lon' , 'driver_id' , ));
           
            // data save
            if ($this->town_model->save($data)==TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('driver/town/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

            }
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Town ';

        $this->data['sub_view'] = 'driver/town_add';

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
        $this->form_validation->set_rules($this->town_model->rules);
        if ($this->form_validation->run()==false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('name' , 'lat' , 'lon' , 'driver_id' , ));

            // data save                      
            if ($this->town_model->save($data, $this->input->post('town_id'))==TRUE)
            {
                redirect(site_url('driver/town/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->town_model->get('town_id,name,lat,lon,driver_id', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Town';

        $this->data['sub_view'] = 'driver/town_edit'; 
        
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
        $this->data['result'] = $this->town_model->get_with_join('town.town_id,town.name,driver.first_name AS driver,lat,lon,driver.driver_id', $ID,TRUE,1,0);
        // $this->data['result'] = $this->fuel_center_model->get_with_join('town.town_id,fuel_center_id,town.name AS town_name,fuel_center.lat,fuel_center.lon,d_reject,note', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'driver/town_view';
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
        if ($this->town_model->save(array('status'=>'D'),$id)==TRUE)
        {
            redirect(site_url('driver/town/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('driver/town/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          add town 
     * @return_type                     json
     */
    public function ajax_add()
    {

        $json_return_array = array();
        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->town_model->ajax_rules);
        if ($this->form_validation->run()==false)
        {
            
            // validation error
            $json_return_array['msg']       = 'Please fill requered field';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors();
            $json_return_array['error_code']= 'validation_faile';
            
        }
        else
        {

            $this->load->model('admin_model');

            // get form data
            $data = $this->post_get_as_array(array('lat','lon','name'));
            $data['driver_id'] = $this->data['current_user_id'];
            
            // data save in db
            if ($this->town_model->save($data))
            {  
                $json_return_array['msg']           = 'System success fully updated';
                $json_return_array['status']        = 'success'; 
                $json_return_array['success_status']= 'system_update_success'; 
            }
            else
            {
                // data not save in db 
                $json_return_array['msg']       = 'System update unsuccess';
                $json_return_array['status']    = 'error';
                $json_return_array['error_code']= 'system_update_unsuccessfull'; 
            }
        }
        // return the massage
        echo(json_encode($json_return_array));
        exit(); 
        
    }
    /*---------------- ---------End of ajax_add()---------------------------*/
    

     

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get town list using ajax
     * @return_type                     jsonp
     */
    public function get_ajax_autocomplete()
    {
        $query = $this->input->post('q');
        $this->db->like('town.name', $query, 'after');
        echo json_encode($this->town_model->get(array('name as town_name, town_id, lat, lon'),$id=NULL,$single=FALSE, $perpage=10));
  
        exit();
    }
    /*---------------- ---------End of get_ajax_autocomplete()---------------------------*/
    
}

/* End of file town.php */
/* Location: ./system/application/controllers/town.php */