<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal2 extends CI_Controller {

    function __construct()
	{
        parent::__construct();
    }
    
	public function index()
	{
		if($this->session->userdata('user')){
            echo '<h1>Este es el inicio jajaja</h1>';
        }else{
            redirect('login');
        }
    }

}