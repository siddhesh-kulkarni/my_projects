<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalaryEmp extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('salary_model');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('view_salaryEmp');
        $this->load->view('footer');
    }
    public function getEmp(){
       $data['emp']= $this->salary_model->getEmp();
        $this->load->view('header');

        $this->load->view('view_addSalary',$data);
        $this->load->view('footer');


    }

  


    
}
