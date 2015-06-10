<?php

class Driver extends Admin_Controller
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
        // $this->load->adminmodel('driver_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/driver/index');
        $config['total_rows'] = $this->driver_model->count();
        $config['per_page'] = 10;   
        $this->pagination->initialize($config);     
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->driver_model->get('driver_id,image,first_name,last_name,nic,license_type,driver.status', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Driver list';
        $this->data['sub_view'] = 'admin/driver_list';

        $this->load->view('admin/_layout_main',$this->data);
 
    }

 
    
    function add()
    {        
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        $this->form_validation->set_rules($this->driver_model->rules);
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {                            
            $data = $this->post_get_as_array(array('user_name','first_name','last_name','address_1','address_2','nic','licen_no','license_type','m_tel','h_tel','auth_code','status','password','new_password','dob','leave_date','new_password_requst_date','licen_expire_date','image'));
            
            if ($this->driver_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('admin/driver/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

            }
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Driver ';

        $this->data['sub_view'] = 'admin/driver_add';

        $this->load->view('admin/_layout_modal',$this->data); 
    }   
    
    function edit($id)
    {        
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        $this->form_validation->set_rules($this->driver_model->rules);

        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
 
        }
        else
        {                            
            $data = $this->post_get_as_array(array('user_name','first_name','last_name','address_1','address_2','nic','licen_no','license_type','m_tel','h_tel','auth_code','status','password','new_password','dob','leave_date','new_password_requst_date','licen_expire_date','image')); 
           
            if ($this->driver_model->save($data, $this->input->post('driver_id')) == TRUE)
            {
                redirect(site_url('admin/driver/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }

        $this->data['result'] = $this->driver_model->get('driver_id,user_name,first_name,last_name,address_1,address_2,nic,licen_no,license_type,m_tel,h_tel,auth_code,status,password,new_password,dob,leave_date,new_password_requst_date,licen_expire_date, image', $id,TRUE,1,0);
        // echo    $this->db->last_query();
        // exit();
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Driver';

        $this->data['sub_view'] = 'admin/driver_edit';

        $this->load->view('admin/_layout_modal',$this->data);

        // $this->load->view('temp/components/page_head');
        // $this->load->view('temp/admin/temp_nav');
        // // $this->load->view('temp/temp_body');
        // $this->load->view('driver_edit', $this->data);      
        // $this->load->view('temp/components/page_tail');
        //$this->template->load('content', 'driver_edit', $this->data);
    }


    function view($id)
    {
        // $ID =  $this->uri->segment(3);
        $this->data['result'] = $this->driver_model->get('driver_id,user_name,first_name,last_name,address_1,address_2,nic,licen_no,license_type,m_tel,h_tel,auth_code,status,password,new_password,dob,leave_date,new_password_requst_date,licen_expire_date,image', $id,TRUE,1,0);
 
        $this->data['sub_view'] = 'admin/driver_view';

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
        if ($this->driver_model->save(array('status'=>'D'),$id) == TRUE)
        {
            redirect(site_url('admin/driver/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('admin/driver/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        

     

    // do upload for athe ajax uploads
    function do_upload()
    {
        
        $config['upload_path'] = './upload/img/driver/';
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



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @return_type                     return_type
     */
    public function test()
    {
        $this->load->model('driver_model');
        var_dump($this->driver_model->get_no_hire_driver_count());
    }
    /*---------------- ---------End of test()---------------------------*/
    



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          validate nic number
     * 
     */
    public function valiate_nic($number)
    {
        if (!$this->is_valid_nic($number)) {
            # code...
            $this->form_validation->set_message('valiate_nic', 'Please enter valid NIC');
            return FALSE;
        }

        return TRUE;       
    }



    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Validate back date
     * @return_type                     return_type
     */
    
    public function check_back_date($date)
    {
        if ($this->is_back_date($date))
        {
            return TRUE;
        }
        else
        {
           
            $this->form_validation->set_message('check_back_date', 'Please enter valid date');
            return FALSE;
        }
    }
    /*---------------- ---------End of check_back_date()---------------------------*/
    

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Validate back date
     * @return_type                     return_type
     */
    
    public function check_birthday($date)
    {
        if ($this->is_back_date($date,'1998-01-01'))
        {
            return TRUE;
        }
        else
        {
           
            $this->form_validation->set_message('check_birthday', 'Please enter valid date');
            return FALSE;
        }
    }
    /*---------------- ---------End of check_birthday()---------------------------*/
    

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Validate back date
     * @return_type                     return_type
     */
    
    public function check_license_expire_date($date)
    {
        if (!$this->is_back_date($date))
        {
            return TRUE;
        }
        else
        {
           
            $this->form_validation->set_message('check_license_expire_date', 'License Expired');
            return FALSE;
        }
    }
    /*---------------- ---------End of check_birthday()---------------------------*/
     

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Validate back date
     * @return_type                     return_type
     */
    
    public function check_is_future_date($date)
    {
        if ($this->is_future_date($date))
        {
            return TRUE;
        }
        else
        {
           
            $this->form_validation->set_message('check_is_future_date', 'Should be future date');
            return FALSE;
        }
    }
    /*---------------- ---------End of check_birthday()---------------------------*/
    
    
}

/* End of file driver.php */
/* Location: ./system/application/controllers/driver.php */