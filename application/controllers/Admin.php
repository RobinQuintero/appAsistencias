<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
	public function index(){

        if($this->session->userdata('user')){
		    $this->load->view('crud');
        }else{
            redirect('login/Admin');
        }

        
    } 
}