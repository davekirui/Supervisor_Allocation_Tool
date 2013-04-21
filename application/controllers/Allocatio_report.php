<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Allocatio_report
 *
 * @author java
 */
class Allocatio_report extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function report()
    {
        $xcoder=new grocery_CRUD(); 
        
        $key=array('acad_yr'=>  $this->input->post('acad_yr'),
            'category'=>  $this->input->post('category'));
        
        $xcoder->set_table('allocation');
        $xcoder->where($key);
        $xcoder->set_theme('datatables');
        $xcoder->unset_delete();
        $xcoder->unset_add();
        
        $xcoder->unset_edit();
        
        $output=$xcoder->render();
        
        $this->load->view('allocation_report',$output);
        
        
    }
}

?>
