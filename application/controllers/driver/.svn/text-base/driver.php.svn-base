<?php

class Driver extends Driver_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('driver_model');
	}	
	
	function index()
	{
        // $this->load->model('driver_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('driver/index');
        $config['total_rows'] = $this->driver_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->driver_model->get('driver_id,image,first_name,nic', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Driver list';
        $this->data['sub_view'] = 'driver/driver_list';

        $this->load->view('driver/_layout_main',$this->data);
 
	}

	 
    function view($id)
    {
        // $ID =  $this->uri->segment(3);
        $this->data['result'] = $this->driver_model->get('driver_id,user_name,first_name,last_name,address_1,address_2,nic,licen_no,license_type,m_tel,h_tel,auth_code,status,password,new_password,dob,leave_date,new_password_requst_date,licen_expire_date,image', $id,TRUE,1,0);
        
        $this->data['sub_view'] = 'driver/driver_view';

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
        if ($this->driver_model->save(array('status'=>'D'),$id) == TRUE)
        {
            redirect(site_url('driver/driver/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('driver/driver/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        

     

}

/* End of file driver.php */
/* Location: ./system/application/controllers/driver.php */