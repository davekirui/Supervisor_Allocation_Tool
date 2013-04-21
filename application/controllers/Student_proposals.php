<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_proposals
 *
 * @author java
 */
class Student_proposals extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Save_Model');
    }

    function in()
    {
        $this->load->view('details');
    }
    function details()
    {
        
      $criteria=array('category'=>$this->input->post('category'),
          'acad_yr'=>$this->input->post('year'));  
    
      $x= $this->Save_Model->check_timeline($criteria);
      
      foreach ($x as $xd)
      {
      $start=$xd->start;
      $end=$xd->end;
      $now=date('Y-m-d');
      }
      
      if(isset($end) && isset($start))
      {
      if($now>$start && $now<$end)
      {
        $data1=array('year'=>$this->input->post('year'),
            'category'=>$this->input->post('category'),
            'reg_no'=>  $this->session->userdata('reg_no'));    
       
   
       if($this->Save_Model->check_proposal($data1)==0)
       {
        
        $details_sess=array('year'=>  $this->input->post('year'),
            'category'=>$this->input->post('category'));
        
        $this->session->set_userdata($details_sess);
        $this->load->view("p_details");
       }
       else
       {   $msg=array('m'=>'You already Applied',
               'p'=>'index.php/Student_proposals/in');            
           $this->load->view('msgs',$msg);
       }
       
      }
      else
      {
          if($now<$start)
          {
              
        $msg=array('m'=>'Applications Not Open',
               'p'=>'index.php/Student_proposals/in');            
           $this->load->view('msgs',$msg);
              
          }
          else
          {
               $msg=array('m'=>'Applications Closed',
               'p'=>'index.php/Student_proposals/in'); 
           
           $this->load->view('msgs',$msg);
             
          }
        

      }
      }
      else
      {
           $msg=array('m'=>'Applications Not Open',
               'p'=>'index.php/Student_proposals/in'); 
           
           $this->load->view('msgs',$msg);
          
       
      }
    }
      function supervisors()
    {
        $details_sess=array('title'=>  $this->input->post('title'),
            'field'=>$this->input->post('field'),
            'date'=>$this->input->post('date'));
        
        $this->session->set_userdata($details_sess); 
        
        $this->load->view("supervisors");
    }
   function feed()
    {
       $this->load->model('Save_Model');
       
       $data=array('id'=>NULL,
           'reg_no'=>$this->session->userdata('reg_no'),
           'year'=>$this->session->userdata('year'),
           'category'=>$this->session->userdata('category'),
           'project_title'=>$this->session->userdata('title'),
           'field'=>$this->session->userdata('field'),
           'date'=>$this->session->userdata('date'),
           'supervisor_1'=>$this->input->post('supervisor1'),
           'supervisor_2'=>$this->input->post('supervisor2'),
           'supervisor_3'=>$this->input->post('supervisor3'),
           'supervisor_4'=>$this->input->post('supervisor4'));
       
       $this->Save_Model->save_proposals($data); 
       
       
       $i=1;
       while($i<=4)
       {
           $supervisor="supervisor".$i;
           
         $dat=array('sur_name'=>$this->input->post($supervisor),
             'reg_no'=> $this->session->userdata('reg_no'),
             'title'=>$this->session->userdata('title'),
             'category'=>$this->session->userdata('category'),
             'acad_yr'=>$this->session->userdata('year'));
         
         $sql=$this->db->insert('supervisors_sms',$dat);          
         $i++;
       }
       
    $msg=array('m'=>'Application Posted For Action',
               'p'=>'index.php/Student_proposals/in'); 
           
           $this->load->view('msgs',$msg);
       
    }
 
}

?>
