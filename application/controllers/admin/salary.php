<?php

class Salary extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('salary_model');

	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('salary_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/salary/index');
        $config['total_rows'] = $this->salary_model->count();
        $config['per_page'] = 1000;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->salary_model->get_with_join('salary_id,driver.first_name as driver_name,cash,driver.driver_id,paid_date,salary.type,salary.status', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Payment list';
        $this->data['sub_view'] = 'admin/salary_list';
 
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
        $this->form_validation->set_rules($this->salary_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {
            $data = $this->post_get_as_array(array('admin_id','driver_id','cash','paid_date','note','type','status'));
            $data['admin_id'] =  $this->admin_model->get_current_user_id();
 
            // data save
            if ($this->salary_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('admin/salary/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Payment ';

        $this->data['sub_view'] = 'admin/salary_add';

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
        $this->form_validation->set_rules($this->salary_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('admin_id', 'driver_id', 'cash', 'paid_date', 'note', 'type', 'status', ));
            // data save                      
            if ($this->salary_model->save($data, $this->input->post('salary_id')) == TRUE)
            {
                redirect(site_url('admin/salary/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->salary_model->get('salary_id,admin_id,driver_id,cash,paid_date,note,type,status', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Payment';

        $this->data['sub_view'] = 'admin/salary_edit';
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
        $this->data['result'] = $this->salary_model->get_with_join('salary_id,salary.admin_id,salary.driver_id, driver.first_name as driver_name,cash,paid_date,note,type,salary.status,salary.type, admin.first_name as admin_name', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'admin/salary_view';
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
        if ($this->salary_model->save(array('status'=>'I'),$id) == TRUE)
        {
            redirect(site_url('admin/salary/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('admin/salary/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
       

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Total payment summery
     * @return_type                     none
     */
    public function user_total_summery($id)
    {
                // $this->load->model('salary_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/salary/index');
        $config['total_rows'] = $this->salary_model->count();
        $config['per_page'] = 1000; 
        $this->pagination->initialize($config);     
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->db->where(array('salary.driver_id'=> $id,'salary.status'=>'A'));
        $this->data['results'] = $this->salary_model->get_with_join('salary_id,driver.first_name as driver_name,cash,driver.driver_id,paid_date,salary.type,salary.status', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        if (isset($this->data['results'][0]['driver_name'])) {
            $this->data['meta_title'] = $this->data['results'][0]['driver_name'].' - Driver payment summerry';
        }
        $this->data['sub_view'] = 'admin/salary_user_total_summery';
 
        $this->load->view('admin/_layout_main',$this->data);
    }
    /*---------------- ---------End of user_total_summery()---------------------------*/
      

     
}

/* End of file salary.php */
/* Location: ./system/application/controllers/salary.php */