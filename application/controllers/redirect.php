<?php

/**
 * Try out Bonyeza app on www.bonyeza.wordpress.com/release
 *
 * @author Xcoder
 */
class redirect extends CI_Controller{
    function index()
    {
       $data['page_title']="xcoder_auth library: Set your welcome Page";
       $this->load->view('index',$data);
    }
    function xcoder_login()
    {
        $data['page_title']="xcoder_auth library:Login";
        $this->load->view('login',$data);
    }
    function xcoder_reg()
    {
        $data['page_title']="xcoder_auth library:Register User";
        $this->load->view('registration',$data);
    }
    function xcoder_forgot()
    {
        $this->load->view('forgot_password');
    }
    function details()
    {
      $this->load->view('details');  
    }
     function proposal_register()
    {
         $this->load->view('proposal_register');
    }
    function accept_student()
    {
        $this->load->view('accept');
    }
    function brute_data($post_array)            
    {
        $post_array['reg_no']=$this->session->userdata('reg_no'); 
        $post_array['date']=date("Y:m:d:h:i:s");
       
        return $post_array;
    }
     function brute_col($post_array)            
    {
          $acad_yr=$post_array['year'];
          return $acad_yr;
     }
     
     function admin_home()
     {
         $this->load->view('admin_home');
     }
     function new_supervisor()
     {
         $this->load->view('supervisors_new');
     }
     function timeline()
     {
         $this->load->view('timelines');
     }
     function tasks()
     {
          $this->load->view('tasks');
     }
     function summary_sms()
     {
         $this->load->view('summary_sms');
     }
     function graphing()
     {
         $this->load->view('graph_view');
     }
     function report_view()
     {
         $this->load->view('allocation_report_view');
     }
     function check_v()
     {
         $this->load->view('check');
     }
    
   
}

?>
