<?php



class Website_package extends Admin_Controller

{

    

    function __construct()

    {

        parent::__construct();

		$this->load->library('form_validation');		

		$this->load->helper(array('form','url','codegen_helper'));

		$this->load->model('website_package_model');

	}	

	

    /*************************Start Function index()***********************************/

    //Owner : Madhuranga Senadheera

    //

    //@ type :

    //#return type :

	function index()

	{

        // $this->load->model('website_package_model');

        $this->load->library('table');

        $this->load->library('pagination');



        //paging

        $config['base_url'] = site_url('admin/website_package/index');

        $config['total_rows'] = $this->website_package_model->count();

        $config['per_page'] = 10;	

        $this->pagination->initialize($config); 	

        // make sure to put the primarykey first when selecting , 

        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.

        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.

        $this->data['results'] = $this->website_package_model->get('website_package_id,title,pub_date,status,type', NULL, FALSE,$config['per_page'],$this->uri->segment(4));

        $this->data['meta_title'] = $this->data['meta_title'].' - Website package list';

        $this->data['sub_view'] = 'admin/website_package_list';



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

        $this->form_validation->set_rules($this->website_package_model->rules);

        // validate form

        if ($this->form_validation->run() == false)

        {

             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

             $this->data['result'] = array();



        }

        else

        {               

            // get form data        

            $data = $this->post_get_as_array(array('admin_id', 'pub_date', 'title', 'exp_date', 'content', 'image', 'status', 'type', ));                



           

            // data save

            if ($this->website_package_model->save($data) == TRUE)

            {

                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';

                // or redirect

                redirect(site_url('admin/website_package/index/?msg_success=Successfully details updated'));

            }

            else

            {

                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';



			}

        }

        $this->data['meta_title'] = $this->data['meta_title'].' - Add a Website package ';



        $this->data['sub_view'] = 'admin/website_package_add';



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

        $this->form_validation->set_rules($this->website_package_model->rules);

        if ($this->form_validation->run() == false)

        {

            // set error massage

             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

             // $this->data['result'];



        }

        else

        {      

            // get form data        

            $data = $this->post_get_as_array(array('admin_id', 'pub_date', 'title', 'exp_date', 'content', 'image', 'status', 'type', ));                



            // data save                      

            if ($this->website_package_model->save($data, $this->input->post('website_package_id')) == TRUE)

            {

                redirect(site_url('admin/website_package/index/?msg_success=Successfully details updated'));

            }

            else

            {

                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';



            }

        }

        // load individula view

        $this->data['result'] = $this->website_package_model->get('website_package_id,admin_id,title,pub_date,exp_date,content,image,status,type', $ID,TRUE,1,0);

        $this->data['meta_title'] = $this->data['meta_title'].' - Edit Website package';



        $this->data['sub_view'] = 'admin/website_package_edit';

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

        $this->data['result'] = $this->website_package_model->get('website_package_id,admin_id,title,pub_date,exp_date,content,image,status,type', $ID,TRUE,1,0);

        

        $this->data['sub_view'] = 'admin/website_package_view';

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

        if ($this->website_package_model->save(array('status'=>'D'),$id) == TRUE)

        {

            redirect(site_url('admin/website_package/index/?msg_success=Successfully details updated'));

        }

        else

        {

           redirect(site_url('admin/website_package/index/?msg_error=Unsuccess full opertation'));



        }



    }//Function End delete()---------------------------------------------------FUNEND()

        



     





    // do upload for athe ajax uploads

    function do_upload()

    {

        

        $config['upload_path'] = './upload/img/website_package/';

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



/* End of file website_package.php */

/* Location: ./system/application/controllers/website_package.php */