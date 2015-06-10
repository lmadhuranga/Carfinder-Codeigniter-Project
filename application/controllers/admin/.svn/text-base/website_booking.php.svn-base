<?php

class Website_booking extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('website_booking_model');
	}	
	
    /*************************Start Function index()***********************************/
    //Owner : Madhuranga Senadheera
    //
    //@ type :
    //#return type :
	function index()
	{
        // $this->load->model('website_booking_model');
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = site_url('admin/website_booking/index');
        $config['total_rows'] = $this->website_booking_model->count();
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->db->where(array('website_booking.d_status'=>'A'));
        $this->db->order_by('website_booking_id', 'desc');
        $this->data['results'] = $this->website_booking_model->get_with_join('website_booking_id,title,first_name,town.name as from_town, address_1 as from_,address_2 as to_,request_date,request_time, website_booking.status,user_verify', NULL, FALSE,$config['per_page'],$this->uri->segment(4));
        $this->data['meta_title'] = $this->data['meta_title'].' - Website booking list';
        $this->data['sub_view'] = 'admin/website_booking_list';
 
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
        $this->form_validation->set_rules($this->website_booking_model->rules);
        // validate form
        if ($this->form_validation->run() == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             $this->data['result'] = array();

        }
        else
        {               
            // get form data        
            $data = $this->post_get_as_array(array('title','first_name','last_name','address_1','address_2','town_id','m_tel','request_date','request_time','note','admin_note','email','status','user_verify','admin_id'));           
            // data save
            if ($this->website_booking_model->save($data) == TRUE)
            {
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(site_url('admin/website_booking/index/?msg_success=Successfully details updated'));
                

            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
        }
        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Website booking ';

        $this->data['sub_view'] = 'admin/website_booking_add';

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
        $this->form_validation->set_rules($this->website_booking_model->rules);
        if ($this->form_validation->run() == false)
        {
            // set error massage
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);
             // $this->data['result'];

        }
        else
        {      
            // get form data        
            $data = $this->post_get_as_array(array('title','first_name','last_name','address_1','address_2','town_id','m_tel','request_date','request_time','note','admin_note','email','status','user_verify','admin_id'));

            // data save                      
            if ($this->website_booking_model->save($data, $this->input->post('website_booking_id')) == TRUE)
            {
                if (($data['status']=="SV")) {
                    
                    redirect(site_url('admin/inform_car/quick_booking_send_car/'.$this->input->post('website_booking_id')));
                }
                redirect(site_url('admin/website_booking/index/?msg_success=Successfully details updated'));
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }
        // load individula view
        $this->data['result'] = $this->website_booking_model->get('website_booking_id,title,first_name,last_name,address_1,address_2,town_id,m_tel,request_date,request_time,note,admin_note,email,status,user_verify,admin_id', $ID,TRUE,1,0);
        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Website booking';

        $this->data['sub_view'] = 'admin/website_booking_edit';
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
        $this->data['result'] = $this->website_booking_model->get_with_join('website_booking_id,title,first_name,last_name,address_1,address_2,website_booking.town_id,m_tel,request_date,request_time,note,admin_note,email,website_booking.status,user_verify,admin_id,town.name as town_name', $ID,TRUE,1,0);
        
        $this->data['sub_view'] = 'admin/website_booking_view';
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
        if ($this->website_booking_model->save(array('d_status'=>'D'),$id) == TRUE)
        {
            redirect(site_url('admin/website_booking/index/?msg_success=Successfully details updated'));
        }
        else
        {
           redirect(site_url('admin/website_booking/index/?msg_error=Unsuccess full opertation'));

        }

    }//Function End delete()---------------------------------------------------FUNEND()
        
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Dashboard summery count updater 
     * @return_type                     json
     */
    public function ajax_get_sumery_count_dashboard()
    {

        $json_return_array = array();
     
        $this->data['custom_error'] = '';
  
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
        
        // return the massage
        echo(json_encode($json_return_array));
        exit();
    

    }//Function End ajax_get_sumery_count_dashboard()---------------------------------------------------FUNEND()
     

     /**
      * @author                          Madhuranga Senadheera
      * Purpose of the function          Description
      * @return_type                     return_type
      */
     public function test()
     {
 
     }//Function End test()---------------------------------------------------FUNEND()
}

/* End of file website_booking.php */
/* Location: ./system/application/controllers/website_booking.php */