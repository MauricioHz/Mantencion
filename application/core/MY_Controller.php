<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
  
class MY_Controller extends CI_Controller {

  public function __construct()  
  { 
     parent::__construct();
     if($this->session->logged_in == FALSE){
         redirect('acceso/login');
     }
  } 

  public function render($view, $data)  
  { 
      $data['content'] = $view;
      $data['data'] = $data;
      $this->load->view('ot/index', $data);
  }
}