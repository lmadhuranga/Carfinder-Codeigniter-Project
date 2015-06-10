<?php

class Website_package extends Frontend_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('website_package_model');
	}	
 
    /*************************Start Function view()***********************************/
    //Owner : Madhuranga Senadheera
    // View individual 
    //@ type :
    //#return type :
    function view($id)
    {
        $this->data['meta_title'] = $this->data['meta_title'].' - Packages';
        // load package list
        $this->load->model('website_package_model');
        $result = $this->website_package_model->get('website_package_id,admin_id,title,pub_date,exp_date,content,image,status,type', $id,TRUE,1,0);

        $this->data['website_package'] = $result;

        $this->data['sub_view'] = 'front/website_package_view';

        $this->load->view('front/_layout_main',$this->data);

      
    }

	 

}

/* End of file website_package.php */
/* Location: ./system/application/controllers/website_package.php */