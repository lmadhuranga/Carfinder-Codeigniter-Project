<?php

class Bookmark_location extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('bookmark_location_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('bookmark_location_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/bookmark_location/index');
        $config['total_rows'] = $this->bookmark_location_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->bookmark_location_model->get_with_join('bookmark_location_id,driver.first_name AS driver_name,town.name AS town_name,bookmark_location.name,note,priority,bookmark_location.lat,bookmark_location.lon,bookmark_location.status', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Bookmark location list';
        $this->data['sub_view'] = 'admin/bookmark_location_list';

        $this->load->view('admin/_layout_main',$this->data);

        // $this->load->view('temp/components/page_head');
        // $this->load->view('temp/admin/temp_nav');
        // // $this->load->view('temp/temp_body');
        // $this->load->view('bookmark_location_list', $this->data); 
        // $this->load->view('temp/components/page_tail');
        //$this->template->load('content', 'bookmark_location_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template

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
        $this->form_validation->set_rules($this->bookmark_location_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {
            // get form data        
            $data = $this->post_get_as_array(array('driver_id','town_id','name','note','priority','lat','lon','status'));
           
            // data save
            if ($this->bookmark_location_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('admin/bookmark_location/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Bookmark location ';

        $this->data['sub_view'] = 'admin/bookmark_location_add';

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
        $this->form_validation->set_rules($this->bookmark_location_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {   
            // get data from form   
            $data = $this->post_get_as_array(array('driver_id','town_id','name','note','priority','lat','lon','status'));

            // data save                      
            if ($this->bookmark_location_model->save($data, $this->input->post('bookmark_location_id')) == TRUE)
            {
                redirect(site_url('admin/bookmark_location/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->bookmark_location_model->get('bookmark_location_id,driver_id,town_id,name,note,priority,lat,lon,status', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Bookmark location';

        $this->data['sub_view'] = 'admin/bookmark_location_edit';
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
        $this->data['result'] = $this->bookmark_location_model->get_with_join('bookmark_location_id,driver.first_name AS driver_name,town.name AS town_name,bookmark_location.name,note,priority,bookmark_location.lat,bookmark_location.lon,bookmark_location.status', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'admin/bookmark_location_view';
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
        if ($this->bookmark_location_model->save(array('status'=>'D'),$id) == TRUE)
        {
            redirect(site_url('admin/bookmark_location/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('admin/bookmark_location/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        

     
}

/* End of file bookmark_location.php */
/* Location: ./system/application/controllers/bookmark_location.php */