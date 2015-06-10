<?php

class Chat extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('chat_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('chat_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/chat/index');
        $config['total_rows'] = $this->chat_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->chat_model->get_with_join('chat_id, admin.first_name as admin_name,driver.last_name as driver_name, massage,driver.status', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Chat list';
        $this->data['sub_view'] = 'admin/chat_list';

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
        $this->form_validation->set_rules($this->chat_model->rules);
        // validate form
        if ($this->form_validation->run()==false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               
            // get form data        
            $data = $this->post_get_as_array(array('admin_id','driver_id','massage','status','read'));
           
            // data save
            if ($this->chat_model->save($data)==TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('admin/chat/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Chat ';

        $this->data['sub_view'] = 'admin/chat_add';

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
        $this->form_validation->set_rules($this->chat_model->rules);
        if ($this->form_validation->run()==false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('admin_id','driver_id','massage','status','read'));
            
            // data save                      
            if ($this->chat_model->save($data, $this->input->post('chat_id'))==TRUE)
            {
                redirect(site_url('admin/chat/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->chat_model->get('chat_id,admin_id,driver_id,massage,status,read', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Chat';

        $this->data['sub_view'] = 'admin/chat_edit';
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
        $this->data['result'] = $this->chat_model->get_with_join('chat_id,chat.admin_id, admin.first_name as admin_name,chat.driver_id,driver.last_name as driver_name,massage,driver.status,read', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'admin/chat_view';
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
        if ($this->chat_model->save(array('status'=>'I'),$id)==TRUE)
        {
            redirect(site_url('admin/chat/index/?msg_success=Successfully details updated'));
        }
        else
        {
            redirect(site_url('admin/chat/index/?msg_error=Unsuccess full opertation'));

        }
 
    }//Function End delete()---------------------------------------------------FUNEND()
                             
                     
                                               
   

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          add chat using ajax
     * @return_type                     json
     */
    public function ajax_add()
    {
        $json_return_array = array();
        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->chat_model->rules);
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
            $data = $this->post_get_as_array(array('massage'));
            $data['admin_id'] =$this->admin_model->get_current_user_id();
            
            // data save in db
            if ($this->chat_model->save($data))
            {
                $json_return_array['chat_details']  = array('user_name'=>$data['admin_id'],'massage'=>$data['massage'],'created'=>date('Y-m-d H:t:s'),'first_name'=>$this->admin_model->get_current_first_name(),'last_name'=>$this->admin_model->get_current_last_name());
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
     * Purpose of the function          Get all chat using ajax
     * @return_type                     json
     */
    public function ajax_get()
    {
        $json_return_array = array();
        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        $this->form_validation->set_rules($this->chat_model->rules_admin_ajax_get);
        if ($this->form_validation->run()==false)
        {
            
            // validation error
            $json_return_array['msg']       = 'Last chat id isseue';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors();
            $json_return_array['error_code']= 'validation_faile';
            
        }
        else
        {

            $this->load->model('admin_model');

            // get form data
            $data = $this->post_get_as_array(array('last_chat_id'));
            $data['admin_id'] =$this->admin_model->get_current_user_id();
            
            // data get in db
            $this->db->where('chat.chat_id > "'.$data['last_chat_id'].'"');
            $result = $this->chat_model->get_with_join($fields = array('chat.chat_id','driver.driver_id','admin.image as admin_image','driver.image as driver_image','chat.admin_id','driver.last_name as driver_name','admin.last_name as admin_name','chat.massage','chat.created'), $id = NULL, $single = FALSE, $perpage=20, $start=0, $array='array');
            if (count($result))
            {
                $json_return_array['chat_details']  =  array();
                foreach ($result as $key => $chat)
                {
                    if (isset($chat['driver_id']))
                    {
                        $chat['user_type'] = 'driver';
                        array_push( $json_return_array['chat_details'] , $chat);
                    }
                    else
                    {
                        $chat['user_type'] = 'admin';
                        
                        array_push( $json_return_array['chat_details'] , $chat);
                    }
                }

                
                $json_return_array['msg']           = 'Data ok';
                $json_return_array['status']        = 'success'; 
                $json_return_array['success_status']= 'data_available'; 
            }
            else
            {
                // data not save in db 
                $json_return_array['msg']       = 'No chat data';
                $json_return_array['status']    = 'error';
                $json_return_array['error_code']= 'no_chat_data'; 
            }
        }
        // return the massage
        echo(json_encode($json_return_array));
        exit();
    }
    /*---------------- ---------End of ajax_add()---------------------------*/
    

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          make as read chat list
     * @return_type                     return_type
     */
    public function chat_make_as_read()
    {   
        

        $json_return_array = array();
        // load form valition
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        // validate form
        // $json_return_array['datata'] = $this->post_get_as_array(array('initial_chat_id','last_chat_id'));
        
 

        $this->form_validation->set_rules(array(
                                            array(  'field'=>'initial_chat_id', 
                                                    'label'=>'initial_chat_id', 
                                                    'rules'=>'trim|integer|required|max_length[11]|xss_clean'
                                                ),
                                            array(  'field'=>'last_chat_id', 
                                                    'label'=>'last_chat_idl', 
                                                    'rules'=>'trim|integer|required|max_length[11]|xss_clean'
                                                )
                                            ));

        if($this->form_validation->run()==FALSE)
        {
            // validation error
            $json_return_array['msg']       = validation_errors();
            $json_return_array['status']    = 'error'; 
            $json_return_array['error_code']= 'validation_faile';
            
        }
        else
        {

            $this->load->model('admin_model');

            // get form data
            $data = $this->post_get_as_array(array('initial_chat_id','last_chat_id'));
 
            // data get in db
            $this->db->where(array('chat.read'=>'NTR'));
            $this->db->where('chat.chat_id BETWEEN '.$data['initial_chat_id'] .' AND '.$data['last_chat_id']);
            // update data base AS read
            if ($this->db->update('chat', array('chat.read'=>'R')))
            { 
                $json_ret4urn_array['msg']           = 'Data save ok';
                $json_return_array['status']        = 'success'; 
                $json_return_array['success_status']= 'data_save_ok'; 
            }
            else
            {
                // data not save in db 
                $json_return_array['msg']       = 'Not updated';
                $json_return_array['status']    = 'error';
                $json_return_array['error_code']= 'not_updated'; 
            }
            $json_return_array['sql'] = $this->db->last_query();
        }
        // return the massage
        echo(json_encode($json_return_array));
        exit();
    
        
    }//Function End chat_make_as_read()---------------------------------------------------FUNEND()
}

/* End of file chat.php */
/* Location: ./system/application/controllers/chat.php */