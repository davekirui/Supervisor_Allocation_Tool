<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supervisors
 *
 * @author java
 */
class Supervisors extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model("Save_Model");
    }
   
    function index()
    {
        $this->load->view('supervisors_av');
    }
    function log()
    {
        $this->load->view('supervisors_log');
    }
    function logout()
    {
        $this->session->unset_userdata('adm_logged');
        $this->load->view('supervisors_log');
    }
    function login()
    {
    if($this->input->post('sur_name')=='Project Cordinator')
    {
        $data=array('sur_name'=>$this->input->post('sur_name'),
           'password'=>$this->input->post('pass'));
       if($this->Save_Model->login_supervisor($data)!=0)
       {
           $supervisor_sess=array('sur_name'=>$this->input->post('sur_name'),'adm_logged'=>true);
           $this->session->set_userdata($supervisor_sess);
           redirect('redirect/admin_home');
       }
       else
       {
           echo "wrong login";
       }
    }
 else {   
       $data=array('sur_name'=>$this->input->post('sur_name'),
           'password'=>$this->input->post('pass'));
       if($this->Save_Model->login_supervisor($data)!=0)
       {
           $supervisor_sess=array('sur_name'=>$this->input->post('sur_name'),'adm_logged'=>true);
           $this->session->set_userdata($supervisor_sess);
           redirect('redirect/accept_student');
       }
       else
       {
          
           $msg=array('m'=>'Wrong login Credentials',
               'p'=>'index.php/Supervisors/log'); 
           
           $this->load->view('msgs',$msg);
       }
         }
    }
    function accept()
    {
       if($this->input->post("btn")=="Save")
       {       
        $data=array('reg_no'=> $this->input->post('reg_no'),
            'surname'=>  $this->session->userdata('sur_name'),
            'acad_yr'=>  $this->input->post('year'),
                'category'=>  $this->input->post('category'));
        
       
         
        $datas=array('reg_no'=> $this->input->post('reg_no'),'acad_yr'=>$this->input->post('year'));
         
        
        
       if($this->Save_Model->check($datas)==0)
       {
           $this->Save_Model->accept_save($data);
            $stud_details=$data['reg_no'].' is now Allocated to you';
       
        $msg=array('m'=>$stud_details,
               'p'=>'index.php/Allocation');            
           $this->load->view('msgs',$msg);
       }
 else {
           $msg=array('m'=>'Student Already Allocated a Lecturer',
               'p'=>'index.php/redirect/accept_student'); 
           
           $this->load->view('msgs',$msg);
         
       }
       
      
       }
       else
       {
       if($this->input->post('btn')=="Accept another Student"){
          redirect('redirect/accept_student'); 
       }
       }
        
        
    }
    function feed()
    {
        $counter;
  
      $project=  $this->input->post('project');      
      $year=$this->input->post('year');
        
      $val=$this->input->post('value');
      $vals=  serialize($val);
      $array=  unserialize($vals);
      
       $counter=0;
       
      $count=count($array);
        
       
     while($counter<($count))
        {
           $var=$array[$counter];            
           $counter++;
           $data=array(
               'name'=>$var,
               'acad_yr'=>$year,
               'project_name'=>$project);
          if($this->Save_Model->supervisors_available_check($data)==0)
          {
         $this->Save_Model->supervisors_available($data);
       
          }
        }
        
          $msg=array('m'=>'Availed Supervisors',
               'p'=>'index.php/redirect/admin_home'); 
           
           $this->load->view('msgs',$msg);
        
    }
    
    function add()
    {
        $data=array('names'=> $this->input->post('name'),
            'sur_name'=> $this->input->post('identity'),
            'email'=>  $this->input->post('email'),
                'phone_number'=>  $this->input->post('phone'),
            'password'=> random_string('alnum',6));
      $this->Save_Model->add_supervisors($data);  
      
      $sur=array('sur_name'=> $this->input->post('identity'));
      
      $d=$this->Save_Model->send_sms($sur);      
      $data['records']=$d;
      $this->load->view('sms_password',$data);
    }
    function timelines()
    {
        $data=array('acad_yr'=> $this->input->post('acad_yr'),
        'category'=> $this->input->post('category'),
        'start'=>  $this->input->post('start'),
        'end'=>  $this->input->post('end'));
        $this->Save_Model->add_timeline($data);  
      
      echo "added timeline";
    }
    
    function summary_sms()
    {
        $data=array('category'=> $this->input->post('category'),
            'acad_yr'=> $this->input->post('year'));
        
        $sql=  $this->db->query("SELECT DISTINCT sur_name FROM supervisors_sms WHERE category=? AND acad_yr=?",$data);
        foreach ($sql->result() as $s)
        {
            $dat=array('sur_name'=>$s->sur_name,
                'category'=> $this->input->post('category'),
            'acad_yr'=> $this->input->post('year'));
            $sql=$this->db->query("SELECT * FROM supervisors_sms WHERE sur_name=? AND category=? AND acad_yr=?",$dat);
            echo $s->sur_name."<br>";
            
            $d=array('sur_name'=>$s->sur_name);
            
            $sql1=$this->db->query("SELECT * FROM supervisors WHERE sur_name=?",$d);
            
            foreach($sql1->result() as $p)
            {
                $phone=$p->phone_number;
            }
            echo $phone."<br>";
            $msg="";
            $student=1;
            foreach($sql->result() as $g)
            {
                
                 $msg=$msg." Student ".$student."; Reg Number: ".$g->reg_no." Title: ".$g->title;
                 $student++;
            }
            
            $gatewayURL  =   'http://localhost:9333/ozeki?'; 
  $request = 'login=admin'; 
  $request .= '&password=abc123'; 
  $request .= '&action=sendMessage'; 
  $request .= '&messageType=SMS:TEXT'; 
  $request .= '&recepient='.urlencode($phone); 
  $request .= '&messageData='.urlencode($msg);

  $url =  $gatewayURL . $request;  

  //Open the URL to send the message 
   file($url); 
   
            
        }
        
    }
}

?>
