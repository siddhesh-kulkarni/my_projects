<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class empDetails extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->model('employee_model');
     
    }
    
	

	public function index()
	{
        
        $this->load->view('view_addEmp');
	}


	public function addEmployee(){
		$this->form_validation->set_rules('employeeType','EmployeeType','required');
	

		if ($this->form_validation->run() == FALSE) {
            // Handle form validation errors
            $this->session->set_flashdata('error', validation_errors());
            redirect('empDetails');
        }
		else{
			$file_name = $this->_upload_document();

			$data = array(
                'employeeType' => $this->input->post('employeeType'),
                'prifix' => $this->input->post('prifix'),
                'first' => $this->input->post('first'),
                'last' => $this->input->post('last'),
                'companyname' => $this->input->post('companyname'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'mobile' => $this->input->post('mobile'),
                'designation' => $this->input->post('designation'),
                'experience' => $this->input->post('experience'),
                'doj' => $this->input->post('doj'),
                'attention' => $this->input->post('attention'),
                'country' => $this->input->post('country'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'phone1' => $this->input->post('phone1'),
                'fax' => $this->input->post('fax'),
                'filename' => $file_name
            );


			$insert=$this->employee_model->insert_employee($data);
			if ($insert) {
                $this->session->set_flashdata('inserted', 'Employee information saved successfully.');
                redirect('empDetails');
            } else {
                $this->session->set_flashdata('error', 'An error occurred while saving employee information.');
                redirect('empDetails');

            }
			


			
		}


}

private function _upload_document() {
	$config['upload_path'] = './uploads/';
	$config['allowed_types'] = 'gif|jpg|png|pdf|doc|jpeg|docx';
	$config['max_size'] = 2048; // 2MB
	$config['max_width'] = 10240;
	$config['max_height'] = 7680;
	$this->load->library('upload', $config);
  

	if ($this->upload->do_upload('filename')) {
		return $this->upload->data('file_name');
	} else {
		
		
		return NULL;
	}
}
  
}
?>