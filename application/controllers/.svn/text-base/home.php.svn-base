<?php

class Home extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }  

    // Load the home page 
    function index()
    {
 
        $this->data['meta_title'] = $this->data['meta_title'].' - Home page';
        $this->data['sub_view'] = 'front/home_page'; 


        $this->load->model('website_news_model');
        $this->data['website_news_title'] = $this->website_news_model->get_by(array('status'=>"A"),array('website_news_id','title'),NULL,FALSE);
        $this->load->model('town_model');
        $this->data['town_list'] = $this->town_model->get(array('name','town_id'));
        $this->load->view('front/_layout_main',$this->data);
 
    } 

    public function packages()
    {
        $this->data['meta_title'] = $this->data['meta_title'].' - Packages';
        // load package list
        $this->load->model('website_package_model');

        $this->data['website_package_taxi'] = $this->website_package_model->get_by(array('status'=>'A','type'=>2),array('website_package_id','title', 'pub_date', 'exp_date', 'content', 'image', 'status', 'type'), $id = NULL, $single = FALSE, $perpage=10);
        $this->data['website_package_wedding'] = $this->website_package_model->get_by(array('status'=>'A','type'=>1),array('website_package_id','title', 'pub_date', 'exp_date', 'content', 'image', 'status', 'type'), $id = NULL, $single = FALSE, $perpage=10);

        $this->data['sub_view'] = 'front/packages';

        $this->load->view('front/_layout_main',$this->data);
         
    }

    public function aboutus()
    {
        $this->data['meta_title'] = $this->data['meta_title'].' - About us';
        $this->data['sub_view'] = 'front/aboutus';

        $this->load->view('front/_layout_main',$this->data);
    }

    public function contactus()
    {
        $this->data['meta_title'] = $this->data['meta_title'].' - Contact us';
        $this->data['sub_view'] = 'front/contactus';

        $this->load->view('front/_layout_main',$this->data);
        # code...
    }

    public function gallery()
    {
        $this->data['meta_title'] = $this->data['meta_title'].' - Contact us';
        $this->data['sub_view'] = 'front/gallery_page';

        $this->load->view('front/_layout_main',$this->data);
        # code...
    }

    public function our_services()
    {
        $this->data['meta_title'] = $this->data['meta_title'].' - Our services';
        $this->data['sub_view'] = 'front/our_services';

        $this->load->view('front/_layout_main',$this->data);
        # code...
    }


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          send email form contact us
     * @return_type                     return_type
     */
    public function send_email()
    {

        if (isset($_POST['email'])) {

            $massage .= 'from email:'.$this->input->post('email').'\n';
            $massage .= 'name :'.$this->input->post('name').'\n';
            $massage .= 'massage :'.$this->input->post('massage').'\n';


            if (mail('senadheerataxi@gmail.com', 'Contact us page ', $massage)) {
                redirect(site_url('home/contactus?msg="Email20%Send"'));
            } else {
                redirect(site_url('home/contactus?msg="Email20%NotSend"'));
            }
        } 
        else
        {
                redirect(site_url('home/contactus?msg="Email20%NotSend"'));
            # code...
        }
        
         
    }
    /*---------------- ---------End of send_email()---------------------------*/
    


}

/* End of file bookmark_location.php */
/* Location: ./system/application/controllers/bookmark_location.php */

