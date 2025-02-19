<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller {

    
        public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model('documents_model');
        }
    
        public function index()
        {
            $data['employees'] = $this->documents_model->get_employee_names();
            $this->load->view('header');
            $this->load->view('view_documents', $data); 
            $this->load->view('footer');
        }


        public function show_letter() {
            $id = $this->input->post('employee_id');
            $data['employee'] = $this->documents_model->get_employee_by_id($id); // Assuming you have a method to fetch employee details by ID
        
            $this->load->view('header');
            $this->load->view('show_letter', $data); 
            $this->load->view('footer');
        }
        
    }
    ?>