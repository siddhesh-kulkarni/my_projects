<?php
defined('BASEPATH') or exit('No direct script access allowed');

class empAttendance extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('attendance_model');
    }

    public function index()
    {
        $eid = $this->session->userdata('eid');
        if ($eid) {
            $timestamp_in_kolkata_date = date('Y-m-d ');

            $data['desc'] = $this->attendance_model->getDesc($eid, $timestamp_in_kolkata_date);
            $data['employee'] = $this->attendance_model->get_logged_in_employee_name($eid);
            $this->load->view('empheader');
            $this->load->view('view_attendance', $data);
            $this->load->view('footer');
        } else {
            echo '<html>
             <head>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            </head>
            <body>
                <script>
                                 Swal.fire({
                        title: "Employee id not set in session!",
                 icon: "warning",
                 text:"Please login first",
                buttons: true,
                dangerMode: true,
                    }).then((result) => {
                         if (result.isConfirmed) {
                                window.location.href = "' . base_url('index.php/App/login') . '"; 
                        }
                    });
                 </script>
             </body>
            </html>';
        }
    }

    public function check_in()
    {
        $logged_in_employee_eid = $this->session->userdata('eid');

        if ($this->attendance_model->log_check_in($logged_in_employee_eid)) {
            echo "Check-in successful!";
        } else {
            echo "Check-in failed!";
        }
    }


    public function submit()
    {
        $eid = $this->input->post('employee_name');
        $description = $this->input->post('description');
        $action = $this->input->post('action');



        date_default_timezone_set('Asia/Kolkata');
        $timestamp_in_kolkata_date = date('Y-m-d ');
        $timestamp_in_kolkata_time = date('H:i');

        $logged_in_employee_eid = $this->session->userdata('eid');
        // echo "$logged_in_employee_eid";die;


        if ($action == 'clock_in') {

            $result = $this->attendance_model->check_date($logged_in_employee_eid, $timestamp_in_kolkata_date);


            if ($result) {
                $this->session->set_flashdata('error', 'Already checked in for today');
                redirect('index.php/empAttendance');
            } else {
                $data = array(
                    'employee_name' => $logged_in_employee_eid,
                    'clock_in_description' => $description,
                    'attendanceDate' => $timestamp_in_kolkata_date,
                    'clock_in' => $timestamp_in_kolkata_time,
                    'clock_out' => "",

                );

                $this->attendance_model->clock_in($data);
                $this->session->set_flashdata('success', "Clock in successful.");
                redirect('index.php/empAttendance');
            }
        } elseif ($action == 'clock_out') {

            $result = $this->attendance_model->check_date($logged_in_employee_eid, $timestamp_in_kolkata_date);



            if ($result != null || !empty($result)) {
                if ($result['clock_out'] == "") {

                    $data = array(
                        'clock_out' => $timestamp_in_kolkata_time,
                        'clock_out_description' => $description,
                    );
                    $this->attendance_model->clock_out($logged_in_employee_eid, $timestamp_in_kolkata_date, $data);

                    $this->session->set_flashdata('success', "Checked Out");
                    redirect('index.php/empAttendance');
                } else {

                    $this->session->set_flashdata('error', "Already Checked");
                    redirect('index.php/empAttendance');
                }
            } else {

                $this->session->set_flashdata('error', "Please Check In First");
                redirect('index.php/empAttendance');
            }
        }
    }
}


// empAttendance.php
