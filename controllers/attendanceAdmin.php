<?php

defined("BASEPATH") or exit("No direct script access allowed");

class attendanceAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("attendanceAdmin_model");
    }

    public function index()
    {
        $data['attendance_data'] = $this->attendanceAdmin_model->getAttendanceData();
        $this->load->view('header');
        $this->load->view('view_attendanceAdmin', $data);
        $this->load->view('footer');
    }

    public function updateAttendance($id)
    {

        $this->form_validation->set_rules('employee_name', 'Employee Name', 'required');
        $this->form_validation->set_rules('clock_in_description', 'Description', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('clock_in', 'Clock In', 'required');
        $this->form_validation->set_rules('clock_out', 'Clock Out', 'required');
        $this->form_validation->set_rules('clock_out_description', 'Description', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            redirect('index.php/attendanceAdmin');
        } else {
            $data = array(
                'employee_name' => $this->input->post('employee_name'),
                'clock_in_description' => $this->input->post('clock_in_description'),
                'attendanceDate' => $this->input->post('date'),
                'clock_in' => $this->input->post('clock_in'),
                'clock_out' => $this->input->post('clock_out'),
                'clock_out_description' => $this->input->post('clock_out_description'),
            );

            $result = $this->attendanceAdmin_model->updateAttendance($data, $id);

            if ($result) {
                $this->session->set_flashdata('success', 'Employee attendance updated successfully');

                redirect('index.php/attendanceAdmin');
            } else {
                $this->session->set_flashdata('error', 'An error occurred while updating employee information');

                redirect('index.php/attendanceAdmin');
            }
        }
    }


    public function deleteAttendance($id)
    {


        $result = $this->attendanceAdmin_model->deleteAttendance($id);
        if ($result) {
            $this->session->set_flashdata('inserted', 'Employee leave record deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'An error occurred while deleting the employee leave record.');
        }
        redirect('index.php/attendanceAdmin');
    }

public function getAttendanceByDate() {
    $date = $this->input->post('date'); 

    $this->load->model('Attendance_model');
    $attendance_data = $this->attendanceAdmin_model->getAttendanceByDate($date);

    if ($attendance_data) {
        echo json_encode($attendance_data); 
    } else {
        echo json_encode([]); 
    }
}


    public function getAttendanceByDateRange()
    {
        $startDate = $this->input->post('start_date');
        $endDate = $this->input->post('end_date');
        $data['attendance_data'] = $this->attendanceAdmin_model->getAttendanceDataByDateRange($startDate, $endDate);


        $this->load->view('view_attendanceAdmin', $data);
    }
}
