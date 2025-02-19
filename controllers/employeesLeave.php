<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesLeave extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('EmployeesLeave_model');
    }

    public function index()
    {
        $eid=$this->session->userdata('eid');
        // echo $eid;
        $data['employees']=$this->EmployeesLeave_model->get_employee_names($eid);

        
        $data['leave_data'] = $this->EmployeesLeave_model->get_leave_data($eid);
       
        $this->load->view('empheader');
        $this->load->view('view_EmployeesLeave',$data);
        $this->load->view('footer');
    }

    public function approvalLeave($id){
        $insert= $this->EmployeesLeave_model->approvalLeave($id);
        if($insert){
            $this->session->set_flashdata('success','Approved Data');
            redirect('index.php/EmployeesLeave');
        }else{
            $this->session->set_flashdata('error','Not Approved');
            redirect('index.php/EmployeesLeave');
        }
       
    }


    public function addEmpleave(){
    $this->form_validation->set_rules('employee_name','Employee Name','required');
    $this->form_validation->set_rules('leave_reason','Leave Reason','required');
    $this->form_validation->set_rules('start_date','Start Date','required');
    $this->form_validation->set_rules('end_date','End Date', 'required');


    if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('error', validation_errors());

        redirect('index.php/EmployeesLeave');

    }
    else{
        $eid=$this->session->userdata('eid');
        $data=array(
            'employee_name'=> $eid,
            'leave_reason'=> $this->input->post('leave_reason'),
            'start_date'=> $this->input->post('start_date'),
            'end_date'=> $this->input->post('end_date'),
            'status'=>'Pending'
        );
        $insert= $this->EmployeesLeave_model->insert_empleave($data);

        if($insert){

            $this->session->set_flashdata('inserted', 'Employee information saved successfully.');
            redirect('index.php/EmployeesLeave');
        }else{
            $this->session->set_flashdata('error', 'An error occurred while saving employee information.');
            redirect('index.php/EmployeesLeave');

        }
    }
   
    
}


public function updateEmpleave($id){
    $this->form_validation->set_rules('employee_name','Employee Name','required');
    $this->form_validation->set_rules('leave_reason','Leave Reason','required');
    $this->form_validation->set_rules('start_date','Start Date','required');
    $this->form_validation->set_rules('end_date','End Date', 'required');


    if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('error', validation_errors());

        redirect('index.php/EmployeesLeave');

    }

    else{
        $data=array(
            'employee_name'=> $this->input->post('empId'),
            'leave_reason'=> $this->input->post('leave_reason'),
            'start_date'=> $this->input->post('start_date'),
            'end_date'=> $this->input->post('end_date'),
            'status'=> $this->input->post('status'),
        );
        $result= $this->EmployeesLeave_model->updateEmpleave($data,$id);

        if($result){

            $this->session->set_flashdata('inserted', 'Employee information updated successfully.');
            redirect('index.php/EmployeesLeave');
        }else{
            $this->session->set_flashdata('error', 'An error occurred while saving employee information.');
            redirect('index.php/EmployeesLeave');

        }
    }


}

public function deleteEmpleave($id) {
    $result = $this->EmployeesLeave_model->deleteEmpleave($id);

    if ($result) {
        $this->session->set_flashdata('inserted', 'Employee leave record deleted successfully.');
    } else {
        $this->session->set_flashdata('error', 'An error occurred while deleting the employee leave record.');
    }

    redirect('index.php/EmployeesLeave');
}




}
