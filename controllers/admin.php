<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('empmodel'); // Load employee model
        $this->load->library('session');
        $this->load->helper('url'); // Ensure URL helper is loaded
    }

    public function index() {
        $this->load->view('login');
    }

    public function login_action() {
        if ($this->input->post()) {
            $username = $this->input->post('email');
            $password = $this->input->post('pass');

            if (empty($username) || empty($password)) {
                $this->session->set_flashdata('error', 'Username or Password is missing.');
                redirect('admin/index');
            }

            // Check admin login
            $admin = $this->admin_model->validate_admin($username, $password);
            if ($admin) {
                $this->session->set_userdata('id', $admin['id']);
                redirect(base_url('index.php/App/index')); // Redirect to the admin dashboard
            }

            // Check employee login
            $employee = $this->empmodel->checkEmployeeLogin($username, $password);
            if ($employee) {
                $this->session->set_userdata('eid', $employee->eid);
                redirect(base_url('index.php/App/empdashboard')); // Redirect to the employee dashboard
            }

            // Invalid login
            $this->session->set_flashdata('error', 'Invalid username or password.');
            redirect('admin/index');
        } else {
            $this->load->view('login');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('id')) {
            redirect(base_url('index.php/App/index'));
        }
        $this->load->view('index');
    }

    public function empdashboard() {
        if (!$this->session->userdata('eid')) {
            redirect('admin/index');
        }
        $this->load->view('employee_dashboard');
    }

    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('eid'); 
        redirect('admin/index');
    }

    public function reset_password() {
        $security_key = $this->input->post('security_key');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if ($new_password !== $confirm_password) {
            $this->session->set_flashdata('error', 'Passwords do not match.');
            redirect('admin/index');
        }

        $user = $this->admin_model->check_security_key($security_key);

        if ($user) {
            $updated = $this->admin_model->update_password($user->id, $new_password);
            if ($updated) {
                $this->session->set_flashdata('success', 'Password updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update password.');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid security key.');
        }

        redirect(base_url('index.php/App/index'));
    }
}
?>
