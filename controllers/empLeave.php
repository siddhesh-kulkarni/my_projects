<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpLeave extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('leave_model');
    }

    public function index()
    {

        $data['employees']=$this->leave_model->get_employee_names();
        
        $data['leave_data'] = $this->leave_model->get_leave_data();
       
        $this->load->view('header');
        $this->load->view('view_empLeave',$data);
        $this->load->view('footer');
    }

    public function approvalLeave($id){
        $insert= $this->leave_model->approvalLeave($id);
        if($insert){
            $this->session->set_flashdata('success','Approved Data');
            redirect('index.php/EmpLeave');
        }else{
            $this->session->set_flashdata('error','Not Approved');
            redirect('index.php/EmpLeave');
        }
       
    }


    // public function addEmpleave(){
    // $this->form_validation->set_rules('employee_name','Employee Name','required');
    // $this->form_validation->set_rules('leave_reason','Leave Reason','required');
    // $this->form_validation->set_rules('start_date','Start Date','required');
    // $this->form_validation->set_rules('end_date','End Date', 'required');


    // if($this->form_validation->run() == FALSE){
    //     $this->session->set_flashdata('error', validation_errors());

    //     redirect('index.php/EmpLeave');

    // }

    // else{
    //     $data=array(
    //         'employee_name'=> $this->input->post('employee_name'),
    //         'leave_reason'=> $this->input->post('leave_reason'),
    //         'start_date'=> $this->input->post('start_date'),
    //         'end_date'=> $this->input->post('end_date'),
    //         'status'=>'Pending'
    //     );
    //     $insert= $this->leave_model->insert_empleave($data);

    //     if($insert){

    //         $this->session->set_flashdata('inserted', 'Employee information saved successfully.');
    //         redirect('index.php/EmpLeave');
    //     }else{
    //         $this->session->set_flashdata('error', 'An error occurred while saving employee information.');
    //         redirect('index.php/EmpLeave');

    //     }
    // }
   
    
// }


public function updateEmpleave($id){
    $this->form_validation->set_rules('employee_name','Employee Name','required');
    $this->form_validation->set_rules('leave_reason','Leave Reason','required');
    $this->form_validation->set_rules('start_date','Start Date','required');
    $this->form_validation->set_rules('end_date','End Date', 'required');


    if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('error', validation_errors());

        redirect('index.php/EmpLeave');

    }

    else{
        $data=array(
            'employee_name'=> $this->input->post('empId'),
            'leave_reason'=> $this->input->post('leave_reason'),
            'start_date'=> $this->input->post('start_date'),
            'end_date'=> $this->input->post('end_date'),
            'status'=> $this->input->post('status'),
        );
        $result= $this->leave_model->updateEmpleave($data,$id);

        if($result){

            $this->session->set_flashdata('inserted', 'Employee information updated successfully.');
            redirect('index.php/EmpLeave');
        }else{
            $this->session->set_flashdata('error', 'An error occurred while saving employee information.');
            redirect('index.php/EmpLeave');

        }
    }


}

public function deleteEmpleave($id) {
    $result = $this->leave_model->deleteEmpleave($id);

    if ($result) {
        $this->session->set_flashdata('inserted', 'Employee leave record deleted successfully.');
    } else {
        $this->session->set_flashdata('error', 'An error occurred while deleting the employee leave record.');
    }

    redirect('index.php/EmpLeave');
}




}
