<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceReport extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('AttendanceReport_model');
    }

    public function index() {
        $data['employees'] = $this->AttendanceReport_model->getAllEmployees();

        $this->load->view('header');
        $this->load->view('view_attendanceReport', $data);
        $this->load->view('footer');
    }

    public function getAttendanceByEmployeeAndDateRange() {
        $data = [];

        if ($this->input->post('employee_id') && $this->input->post('start_date') && $this->input->post('end_date')) {
            $employeeId = $this->input->post('employee_id');
            $startDate = $this->input->post('start_date');
            $endDate = $this->input->post('end_date');
            $data['attendance_data'] = $this->AttendanceReport_model->getAttendanceDataByEmployeeAndDateRange($employeeId, $startDate, $endDate);
        }

        $data['employees'] = $this->AttendanceReport_model->getAllEmployees();

        $this->load->view('header');
        $this->load->view('view_attendanceReport', $data);
        $this->load->view('footer');
    }
}
?>
